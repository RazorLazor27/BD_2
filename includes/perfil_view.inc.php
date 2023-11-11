<?php

declare(strict_types=1);


function MostrarPerfil(){
    if (isset($_SESSION["user_id"])){
        echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        require_once "dbh.inc.php";
        require_once "perfil_model.inc.php";
        $nom = $_SESSION["user_username"];
        $resultado = getDatosPerfil($pdo, $nom);

        foreach ($resultado as $row) {
            echo htmlspecialchars($row["user_name"]);
            echo htmlspecialchars($row["email"]);
            echo htmlspecialchars($row["users_login_date"]);
            echo htmlspecialchars($row["users_login_hour"]);
        }
    } else {
        echo "No hay mano perrito";
    }
     
}