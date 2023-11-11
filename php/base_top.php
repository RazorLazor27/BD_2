<?php 
require_once("../includes/login_view.inc.php");
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
        <a title="Listados de top 10 de mejores y peores recetas según calificación." href="top.php" style="font-size: 35px">TOP 10</a>
        </div>
        <div class = "Boton Votacion">
        <a title="Votación Semanal para elegir el plato de fondo de los días Viernes." href="votacion.php" style="font-size: 35px">Votación semanal</a>
        </div>
        <div class = "Boton Usuario">
        <a title="Inicio de Sesión" href="login.php" style="font-size: 25px">Inicia Sesión</a>
        </div>
        <div class = "Boton Recetas">
        <a title="Búsqueda de recetas históricas del casino USM" href="recetas.php" style="font-size: 25px">Busca tu receta!</a>
        </div>
    </div>

    <h3> Logout </h3>
    <form action="../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>
    <h3> <?php mostrar_nombre()?></h3>

    <!-- Contenido de la página, cuerpo completo de la página -->
