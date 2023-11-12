<?php
//Esto es netamente seguridad, restringe el uso de nuestra pagina
ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);

//Esto de aqui configura quien y por cuanto tiempo puede estar alguien conectado a la pagina
session_set_cookie_params([
    "lifetime"=> 1800,
    "domain"=> "localhost",
    "path"=> "/",
    "secure"=> "true",
    "httponly"=> true,
]);


session_start();

if(isset($_SESSION["user_id"])){
    if (!isset($_SESSION["ultimo_valor"])) {
        rehacer_id_loggedin();
    } else {
        $tiempo_sesion = 60*30;
        if(time()-$_SESSION["ultimo_valor"] >= $tiempo_sesion) {
            rehacer_id_loggedin();
        }
    
    }
} else {
    if (!isset($_SESSION["ultimo_valor"])) {
        rehacer_id();
    } else {
        $tiempo_sesion = 60*30;
        if(time()-$_SESSION["ultimo_valor"] >= $tiempo_sesion) {
            rehacer_id();
        }
    }
}

//Si no hemos cambiado el id, entonces cambialo xddd


function rehacer_id(){
    session_regenerate_id(true);
    $_SESSION["ultimo_valor"] = time();
}

function rehacer_id_loggedin(){

    session_regenerate_id(true);

    $user_id = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $user_id;
    session_id($sessionId);

    $_SESSION["ultimo_valor"] = time();
}