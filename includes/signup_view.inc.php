<?php

//trampa antiweones (yo)
declare(strict_types= 1);

function signup_inputs(){

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["nombre_valido"])) {
        echo '<input type="text" name="username" placeholder="Nombre de Usuario" value="' . $_SESSION["signup_data"]["username"] . '">';

    } else {
        echo '<input type="text" name="username" placeholder="Nombre de Usuario">';
    }

    echo '<input type="password" name="pwd" placeholder="Contraseña">';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["mail_valido"]) && !isset($_SESSION["errors_signup"]["mail_registrado"])) {
        echo '<input type="text" name="email" placeholder="E-Mail" value="' . $_SESSION["signup_data"]["email"] . '">';

    } else {
        echo '<input type="text" name="email" placeholder="E-Mail">';
    }
}

function check_signup_errors(){
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">'. $error ."</p>";
        }

        unset($_SESSION["errors_signup"]);
    } else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<p class= "form-success"> Signup completado!</p>';
    }
}