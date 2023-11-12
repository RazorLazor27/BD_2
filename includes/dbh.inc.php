<?php

$servername="localhost";
$username ="admin";
$password = "!dBeK8jy21r/3nMt";
$database = "primerabase";

try {
    $pdo = new PDO("mysql:host=$servename;dbname=$database", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection Failed: ". $e->getMessage());
}
