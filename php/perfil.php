<?php 
require_once("../includes/perfil_view.inc.php");
?>
<?php include 'base_top.php' ?>
<html>  
    <div class="card_profile">
        <form action="../includes/perfil_view.inc.php" method="post">

            <p> Nombre de Usuario: <?php echo getName(); ?>  </p>
            <p> Correo Usuario: <?php echo getMail(); ?> </p>
            <p> Ultima Fecha de Sesion: <?php echo getLoginDate(); ?> </p>
            <p> Ultima Hora de Sesion: <?php echo getLoginTime(); ?> </p>
            <p> <?php // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';?> </p>
        
        </form>

            <h3>Logout</h3>
            <p>Apretar aqui si desea salir de la sesion</p>
            <form action="../includes/logout.inc.php" method="post">
                <button>Cerrar la Sesion</button>
            </form>
            
        <form action="../includes/userdelete.inc.php" method="post">
            <p>Si desea borrar su cuenta, favor de apretar el siguiente boton</p>
            <button onclick="return borrar_cuenta_click()">Borrar Cuenta</button>
            <p id="demo"></p>
        </form>

            
        <script>
            function borrar_cuenta_click() {
                var r = confirm("¿Estas Seguro De Querer Borrar tu Cuenta?");
                if (r == true) {
                    var form = document.getElementById("delete-form");
                    <?php $_SESSION["delete"] = 1; ?>
                    form.submit();
                } else {
                    <?php $_SESSION["delete"] = 0; ?>
                    return false;
                }
            }
        </script>
    </div>
    

</html> 

    
    
<?php include 'base_bottom.php' ?>