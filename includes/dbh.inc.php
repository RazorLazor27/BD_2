<?php
$host = 'localhost';
$dbname = "tarea_2_bd";
$dbuser = "root";
$dbpassword = "!Razorlazor123";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection Failed: ". $e->getMessage());
}
