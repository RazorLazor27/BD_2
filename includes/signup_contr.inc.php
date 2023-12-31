<?php

//trampa antiweones (yo)
declare(strict_types= 1);


//La funcion chequea que el usuario llena todos los campos de una solicitud
function input_vacio(string $username, string $pwd, string $email){
    if (empty($username) || empty($pwd) || empty($email)){
        return true;
    } else {
        return false;
    }
}

//Revisa si el syntax del email es valido
function mail_valido(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

//Evita que alguien cree un usuario con un correo que ya existe
function mail_registrado(object $pdo, string $email){
    if (get_mail($pdo, $email)){
        return true;
    } else {
        return false;
    }
}

//Si el nombre de usuario ya esta tomado por alguien mas
function nombre_valido(object $pdo, string $username){
    if (get_username($pdo, $username)){
        return true;
    } else {
        return false;
    }
}

function crear_usuario(object $pdo, string $username, string $pwd, string $email){
    set_usuario($pdo, $username, $pwd, $email);
}



