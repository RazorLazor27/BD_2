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
        
        <label> Nombre de Usuario </label>
        <input type="text" name = "username" placeholder="User Name"> <br>

        <label> Password </label>
        <input type="password" name = "password" placeholder="password"> <br>

        <button type="submit">LOGIN</button>
    </form>

            
    <h3>Signup</h3>

    <form action="includes/signup.inc.php", method = "post">

        <input type="text" name="username" placeholder="Nombre de Usuario">
        <input type="password" name="pwd"placeholder="Contraseña">
        <input type="text" name="email"placeholder="E-Mail">
        <button>Signup</button>

    </form>

    <?php
    check_signup_errors();
    ?>

</body>
</html>