<?php
//Apretaron el boton para logear, no intentaron meterse a la fuerza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];

    try {
        require_once "dbh.inc.php";
        
        header("Location: ../php/perfil.php");

        $pdo = null;
        $statement = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed". $e->getMessage());
    }



} else {
    header("Location: ../php/login.php");
    die();
}

