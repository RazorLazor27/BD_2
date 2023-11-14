<?php 
session_start();
//Apretaron el boton para agregar comida
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $username = $_SESSION["user_username"];
    $idUser = $_SESSION["user_id"];
    $idComida = $_POST["id_receta_user"];  
    try {
        require_once "dbh.inc.php";
        require_once "userfood_model.inc.php";
        require_once "userfood_contr.inc.php";


        $errors = [];
        $idComida = (int) $idComida;
        $idUser = (int) $idUser;

        if (receta_seleccionada($pdo, $idUser, $idComida)){

            $errors["trago_seleccionado"] = "El plato ya ha sido seleccionado!";
        }

        if ($errors){
            $_SESSION["errors_food"] = $errors;
            header("Location: ../php/recetas.php");
            die();
        }

        anadir_comida($pdo, $idUser, $idComida);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        header("Location: ../php/recetas.php");

        $pdo = null;
        $stmt = null;
        die();
        

        //Realisticamente el unico error handler es que si el usuario aprieta mas de 1 vez un boton, no se añada la segunda vez 

    } catch (PDOException $e) {
        die ("Query murio :(". $e->getMessage());
    }

} else {
    header("Location: ../php/login.php");
    die();
}
?>