<?php
include "php/config.php";

?>
<?php session_start(); ?>



<?php //echo $_SERVER["PHP_SELF"]?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CineGchu</title>
    <link type="image/png" sizes="16x16" rel="icon" href="favicon.png">
    <link rel="stylesheet" href="<?php echo SERVERURL?>css/general.css">
    <link rel="stylesheet" href="<?php echo SERVERURL?>css/headerStyles.css">
    <link rel="stylesheet" href="<?php echo SERVERURL?>css/footerStyles.css">
    <link rel="stylesheet" href="<?php echo SERVERURL?>css/header2.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL?>bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo SERVERURL?>css/cardStyles.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>

    <header class="header-fixed">

        <div class="header-limiter">

            <h1><a href="<?php echo SERVERURL?>index.php">Cine<span> Gchu</span></a></h1>



            <nav id="menu">
                <ul>
                    <li><a <?php if(strcmp($_SERVER["PHP_SELF"],"/index.php")==0) echo "class='active'"  ?> href="<?php echo SERVERURL?>index.php">Inicio</a></li>
                    <li><a  <?php if(strcmp($_SERVER["PHP_SELF"],"/cartelera.php")==0) echo "class='active'"  ?> href="<?php echo SERVERURL?>cartelera.php">Cartelera</a></li>
                    <li><a  <?php if(strcmp($_SERVER["PHP_SELF"],"/sucursales.php")==0) echo "class='active'"  ?> href="<?php echo SERVERURL?>sucursales.php">Sucursales</a></li>
                    <li><a  <?php if(strcmp($_SERVER["PHP_SELF"],"/contacto.php")==0) echo "class='active'"  ?> href="<?php echo SERVERURL?>contacto.php">Contactanos</a></li>
                    <?php if (
                        isset($_SESSION["login"]) &&
                        strcmp($_SESSION["rol"], "admin") == 0
                    ) { ?>
                        <li><a href="#">Administración</a>
                            <ul>
                                <li><a href="<?php echo SERVERURL?>banners.php">Banners</a></li>
                                <li><a href="#">Salas</a></li>
                                <li><a href="<?php echo SERVERURL?>banners.php">Peliculas</a></li>
                                <li><a href="<?php echo SERVERURL?>horarios.php">Horarios</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (!isset($_SESSION["login"])) { ?>
                        <li><a href="<?php echo SERVERURL?>login.php">Iniciar Sesión</a></li>
                    <?php } ?>

                    
                    <?php if (isset($_SESSION["login"])) { ?>
                        <li><a  class="usr-name"><?php echo($_SESSION['user']);?></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL?>perfil.php">Perfil</a></li>
                            <li><a href="<?php echo SERVERURL?>historial.php">Historial</a></li>
                            <?php if (isset($_SESSION["login"])) { ?>
                            <li><a href="<?php echo SERVERURL?>logout.php">Salir</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                        <li><a id="linkUsr" href="<?php echo SERVERURL?>perfil.php"><img class="imgUsr" src="<?php echo SERVERURL;echo "img/profile/";echo($_SESSION['pic']);?>" alt=""></a></li>
                    <?php } ?>
                </ul>

            </nav>



        </div>

    </header>