<?php
include 'base_top.php';

$idUser = 0;
$comentarios = "";

if (isset($_SESSION["user_id"])){
    $idUser = $_SESSION["user_id"];
}

$idReceta = $_GET['idReceta'];
$calificacion = $_GET['calificacion'];

?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">
    <br>
    <h1>Calificación</h1>'

    <form method="post" name="calificar" action="calificar2.php">
        <table id="Semanal" >

            <tr>
                <th style="width: 100px; text-align:left;">
                    Receta
                </th>
                <td>
                    <input type="text" name="idReceta" <?php echo "value='" . $idReceta . "' " ?> />  
                    
                </td>
            </tr>

            <tr>
                <th style="width: 100px; text-align:left;">
                    Calificación
                </th>
                <td>
                    <input type="text" name="calificacion" <?php echo "value='" . $calificacion . "' " ?> />                      
                </td>
            </tr>

            <tr>
                <th style="width: 100px; text-align:left;">
                    Comentarios
                </th>
                <td>
                    
                    <input class="comentarios" type="text"  name="comentarios" />
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value="Calificar"></td>
            </tr>

        </table>
    </form>
</div>

<?php
/* Incrustar franja inferior */
include 'base_bottom.php' 
?>