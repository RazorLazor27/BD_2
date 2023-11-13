<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");

/* Conectarse a la base en MySQL */
include '../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/estilo.css">

  <!-- Contenido de la pestaña -->
  <link rel="icon" type="images/png" href="../images/jalea.png" />
  <title> Sabor USM </title>

</head>

<body>

    <!-- Cabecera/Menú -->
    <div class="cabeza">
        <div class = "Boton Logo">
        <a href="index.php" >
            <img title="Sabor USM" src="../images/logo.png" width="169px">
        </a>
        </div>
        <div class = "Boton Top_10">
        <a class="FullBoton" title="Listados de top 10 de mejores y peores recetas según calificación." href="top.php">TOP 10</a>
        </div>
        <div class = "Boton Votacion">
        <a class="FullBoton" title="Votación Semanal para elegir el plato de fondo de los días Viernes." href="votacion.php">Votación semanal</a>
        </div>
        <div class = "Boton Usuario">
            <?php
            //Esto significa que estamos logeados
            if (isset($_SESSION["user_id"])) { ?>
                <a class="MedioBoton" title="Perfil de Usuario" href="perfil.php">Perfil</a>
                <?php 
            } else { ?>
                <a class="MedioBoton" title="Inicio de Sesión" href="login.php">Inicia Sesión</a>
                <?php
            } ?>
        
        </div>
        <div class = "Boton Recetas">
        <a class="MedioBoton" title="Búsqueda de recetas históricas del casino USM" href="recetas.php">Busca tu receta!</a>
        </div>
    </div>
    <!-- Contenido de la página, cuerpo completo de la página -->
