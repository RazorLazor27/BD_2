<?php

declare(strict_types= 1);

function get_user(object $pdo, string $username){
    $query = "SELECT * FROM users WHERE user_name = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_user(object $pdo, string $username){
    $tdate=date("Y-m-d");
    $ttime=date("H:i:s");

    $query = "UPDATE users SET users_login_date = :date, users_login_hour = :time WHERE user_name = :username";

    // Prepare the query
    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':date', $tdate);
    $stmt->bindParam(':time', $ttime);
    $stmt->bindParam(':username', $username);

    $stmt->execute();
}