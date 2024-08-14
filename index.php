<?php session_start(); 
require_once 'secciones/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~ Encuadre ~</title>
    <!--<link rel="stylesheet" href="recursos/jqm/jquery.mobile-1.4.5.css">
    <script src="recursos/jqm/jquery.min.js"></script>
    <script src="recursos/jqm/jquery.mobile-1.4.5.js"></script>-->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/css/all.css"> 
    <script src="https://kit.fontawesome.com/c31d876a35.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="recursos/css/arreglos.css"> 
</head>
<body>
    

<!--<header>-->

        <header class="header_responsive"> 

        <h1 class="logo_titulo"><img src="recursos/img/encuadre4.png" alt="logo"></h1>
        <nav>
        <ul class="nav__ul">
<li class="nav__li"><a href="index.php?seccion=home" >Home</a></li>
<li class="nav__li"><a href="index.php?seccion=portfolio" >Portfolio</a></li>
<li class="nav__li"><a href="index.php?seccion=contacto" >Contacto</a></li>
<?php
                        if(isset($_SESSION['usuario']) and $_SESSION['usuario']['ROL_ID'] == 1):
                            ?>                      
                           <li class="nav__li"> <a href="index.php?seccion=adminTrabajos" >Editar trabajos</a></li>

                        <?php endif; 
                            if(!isset($_SESSION['usuario'])):
                        ?>
                        
                        <li class="nav__li"><a href="index.php?seccion=login"  class="botones_distintos">Iniciar sesión</a></li>
                        

                        
                        <li class="nav__li"><a href="index.php?seccion=signup"  class="botones_distintos">Registrarse</a></li>
                        

                        <?php else: ?>
                        
                            <li class="nav__li"><a href="acciones/logout.php" class="botones_distintos" >Log out</a></li>
                         <?php endif; ?>                   

                        </ul>
        
<ul class="nav__responsive-ul">
   
    <div class="boton_hamburguesa-container"><div class="boton_hamburguesa"><a href="#menu"  class="boton_header fa-solid fa-bars boton_menu hamburguesa"></a></div></div>
                 <div class="nav__li-container">
    <li class="nav__responsive-li"><a  href="index.php?seccion=home">Home</a></li>
    <li class="nav__responsive-li"><a  href="index.php?seccion=portfolio">Portfolio</a></li>
    <li class="nav__responsive-li"><a  href="index.php?seccion=contacto">Contacto</a></li>
                    <?php
                        if(isset($_SESSION['usuario']) and $_SESSION['usuario']['ROL_ID'] == 1):
                            ?>                      
                            <li class="nav__responsive-li"><a href="index.php?seccion=adminTrabajos" >Editar trabajos</a></li>

                        <?php endif; 
                            if(!isset($_SESSION['usuario'])):
                        ?>
                        
                        <li class="nav__responsive-li"><a href="index.php?seccion=login"  class="botones_distintos">Iniciar sesión</a></li>
                        

                        
                        <li class="nav__responsive-li"><a href="index.php?seccion=signup"  class="botones_distintos">Registrarse</a></li>
                        

                        <?php else: ?>
                        
                            <li class="nav__responsive-li"><a href="acciones/logout.php" >Cerrar sesión</a></li>
                         <?php endif; ?>   
           
 

                        <?php
                        if(isset($_SESSION['usuario']) and $_SESSION['usuario']['ROL_ID'] == 1):
                            ?>
                       

                        <?php endif; 
                            if(!isset($_SESSION['usuario'])):
                        ?>
                      

                      

                        <?php else: ?>
 <?php endif; ?>
 </div>
 </ul>
 </nav>
                        </header> 
           
    <div class="ui-content">
    <main>
       <div class="container"> 
            <div class="row justify-content-center mt-5">
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div>' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['exito'])) {
                    echo '<div>' . $_SESSION['exito'] . '</div>';
                    unset($_SESSION['exito']);
                }
                $secciones = 'home';
                if (isset($_GET['seccion'])) {
                    $secciones = $_GET['seccion'];
                }
                require_once "secciones/$secciones.php";
                ?>
            </div>
        </div>
    </main>

<footer>
    
        <div class="mt-5" >
            <p class="text-center text-dark pt-3 pb-1">by:<br>
            Shirly Brener |<span class="footer2 fst-italic"> shirly.brener@davinci.edu.ar</span><br>
            Valentina Oriolo |<span class="footer2 fst-italic"> valentina.oriolo@davinci.edu.ar</span><br>
            Mariana Marin |<span class="footer2 fst-italic"> mariana.marin@davinci.edu.ar</span><br>
            Lautaro Ponce | <span class="footer2 fst-italic">lautaro.ponce@davinci.edu.ar</span></p>

    </footer>
    </div>
   
    <script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>