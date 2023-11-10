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
    $query = "INSERT INTO users (user_name, user_password, email) VALUES
    (:username, :pwd, :email)";
    $stmt = $pdo->prepare($query);
    
    $options = [
        'cost' => 12
    ];

    $hashpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashpwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}

