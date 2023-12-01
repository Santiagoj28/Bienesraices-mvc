<?php            

namespace Controllers;
USE MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class PaginasControllers{

    public static function index(Router $router){
        $propiedad = Propiedad::get(3);
        $inicio = true;
    $router->render('paginas/index',[
        'propiedad'=>$propiedad,
        'inicio'=>$inicio
    ]);
        
    }
    public static function nosotros(Router $router){
        
        $router->render('paginas/nosotros');
        
    }
    public static function propiedades(Router $router){
        $propiedad = Propiedad::all();
      
        $router->render('paginas/propiedades',[
            'propiedad'=>$propiedad
        ]);
        
       
    }
    public static function propiedad(Router $router){
        $id = validarOredireccionar('/');
        $propiedad = propiedad::find($id);

        $router->render('paginas/propiedad',[
            'propiedad'=> $propiedad
        ]);

    
    }
    public static function blog(Router $router){

        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
       $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $resultado = $_POST['contacto'];
          
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['MAIL_PORT'];

        //configurar el contenido del email 
        $mail->setFrom('admin@bienesraices.com','bienesraices');
        $mail->addAddress('correo@correo.com','Bienesraices.com');

        //asignar contenido
        $contenido = '<html>';
        $contenido.= '<h1> Tienes un nuevo mensaje <h1>';
        $contenido.= '<h2>Nombre: '. $resultado['nombre'].'</h2>';
        if($resultado['contacto']==='telefono'){
            $contenido.='<p>Usted eligio ser contactado por telefono.</p>';
            $contenido.= '<p>Telefono: '. $resultado['telefono'].'</p>';
            $contenido.= '<p>Fecha contacto: '. $resultado['fecha'].'</p>';
            $contenido.= '<p>Hora: '. $resultado['hora'].'</p>';
            $contenido.='<h4>Mensaje:'. $resultado['mensaje'] .'</h4>' ;
        }else if($resultado['contacto']==='email'){
            $contenido .= '<p>Usted eligio ser contactado por telefono</p>';
            $contenido.= '<p>Email: '. $resultado['email'].'</p>';
            $contenido.='<h4>Mensaje:'. $resultado['mensaje'] .'</h4>' ;
           $contenido.= '<p>Precio: $'. $resultado['precio'].'</p>' ;
           $contenido.= '<p>Vende o Compra: '. $resultado['tipo'].'</p>';
        }
   
        $contenido.= '</html>';
        //Content
        $mail->isHTML(true);                                 
       $mail->Subject = 'Nuevo mensaje';
       $mail->Body    = $contenido;
       $mail->AltBody = 'Estoy enviando mi primer email';

       
        // send the message
        if(!$mail->send()){
            $mensaje = 'Hubo un Error... intente de nuevo';
        } else {
            $mensaje = 'Email enviado Correctamente';
        }

        }
        
        $router->render('paginas/contacto',[
            'mensaje'=>$mensaje
        ]);
    }
}

