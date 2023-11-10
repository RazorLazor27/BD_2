<?php 
require_once("includes/signup_view.inc.php");
require_once("includes/config_session.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOGIN </title>
</head>
<body>

    <form action="login.php" method="post">
        <h2> LOGIN </h2>
        <?php if (isset($_GET['error'])) { ?> 
            <p class= "error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        
        
        <input type="text" name = "username" placeholder="Nombre de usuario"> <br>

        
        <input type="password" name = "password" placeholder="Contraseña"> <br>

        <button type="submit">Iniciar sesión</button>
    </form>

            
    <h2>Signup</h2>

    <form action="includes/signup.inc.php", method = "post">

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