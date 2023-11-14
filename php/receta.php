<?php

include 'base_top.php';

$id = $_GET['id'];

$sql = "select recetas.receta_nombre, ingredientes.ingre_nombre from recetas ";
$sql = $sql . "left join lista_ingredientes on recetas.receta_id = lista_ingredientes.idReceta ";
$sql = $sql . "left join ingredientes on lista_ingredientes.ingre_id = ingredientes.ingre_id  ";
$sql = $sql . "where recetas.receta_id = " . $id . " ";
$sql = $sql . "order by ingredientes.ingre_nombre";

$ingredientes = mysqli_query($conn, $sql);

$id = $_GET['id'];

?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">
<br>

<h1>Receta</h1>'

<table id="Semanal" style="margin-bottom: 50px;">
  <tr>
    <th>Imagen</th>
    <th>Ingrediente</th>
  </tr>
  
  <?php while ($row = mysqli_fetch_assoc($ingredientes)){ ?>
    <tr>
        <td>
            Foto

        </td>

        <td><?php echo $row['ingre_nombre'] ?> </td>
    </tr>
  <?php } ?>
  </table>

</div>


<?php
/* Incrustar franja inferior */
include 'base_bottom.php' 
?>
