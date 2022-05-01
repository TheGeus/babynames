<?php
    //Iniciamos la session
    session_start();

    //config con información por defecto
    require_once "./config/config.php";

    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";

    $conexion = ConectaBDCrud::singleton();
    $listadoLetras = $conexion->listarLetras();
    $valido = false;
    if(is_array($listadoLetras)){
        $valido = true;
    }
    //vista de nuestro index
    require_once "./vista/vista_index.php";
