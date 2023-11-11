<?php
//Apretaron el boton para logear, no intentaron meterse a la fuerza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];



    try {
        require_once "dbh.inc.php";
        require_once "perfil_model.inc.php";

        $result = getDatosPerfil($pdo, $username);

        $_SESSION["user_mail"] = $result["email"];



    }
}
