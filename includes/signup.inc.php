<?php
//Apretaron el boton para logear, no intentaron meterse a la fuerza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "bhd.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.in.php";

        //Error Handlres (Evitar que el usuario haga cosas raras o se equivoque en el input)
        if (input_vacio($username,$pwd,$email)) {
        }

        if (mail_valido($email)) {
        }

        if (mail_registrado($pdo, $email)) {
        }

        if (nombre_valido($pdo, $username)){
        }

    } catch (PDOException $e) {
        die ("Query murio :(". $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}