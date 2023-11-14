<?php 

declare(strict_types= 1);

//Si esta funcion retorna verdadero, entonces la comida seleccionada ya existe en la lista del usuario,
//Por ende, no agregar


function get_receta(object $pdo, int $idUser, int $idComida){
    $query = "SELECT receta_id FROM users_fav_food WHERE receta_id = :receta AND ;";

    $stmt = $pdo->prepare($query);
    //$stmt->bindParam(":email", $mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>