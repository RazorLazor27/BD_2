<?php

/* Incrustar franja superior y conectarse a la base de datos */
include 'base_top.php';

$sql = "select ";
$sql = $sql . "receta_id, receta_foto, receta_nombre, receta_instrucciones, receta_tiempo, receta_diabetico, receta_lactosa, receta_gluten, receta_vegan, receta_type ";
$sql = $sql . "from recetas ";
$sql = $sql . "left join lista_ingredientes on recetas.receta_id = lista_ingredientes.idReceta ";
$sql = $sql . "left join ingredientes on lista_ingredientes.ingre_id = ingredientes.ingre_id  ";

$buscar = "";
$ingredientes = "";

$entrada = false;
$fondo = false;
$postre = false;

$diabetico = "";
$lactosa = "";
$gluten = "";
$vegana = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $filter = "";
  $conector = "";

  if (isset($_POST["buscar"])) {
    $buscar = $_POST["buscar"];    
    if (strlen($buscar) > 0){
      $filter = $filter . " (receta_nombre like '%" . $_POST["buscar"] . "%' or receta_instrucciones like '%" . $_POST["buscar"] . "%') ";
      $conector = " and ";
    }
  } 

  if (isset($_POST["tipos"])){

    

    $fTipos = "";
    $tipos = $_POST["tipos"];
    if (count($tipos) > 0){
      $cond = " ";
      $ftrType = "(";

      foreach ($tipos as $tipo){        
        if ($tipo == 1) $entrada = true;
        if ($tipo == 2) $fondo = true;
        if ($tipo == 3) $postre = true;
        $ftrType = $ftrType . $cond . " receta_type = " . $tipo;
        $cond = " or ";
      } 

      $ftrType = $ftrType . ")";            
    }

    $filter = $filter . $conector . $ftrType;
    $conector = " and ";

    
  }
  

  if (isset($_POST["diabetico"])) {    
    $diabetico = $_POST["diabetico"];
    if (strlen($diabetico) > 0){
      $filter = $filter . $conector . " receta_diabetico = '" . $_POST["diabetico"] . "' ";
      $conector = " and ";    
    }
  } 

  if (isset($_POST["lactosa"])) {    
    $lactosa = $_POST["lactosa"];
    if (strlen($lactosa) > 0){
      $filter = $filter . $conector . " receta_lactosa = '" . $_POST["lactosa"] . "' ";
      $conector = " and ";
    }
  }

  if (isset($_POST["gluten"])) {    
    $gluten = $_POST["gluten"];
    if (strlen($gluten) > 0){
      $filter = $filter . $conector . " receta_gluten = '" . $_POST["gluten"] . "' ";
      $conector = " and ";
    }
  }

  if (isset($_POST["vegana"])) {    
    $vegana = $_POST["vegana"];
    if (strlen($vegana) > 0){
      $filter = $filter . $conector . " receta_vegan = '" . $_POST["vegana"] . "' ";
      $conector = " and ";
    }
  }

  if (isset($_POST["ingredientes"])) {
    $ingredientes = $_POST["ingredientes"];    
    if (strlen($ingredientes) > 0){
      $filter = $filter . $conector . " ingredientes.ingre_nombre like '%" . $_POST["ingredientes"] . "%' ";
      $conector = " and ";
    }
  } 
  


  if (strlen($filter))
  {
    $sql = $sql . " where ";
    $sql = $sql . $filter;  
  }
}

$sql = $sql . " group by receta_id, receta_foto, receta_nombre, receta_instrucciones, receta_tiempo, receta_diabetico, receta_lactosa, receta_gluten, receta_vegan, receta_type ";
$sql = $sql . " order by receta_type";

//echo $sql;

$recetas = mysqli_query($conn, $sql);
?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">

<h1>Recetas</h1>'

<div class="busqueda" >
  <form method="post" name="buscar" action="">
    
  <label>Buscar</label>
  <input type="text" name="buscar" <?php echo "value='" . $buscar . "' " ?> />  
  <label><input type="checkbox" name="tipos[]" <?php if (strlen($entrada) > 0) { echo "checked"; } ?> value="1"> Entradas</label>
  <label><input type="checkbox" name="tipos[]" <?php if (strlen($fondo) > 0) { echo "checked"; } ?> value="2"> Fondo</label>
  <label><input type="checkbox" name="tipos[]" <?php if (strlen($postre) > 0) { echo "checked"; } ?> value="3"> Postres</label>

  <label style="font-size: 20px;" class="separador"> | </label>
  <label>Especial</label>
  
  <label><input type="checkbox" name="diabetico" <?php if (strlen($diabetico) > 0) { echo "checked"; } ?> value="1"> Diabetico</label>
  <label><input type="checkbox" name="lactosa" <?php if (strlen($lactosa) > 0) { echo "checked"; } ?> value="1" > Lactosa</label>
  <label><input type="checkbox" name="gluten" <?php if (strlen($gluten) > 0) { echo "checked"; } ?> value="1"> Gluten</label>
  <label><input type="checkbox" name="vegana" <?php if (strlen($vegana) > 0) { echo "checked"; } ?> value="1"> Vegana</label>

  <label style="font-size: 20px;" class="separador"> | </label>
  
  <label>Ingredientes</label>
  <input type="text" name="ingredientes"  <?php echo "value='" . $ingredientes . "' " ?> />
  <input type="submit" value="Filtrar">

  </form>
</div>

<table>

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
    <th>Añadir a Favoritos</th>
    <th>Calificar</th>
  </tr>
  
  <?php while ($row = mysqli_fetch_assoc($recetas)){ ?>
    <tr class="tfFila">

      <td class="tdFoto">
        <a title="Ingredientes" <?php echo "href=receta.php?id=" . $row['receta_id'] . " " ?>  >        
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receta_foto']); ?>"  height="50" />
        </a>
      </td>

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

      <td class="tdOpcion">
        
          <form action="../includes/userfood.inc.php" method="post">
            <input type="hidden" name="id_receta_user" value=<?php echo $row["receta_id"] ?> >
            <button>Agregar</button>
          </form>
      </td>

		<td class="tdCalificar">

			<a title="1" <?php echo "href=calificar.php?idReceta=" . $row['receta_id'] . "&calificacion=1" ?>  >
				<img src='../images/star.png' width="24" height="24"/>				
			</a>

			<a title="2" <?php echo "href=calificar.php?idReceta=" . $row['receta_id'] . "&calificacion=2" ?>  >
				<img src='../images/star.png' width="24" height="24"/>
			</a>

			<a title="3" <?php echo "href=calificar.php?idReceta=" . $row['receta_id'] . "&calificacion=3" ?>  >
				<img src='../images/star.png' width="24" height="24"/>
			</a>

			<a title="4" <?php echo "href=calificar.php?idReceta=" . $row['receta_id'] . "&calificacion=4" ?>  >
				<img src='../images/star.png' width="24" height="24"/>
			</a>

			<a title="5" <?php echo "href=calificar.php?idReceta=" . $row['receta_id'] . "&calificacion=5" ?>  >
				<img src='../images/star.png' width="24" height="24"/>
			</a>

		</td>


    </tr>
  <?php } ?>
  </table>

</div>


<?php
/* Incrustar franja inferior */
include 'base_bottom.php';

?>



