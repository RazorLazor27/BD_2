<?php

/* Incrustar franja superior y conectarse a la base de datos */
include 'base_top.php';

$sql = "select * from recetas ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $filter = "";

  if (isset($_POST["buscar"])) {    
    $filter = " receta_nombre like '%" . $_POST["buscar"] . "%' or receta_instrucciones like '%" . $_POST["buscar"] . "%' ";
  } 
  
  if (isset($_POST["tipos"])){
    $fTipos = "";
    $tipos = $_POST["tipos"];
    if (count($tipos) > 0){
      $cond = " ";
      foreach ($tipos as $tipo){
        $sql = $sql . $cond;
        $sql = $sql . " receta_type = " . $tipo;
        $cond = " or ";
      } 
    }
  }  

  $sql = $sql . " where ";
  $sql = $sql . $filter;

  //echo $sql;

}

$sql = $sql . " order by receta_type";

//echo $sql;

$recetas = mysqli_query($conn, $sql);
?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">
  <br>


<h1>Recetas</h1>'

<form method="post" name="buscar" action="">
  <table>
    </


  <label>Buscar</label>
  <input type="text" name="buscar" />
  <label><input type="checkbox" name="tipos[]" value="1"> Entradas</label>
  <label><input type="checkbox" name="tipos[]" value="2"> Platos</label>
  <label><input type="checkbox" name="tipos[]" value="3"> Postres</label>
  <input type="submit" value="Filtrar">
</form>

<table id="Semanal" style="margin-bottom: 50px;">

  <tr>
    <th>Imagen</th>
    <th>Tipo</th>
    <th>Receta</th>
    <th>Preparacion</th>
    <th>Diabetica</th>
    <th>Lactosa</th>
    <th>Gluten</th>
    <th>Vegana</th>  
    <th>Tiempo</th>  
  </tr>
  
  <?php while ($row = mysqli_fetch_assoc($recetas)){ ?>
    <tr class="tfFila">
      <td class="tdFoto"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receta_foto']); ?>"  height="50" /></td>

      <td class="tdNombre">
        <?php 
          if ($row['receta_type'] == 1) {
              echo "Entrada";
          } elseif ($row['receta_type'] == 2) {
              echo "Plato";
          } elseif ($row['receta_type'] == 3) {
              echo "postre";
          }
        ?> 
      </td>

      <td class="tdNombre"><?php echo $row['receta_nombre']; ?> </td>
      <td class="tdPreparacion"><?php echo $row['receta_instrucciones']; ?> </td>

      <td class="tdOpcion">
        <?php 
          if ($row['receta_diabetico']== 1)
            echo 'Si'; 
          else
            echo 'No'; 
        ?> 
      </td>

      <td class="tdOpcion">
        <?php 
          if ($row['receta_lactosa']== 1)
            echo 'Si'; 
          else
            echo 'No'; 
        ?> 
      </td>

      <td class="tdOpcion">
        <?php 
          if ($row['receta_gluten']== 1)
            echo 'Si'; 
          else
            echo 'No'; 
        ?> 
      </td>
      
      <td class="tdOpcion">
        <?php 
          if ($row['receta_vegan']== 1)
            echo 'Si'; 
          else
            echo 'No'; 
        ?> 
      </td>      
      
      <td class="tdNombre"><?php echo $row['receta_tiempo']; ?> <br>[min]</td>
    </tr>
  <?php } ?>
  </table>

</div>


<?php
/* Incrustar franja inferior */
include 'base_bottom.php' 
?>



