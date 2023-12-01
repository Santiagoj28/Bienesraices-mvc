<?php 
//public sirve lo que los usuarios ven
namespace MVC;



class Router{
    //obtener el tipo de ruta
   
    public $rutasGET=[];
    public $rutasPOST=[];
    
    //ruta get (url y funcion) ruta es igual a funcion
    public function get($url,$fn){
        $this->rutasGET[$url]=$fn;
    }
    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }
    
    //verificar rutas privadas

 //comprobar las rutas
 public function comprobarRutas() {
    session_start();
    $auth = $_SESSION['login'] ?? null;
    
    //rutas protegidas
     $rutas_Protegidas=['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];
     
    //ruta actual
    $urlActual = strtok($_SERVER['REQUEST_URI'],'?');
  
    //saber si es get o post
    $metodo = $_SERVER['REQUEST_METHOD'];
   
    //proteger las rutas
    if(in_array($urlActual,$rutas_Protegidas) && !$auth){
       header('location: /');
    
    }
    
    if($metodo === 'GET'){
        //obtiene la url actual 
        $fn = $this->rutasGET[$urlActual]??null;
    }else {
       
        $fn = $this->rutasPOST[$urlActual] ?? null;
    }
    
    if( $fn ){
        //la url existe y hay una funcion asociada 
        call_user_func($fn, $this);
    }else{
        echo'Pagina no encontrada o ruta no valida';
    }
 }

 //MUESTRA LA VIST
 public function render($views,$datos =[] ){
    //itera en los datos  del arreglo
    foreach($datos as $key => $value){
       $$key = $value;//significa variable de variables mantiene el nombre pero no pierde el valor
    }
    ob_start();//para almacenar y guaradarlo en memoria 
    include __DIR__ . "/views/$views.php";
    $contenido = ob_get_clean();//limpiamos lo que esta en memoria
    include __DIR__ . "/views/layout.php"; //incluimos el layout 
 }
}