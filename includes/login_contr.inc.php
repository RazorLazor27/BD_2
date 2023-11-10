<?php

declare(strict_types= 1);

function usuario_no_existe(bool|array $result){
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function contrasena_no_existe(string $pwd, string $hashpwd){
    if (!password_verify($pwd, $hashpwd)) {
        return true;
    } else {
        return false;
    }
}

function input_vacio(string $username, string $pwd){
    if (empty($username) || empty($pwd)){
        return true;
    } else {
        return false;
    }
}