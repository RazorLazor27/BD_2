<?php 

//Apretaron el boton para agregar comida
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_SESSION["username"];
    try {
        require_once "dbh.inc.php";

        $errors = [];

        if (receta_seleccionada($username)){
            $errors["trago_seleccionado"] = "El trago ya ha sido seleccionado!";
        }

        //Realisticamente el unico error handler es que si el usuario aprieta mas de 1 vez un boton, no se añada la segunda vez 

    } catch (PDOException $e) {
        die ("Query murio :(". $e->getMessage());
    }

} else {
    header("Location: ../php/login.php");
    die();
}
?>