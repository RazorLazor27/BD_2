<?php 
require_once("../includes/perfil_view.inc.php");
?>
<?php include 'base_top.php' ?>

    <div style="text-align: center;">
        <form action="../includes/perfil_view.inc.php" method="post">
        <?php
            MostrarPerfil();    
        ?>
        </form>

      <h3>Logout</h3>
        <form action="../includes/logout.inc.php" method="post">
          <button>Logout</button>
        </form>
    </div>
    
<?php include 'base_bottom.php' ?>