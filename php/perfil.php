<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");
require_once("../includes/perfil_view.inc.php");
?>
<?php include 'base_top.php' ?>

    <div style="text-align: center;">
        <form action="../includes/perfil_view.inc.php" method="post">
        <?php
            MostrarPerfil();
            
        ?>
        </form>
    </div>
    
<?php include 'base_bottom.php' ?>