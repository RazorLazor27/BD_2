<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        $errors = [];

        if (input_vacio($username, $pwd)){
            $errors["input_vacio"] = "Por favor llenar todos los campos";
        }

        $result = get_user($pdo, $username);

        if (usuario_no_existe($result)){
            $errors["login_incorrecto"] = "Informacion del Login incorrecta!";
        }

        

        require_once("config_session.inc.php");

        if ($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        
        $_SESSION["ultimo_valor"] = time();


        header("Location: ../php/index.php?login=success");
        $pdo = null;
        $statement = null;
        die();




    } catch (PDOException $e) {
        die("Query Failed". $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}

