<?php
$host = 'localhost';
$dbuser = "root";

$dbname;
$dbpassword;

$admin = "DESKTOP-BC8H7JT";
$hostname = gethostname();

if ($hostname == $admin){
    $dbname = "tarea_2_bd";
    $dbpassword = "!Razorlazor123";
} else {
    $dbname = "primerabase";
    $dbpassword = "";
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection Failed: ". $e->getMessage());
}
