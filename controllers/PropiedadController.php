<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
                             //Instancia el router
    public  static function index(Router $router){
        //mostrar datos de la bd
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
            // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        //pasar la ruta y los datos
        $router->render('propiedades/index',[
            //keys => value
            'propiedades'=> $propiedades,
            'vendedores'=>$vendedores,
            'resultado'=>$resultado
        ]);
    }


    //CREATE 
    public static function create(Router $router){
    //crear nueva instancia y lo pasamos a la vista
       $propiedad = new Propiedad();
       $vendedores = Vendedor::all();
       
     //obtenemos los errores utilizando una funcion que lee los errores
     $errores= Propiedad::getErrores() ;


     //ejecutar codigo luego de llenar el formulario
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  
    //nueva instancia y almacenar post en memoria 
    $propiedad = new Propiedad($_POST['propiedad']);
  
     /**CREAR CARPETA */
     $carpetaImagenes='../../imagenes/';
  
     if(!is_dir($carpetaImagenes)){
         mkdir($carpetaImagenes);
     }
     //generar nombre UNICO
     $nombreImagen = md5(uniqid(rand(),true)).'.jpg';
  
     //SETEAR LA IMAGEN
     if($_FILES['propiedad']['tmp_name']['imagen']){
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
     }
     
  
    //validar los campos y marcar los errores
    $errores = $propiedad->validar();
  

    //si no hay errores
      if(empty($errores)){
  
          if(!is_dir(CARPETA_IMAGENES)){
             mkdir(CARPETA_IMAGENES);
           }
  
          //guardar imagen
          $image->save(CARPETA_IMAGENES . $nombreImagen);
         //GUARDA BASE DE DATOS
         $propiedad->guardar();
      }
    
  
  }

       $router->render('propiedades/crear',[
        'propiedad'=> $propiedad,
        'vendedores' => $vendedores,
        'errores'=> $errores
       ]);
        }
    
       
        
    public static function update(Router $router){
        $id = validarOredireccionar('/propiedades');

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        // Consultar para obtener los vendedores
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();
     
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
                //asignar los atributos
                $args = $_POST['propiedad'];
                // Asignar los atributos
                $propiedad->sincronizar($args);

                // Validación
                $errores = $propiedad->validar();

                // Subida de archivos
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
                }

                if(empty($errores)) {
                   
                    // Almacenar la imagen
                    if($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    // Guarda en la base de datos
                    $resultado = $propiedad->guardar();


                }

            }
        $router->render('propiedades/actualizar',[
            'propiedad'=> $propiedad,
            'vendedores'=> $vendedores,
            'errores'=> $errores
        ]);
    }

    public static function delete(){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id = $_POST['id'];
            $id = filter_var($id , FILTER_VALIDATE_INT);
              if($id){
                $tipo= $_POST['tipo'];
            
                if(validarTipodeContenido($tipo) ) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
              }
        
    }
}
} 