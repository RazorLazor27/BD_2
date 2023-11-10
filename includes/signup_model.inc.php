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

