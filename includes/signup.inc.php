<?php
//Apretaron el boton para logear, no intentaron meterse a la fuerza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        //Error Handlres (Evitar que el usuario haga cosas raras o se equivoque en el input)
        $errors = [];
        
        if (input_vacio($username,$pwd,$email)) {
            $errors["input_vacio"] = "Porfavor llenar todos los campos";
        }

        if (mail_valido($email)) {
            $errors["mail_valido"] = "Este formato de email no es valido, Por favor escribir un email valido";
        }

        if (mail_registrado($pdo, $email)) {
            $errors["mail_registrado"] = "Este email ya esta registrado, por favor seleccionar otro";
        }

        if (nombre_valido($pdo, $username)){
            $errors["nombre_valido"] = "Este nombre de usuario ya ha sido registrado previamente";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email"=> $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../login.php");
            die();
        }

        crear_usuario($pdo, $username, $pwd, $email);
        header("Location: ../login.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die ("Query murio :(". $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}