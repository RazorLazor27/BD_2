<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");
?>

<?php include 'base_top.php'?>
  <div class="cuerpo">
    
    <h3>
      <?php
      mostrar_nombre();
      ?>
    </h3>
    
    <h3>Logout</h3>
      <form action="../includes/logout.inc.php" method="post">
      <button>Logout</button>
    </form>

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

    <br>

    <h1>Menú Semanal</h1>

  </div>

<?php include 'base_bottom.php' ?>