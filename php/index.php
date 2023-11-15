<?php 
/* Incrustar franja superior*/ 
include 'base_top.php';

$entrada = mysqli_query($conn, "select * from recetas where receta_type=1 limit 1");
$plato = mysqli_query($conn, "select * from recetas where receta_type=2 limit 1");
$postre = mysqli_query($conn, "select * from recetas where receta_type=3 limit 1");

$p1 = mysqli_fetch_assoc($entrada);
$p2 = mysqli_fetch_assoc($plato); 
$p3 = mysqli_fetch_assoc($postre);  

$entradas = mysqli_query($conn, "select * from recetas where receta_type=1 limit 5");
$platos = mysqli_query($conn, "select * from recetas where receta_type=2 limit 4");
$postres = mysqli_query($conn, "select * from recetas where receta_type=3 limit 5");
?>

<div class="cuerpo">
  <div style="min-height: 70vh;">
  <h1>Menú de hoy</h1>

    <table id="Almuerzo">
      <tr>
        <th>Plato de Entrada</th>
        <td> 
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p1['receta_foto']); ?>"  height="50" /> 
          <br>
          <?php echo $p1['receta_nombre'] ?>  
        </td>
      </tr>

      <tr>
        <th>Plato de Fondo  </th>
        <td> 
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p2['receta_foto']); ?>"  height="50" /> 
          <br>
          <?php echo $p2['receta_nombre'] ?>  
        </td>
      </tr>

      <tr>
        <th>Postre          </th>
        <td> 
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p3['receta_foto']); ?>"  height="50" /> 
          <br>
          <?php echo $p3['receta_nombre'] ?>  

        </td>
      </tr>
    </table>

  </div>

  <br>


<h1>Menú Semanal</h1>'

<table id="Semanal" style="margin-bottom: 50px;">
  <tr>
    <th>Lunes</th>
    <th>Martes</th>
    <th>Miércoles</th>
    <th>Jueves</th>
    <th>Viernes</th>
  </tr>

  <tr>
  <?php while ($row = mysqli_fetch_assoc($entradas)){ ?>
      <td class="col1">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receta_foto']); ?>"  height="50" /> 
      <br>
      <?php echo $row['receta_nombre'] ?> 
      </td>
  <?php } ?>
  </tr>

  <tr>
    <?php while ($row = mysqli_fetch_assoc($platos)){?>
    <td class="col1">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receta_foto']); ?>"  height="50" /> 
    <br>
    <?php echo $row['receta_nombre'] ?> 
    </td>
    <?php } ?>
  </tr>

  <tr>
    <?php while ($row = mysqli_fetch_assoc($postres)) { ?>
    <td class="col1">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receta_foto']); ?>"  height="50" /> 
    <br>
    <?php echo $row['receta_nombre'] ?> 
    </td>
    <?php } ?>
  </tr>

  </table>

</div>

<?php include 'base_bottom.php' ?>