<?php

//trampa antiweones (yo)
declare(strict_types= 1);


function get_username(object $pdo, string $username){
    $query = "SELECT user_name FROM users WHERE user_name = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_mail(object $pdo, string $mail){
    $query = "SELECT email FROM users WHERE email= :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_usuario(object $pdo, string $username, string $pwd, string $email){
    $query = "INSERT INTO users (user_name, user_password, email, user_num_almuerzos, 
    users_login_date, users_login_hour) VALUES
    (:username, :pwd, :email, :num, :tdate, :ttime)";
    $stmt = $pdo->prepare($query);
    
    $options = [
        'cost' => 12
    ];

    $numerito = 0;
    $dateActual = date("Y-m-d");
    $timeActual = date("H:i:s");



    $hashpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashpwd);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":num", $numerito);
    $stmt->bindParam(":tdate", $dateActual);
    $stmt->bindParam(":ttime", $timeActual);
    $stmt->execute();
}

