<?php
if(!isset($_SESSION)){
    session_start();
}
$auth=$_SESSION['login'] ?? false ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/br3/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio':'';?>  ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/br3/index.php">
                    <img src="/br3/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/br3/build/img/barras.svg" alt="icono menu responsive">
                </div>
                

                <div class="derecha">
                    <img class="dark-mode-boton" src="/br3/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/br3/nosotros.php">Nosotros</a>
                        <a href="/br3/anuncios.php">Anuncios</a>
                        <a href="/br3/blog.php">Blog</a>
                        <a href="/br3/contacto.php">Contacto</a>
                        <?php if($auth) : ?>
                            <a href="cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif ; ?>
                    </nav>
                </div>
   
                
            </div> <!--.barra-->
           <?php if($inicio){ ?>
            <h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
            <?php  } ?>
        </div>
    </header>