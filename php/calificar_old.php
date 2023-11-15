<?php
include 'base_top.php';

$idUser = 0;
$comentarios = "";

if (isset($_SESSION["user_id"])){
    $idUser = $_SESSION["user_id"];
}

$idReceta = $_GET['Receta'];
$calificacion = $_GET['calificacion'];

?>

<div class="titulo">
    <h1>Calificar</h1>'
</div>

<?php

if ($idUser == 0){
    echo "<table id='Almuerzo'><tr><td>Debe iniciar session antes de calificar una receta</td></tr></table>";
}
else{

    ?>

    <style>
    <?php include '../css/recetas.css'; ?>
    </style>

    <form method="post" name="buscar" action="">

        <table >
            <tr>
                <th>
                    Receta
                </th>
            </tr>
            <tr>
                <td>
                    llaskjdlaksjdl
                </td>
            </tr>
        </table>

    </form>


    <?php

    /*
    $sql = "insert into calificacion (idReceta, idUser, calificacion, comentarios) values (";
    $sql = $sql . $idReceta . "," . $idUser . "," . $calificacion . ",'"  . $comentarios . "'";
    $sql = $sql . ")";

    if ($conn->query($sql) === TRUE){        
        echo "<table id='Almuerzo'><tr><td>Calificacion agregada.</td></tr></table>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    */


}


?>

<?php

include 'base_bottom.php';

?>