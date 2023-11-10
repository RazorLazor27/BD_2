<?php 
require_once("../includes/signup_view.inc.php");
require_once("../includes/config_session.inc.php");
require_once("../includes/login_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOGIN </title>
</head>
<body>

    <form action="../includes/login.php" method="post">
        <h2> LOGIN </h2>
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

</body>
</html>