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

        <form action="../includes/userdelete.inc.php" method="post">
            <p>Si desea borrar su cuenta, favor de apretar el siguiente boton</p>
            <button onclick="borrar_cuenta_click()">Borrar Cuenta</button>
            <p id="demo"></p>
        </form>
    </div>

    <html>
    <head>
        <script>
            function borrar_cuenta_click() {
                var x;
                var r = confirm("¿Estas Seguro De Querer Borrar tu Cuenta?");
                if (r == true) {
                x = "Confirmado.";
                setTimeout(function() {
                    document.getElementById("demo").innerHTML = "Esperando 1 segundo ...";
                },1000);
            }
                else {
                x = "";
            }
            document.getElementById("demo").innerHTML = x;
        }
        </script>
    </head>
    </html> 

    
    
<?php include 'base_bottom.php' ?>