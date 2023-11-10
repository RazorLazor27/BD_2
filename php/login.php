<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");
?>

<?php include 'base_top.php' ?>

    <div style="text-align: center;">
        <form action="../includes/login.inc.php" method="post">
            <h1> Login </h1>
            <?php if (isset($_GET['error'])) { ?> 
                <p class= "error"> <?php echo $_GET['error']; ?> </p>
            <?php } ?>
            
            
            <input type="text" name = "username" placeholder="Nombre y Apellido"> <br>


            
            <input type="password" name = "pwd" placeholder="Contraseña"> <br>

            <button>Iniciar sesión</button>
        </form>
      
        <?php 
        check_login_errors();
        ?>

                
        <h1>Registrarse</h1>

        <form action="../includes/signup.inc.php", method = "post">

            <?php
            signup_inputs();
            ?>
            <button>Crear cuenta nueva</button>

        </form>

        <?php
        check_signup_errors();
        ?>
    </div>
    
<?php include 'base_bottom.php' ?>