<?php 
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginControllers{
    public static function login(Router $router){
       
        $errores = Admin::getErrores();

        if($_SERVER['REQUEST_METHOD']==='POST'){
           $auth = new Admin($_POST);
          
         
           $errores = $auth->validar();
           if(empty($errores)){
            //verificar si el usuario existe 
            $resultado = $auth->existeUsuario();
            if(!$resultado){
                $errores=Admin::getErrores();
            }else{
                //verificar password
                $autenticado =  $auth->comprobarPassword($resultado);   
                 if($autenticado){
                    //autenticar user
                    $auth->autenticar();
                 }else{
                    $errores = Admin::getErrores();

                 }
            }
            
           }
        }

        $router->render('auth/login',[
            'errores'=> $errores
            
            
        ]);

    }
    public static function logout(){
        session_start();

        $_SESSION=[];

        header('location:/');
    }
}