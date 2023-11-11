<?php
//Apretaron el boton para logear, no intentaron meterse a la fuerza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    try {
        require_once "dbh.inc.php";
        require_once "perfil_model.inc.php";

        $result = getDatosPerfil($pdo, $username);

        foreach ($result as $key => $value) {
            echo "$key: $value\n";
        }

        $_SESSION["user_mail"] = $result["email"];



    }
}
