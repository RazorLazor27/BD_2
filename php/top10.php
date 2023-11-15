<?php

include 'base_top.php';


$sql = "select r.receta_nombre as nombre, c.idreceta as receta, AVG(c.calificacion) as promedio from calificacion as c ";
$sql = $sql . "left join recetas as r on c.idreceta = r.receta_id  ";
$sql = $sql . "group by r.receta_nombre, c.idreceta ";
$sql = $sql . "order by c.calificacion desc  ";

$calificaciones = mysqli_query($conn, $sql);


?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">
<br>

<h1>Receta</h1>'

<table id="Semanal" style="margin-bottom: 50px;">
  <tr>
    <th>Receta Id</th>
    <th>Nombre</th>
    <th>Calificacion</th>
  </tr>
  
  <?php while ($row = mysqli_fetch_assoc($calificaciones)){ ?>
    <tr>
        <td class="tdNombre"><?php echo $row['receta']; ?> </td>
        <td class="tdNombre"><?php echo $row['nombre']; ?> </td>
        <td class="tdNombre"><?php echo $row['promedio']; ?> </td>
    </tr>
  <?php } ?>
  </table>

</div>


<?php
/* Incrustar franja inferior */
include 'base_bottom.php' 
?>
