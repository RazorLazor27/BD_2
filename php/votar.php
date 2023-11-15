<?php

include 'base_top.php';

$idUser = 0;
$idReceta = 0;

if (isset($_SESSION["user_id"])){
    $idUser = $_SESSION["user_id"];
}

if ($idUser == 0){
    echo "Debe iniciar sesion primero";
}
else{

    if (isset($_POST["idReceta"])) { $idReceta = $_POST["idReceta"]; }     


    $sql = "select count(*) as total from votacion where idReceta=" . $idReceta . " and idUser=". $idUser;

    $votaciones = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($votaciones);

    if ($row['total']>0){
        echo "Votacion ya realizada.";
    }
    else{

        $sql = "select count(*) as total from votacion where idUser=". $idUser;
        $votaciones = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($votaciones);
        if ($row['total']>0){
            echo "Este usuario ya emitió su voto.";
        }
        else{
            $sql = "insert into votacion (idReceta, idUser) values (";
            $sql = $sql . $idReceta . "," . $idUser;
            $sql = $sql . ")";
        
            if ($conn->query($sql) === TRUE){        
                echo "<table id='Almuerzo'><tr><td>Votacion agregada.</td></tr></table>";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }    
}

/* Incrustar franja inferior */
include 'base_bottom.php' 
?>

