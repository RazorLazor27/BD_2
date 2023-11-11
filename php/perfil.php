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
            $hostname = gethostname();
            $nameee = "DESKTOP-BC8H7JT";
            if ($hostname == $nameee){
                //echo "The name of your computer is: $hostname";
            } else {
                echo "The name of your computer is: $hostname";
            }
            
            
        ?>
        </form>

      <h3>Logout</h3>
        <form action="../includes/logout.inc.php" method="post">
          <button>Logout</button>
        </form>
    </div>
    
<?php include 'base_bottom.php' ?>