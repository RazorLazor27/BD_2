<?php 
require_once("../includes/perfil_view.inc.php");
?>
<?php include 'base_top.php' ?>

    <div style="text-align: center;">
        <form action="../includes/perfil_view.inc.php" method="post">

            <p> <?php echo getMail(); ?>  </p>
            <p> <?php echo getLoginDate(); ?> </p>
            <p> <?php echo getLoginTime(); ?> </p>
            <p> <?php echo getName(); ?> </p>
        
        </form>

      <h3>Logout</h3>
        <form action="../includes/logout.inc.php" method="post">
          <button>Logout</button>
        </form>
    </div>
    
<?php include 'base_bottom.php' ?>