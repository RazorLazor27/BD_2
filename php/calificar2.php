<?php
include 'base_top.php';    

$idUser = 0;

if (isset($_SESSION["user_id"])){
    $idUser = $_SESSION["user_id"];
}

$idReceta = 0;
$calificacion = 0;
$comentarios = "";

if (isset($_POST["idReceta"])) { $idReceta = $_POST["idReceta"]; } 
if (isset($_POST["calificacion"])) { $calificacion = $_POST["calificacion"]; } 
if (isset($_POST["comentarios"])) { $comentarios = $_POST["comentarios"]; } 

?>
    
<style>
    <?php include '../css/recetas.css'; ?>
</style>

<?php

//echo "Listo";

if ($idUser == 0){
    echo "<div>Debe iniciar sesion primero</div>";
}
else{
    $sql = "insert into calificacion (idReceta, idUser, calificacion, comentarios) values (";
    $sql = $sql . $idReceta . "," . $idUser . "," . $calificacion . ",'"  . $comentarios . "'";
    $sql = $sql . ")";

    if ($conn->query($sql) === TRUE){        
        echo "<table id='Almuerzo'><tr><td>Calificacion agregada.</td></tr></table>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}




include 'base_bottom.php';

?>