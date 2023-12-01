<?php

define('TEMPLATES_URL', __DIR__  .'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] .  '/imagenes/');

function incluirTemplate(string $nombre,bool $inicio = false){
    include  TEMPLATES_URL ."/${nombre}.php";

}

function estaAutenticado(){
    session_start();
    

   if(!$_SESSION['login']){
    header('location:/br3/index.php');
   }

}

function debugear($variable){
    echo '<pre>';
    var_dump($variable);
     echo '</pre>';
     exit;

}

//escapar el html
function s($html) :string{
    $s=htmlspecialchars($html);

    return $s;

}

function validarTipodeContenido($tipo){
    $tipos = ['vendedor','propiedad'];

   //buscar un string dentro de un arreglo 
   //primer valor lo que vamos a buscar 
   //segundo el arreglo donde lo va a buscar
    return in_array($tipo,$tipos);
}
function mostrarNotificacionMensajes($codigo){
    $mensaje = '';
    
    switch($codigo){
        case 1:
            $mensaje = 'Creado correctamente';
        break;

        case 2:
            $mensaje = 'Actualizado correctamente';
        break;

        case 3:
            $mensaje = 'Eliminado correctamente';
        break;

        default :
        $mensaje = false;
        break;
    }
   return $mensaje;
}

function validarOredireccionar(string $url){
      //VALIDAR POR ID VALIDO
      $id=$_GET['id'];
      $id=filter_var($id,FILTER_VALIDATE_INT);
      if(!$id || !$id=$_GET['id']){
      header("Location:${url}");
      }

      return $id;
}