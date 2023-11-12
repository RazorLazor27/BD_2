<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_SESSION["user_username"];
    $id = $_SESSION["user_id"];

    try {
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE id= :id;";
        $stmt = $pdo->prepare($query);


        $stmt->bindParam(":id", $id);
       
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: logout.inc.php");
        die();

    } catch (PDOException $e) {
        die("Query Failed". $e->getMessage());
    }


} else {
    header("Location: ../php/login.php");
    die();
}
?>