<?php 

declare(strict_types= 1);

//Si esta funcion retorna verdadero, entonces la comida seleccionada ya existe en la lista del usuario,
//Por ende, no agregar


function get_receta(object $pdo, int $idUser, int $idComida){
    $query = "SELECT receta_id FROM users_fav_food WHERE receta_id = :receta AND id = :id_user;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id_user", $idUser);
    $stmt->bindParam("receta", $idComida);
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_comida(object $pdo, int $idUser, int $idComida){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $query = "INSERT INTO users_fav_food (receta_id,id) VALUES (:id_receta,:id_user)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id_receta", $idComida);
    $stmt->bindParam(":id_user", $idUser);
    $stmt->execute();
}

?>