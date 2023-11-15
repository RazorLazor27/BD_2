<?php

/* Incrustar franja superior y conectarse a la base de datos */
include 'base_top.php';

$idUser = 0;

if (isset($_SESSION["user_id"])){
    $idUser = $_SESSION["user_id"];
}

if ($idUser == 0){
  echo "Debe iniciar sesion primero";
}
else{



$sql = "select ";
$sql = $sql . "receta_id, receta_foto, receta_nombre, receta_instrucciones, receta_tiempo, receta_diabetico, receta_lactosa, receta_gluten, receta_vegan, receta_type ";
$sql = $sql . "from recetas ";
$sql = $sql . "left join lista_ingredientes on recetas.receta_id = lista_ingredientes.idReceta ";
$sql = $sql . "left join ingredientes on lista_ingredientes.ingre_id = ingredientes.ingre_id  ";
$sql = $sql . " group by receta_id, receta_foto, receta_nombre, receta_instrucciones, receta_tiempo, receta_diabetico, receta_lactosa, receta_gluten, receta_vegan, receta_type ";
$sql = $sql . " order by receta_type";


$sqlFondo = "select * from recetas as r ";
$sqlFondo = $sqlFondo . "left join votacion as v on v.idReceta = r.receta_id ";
$sqlFondo = $sqlFondo . "where receta_type=2 limit 3";

$platos = mysqli_query($conn, $sqlFondo);

$recetas = mysqli_query($conn, $sql);
?>

<style>
<?php include '../css/recetas.css'; ?>
</style>

<div class="cuerpo">

<h1>Recetas</h1>'


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
    <th>Votar</th>    
  </tr>
  
  <?php while ($row = mysqli_fetch_assoc($platos)){ ?>
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
        
        <form action="votar.php" method="post">
          <input type="hidden" name="idReceta" value=<?php echo $row["receta_id"] ?> >          
          <button>Votar</button>
        </form>
    </td>




    </tr>
  <?php } ?>
  </table>

</div>


<?php
}

/* Incrustar franja inferior */
include 'base_bottom.php';

?>