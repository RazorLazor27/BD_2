<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");
?>

<?php include 'base_top.php'?>
  <div class="cuerpo">
    <div style="min-height: 70vh;">
    <h1>Menú de hoy</h1>

      <table id="Almuerzo">
        <tr>
          <th>Plato de Entrada</th>
          <td>Platito</td>
        </tr>
        <tr>
          <th>Plato de Fondo</th>
          <td>Platito</td>
        </tr>
        <tr>
          <th>Postre</th>
          <td>Platito</td>
        </tr>
      </table>
    </div>
    <br>

    <h1>Menú Semanal</h1>

    <table id="Semanal" style="margin-bottom: 50px;">
      <tr>
        <th class="colh col1">Lunes</th>
        <th class="colh col2">Martes</th>
        <th class="colh col3">Miércoles</th>
        <th class="colh col4">Jueves</th>
        <th class="colh col5">Viernes</th>
      </tr>
      <tr>
        <td class="col1">Entrada</td>
        <td class="col2">Entrada</td>
        <td class="col3">Entrada</td>
        <td class="col4">Entrada</td>
        <td class="col5">Entrada</td>
      </tr>
      <tr>
        <td class="col1">Fondo</td>
        <td class="col2">Fondo</td>
        <td class="col3">Fondo</td>
        <td class="col4">Fondo</td>
        <td class="col5">Fondo</td>
      </tr>
      <tr>
        <td class="col1">Postre</td>
        <td class="col2">Postre</td>
        <td class="col3">Postre</td>
        <td class="col4">Postre</td>
        <td class="col5">Postre</td>
      </tr>
    </table>

  </div>

<?php include 'base_bottom.php' ?>