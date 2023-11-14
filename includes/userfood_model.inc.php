<?php 

declare(strict_types= 1);


function receta_seleccionada(object $pdo, int $idUser, int $idComida){
    
    $query = "INSERT INTO users (user_name, user_password, email, user_num_almuerzos, 
    users_login_date, users_login_hour) VALUES
    (:username, :pwd, :email, :num, :tdate, :ttime)";
}

?>