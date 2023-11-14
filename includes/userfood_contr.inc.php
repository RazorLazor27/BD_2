<?php

//trampa antiweones (yo)
declare(strict_types= 1);

function receta_seleccionada(object $pdo, int $idUser, int $idComida){
    if (get_receta($pdo, $idUser, $idComida)){
        return true;
    } else {
        return false;
    }
}

