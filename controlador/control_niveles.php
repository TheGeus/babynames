<?php
    //Iniciamos la session
    session_start();

    //config con información por defecto
    require_once "./config/config.php";

    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";

    $conexion = ConectaBDCrud::singleton();
    $id = null;
    $listadoLogros = null;
    if(!empty($_SESSION['id'])): 
        $id = unserialize($_SESSION['id']);
    endif;
    
    if(!is_null($id)):
        $idsLogros = $conexion->listarIdLogros();
        $comprobarExistencia = [];
        foreach($idsLogros as $valor){
            $aux = $conexion->listarLogrosId($valor['id'], $id);
            if(empty($aux)){
                $insert = $conexion->inicializarPuntoExp($valor['id'], $id);
            }
            $final = $conexion->listarLogrosUserId($valor['id'], $id);
            $comprobarExistencia[] = $final[0];
        }
        $listadoLogros = $comprobarExistencia; 
    else: 
        $listadoLogros = $conexion->listarLogros();
    endif;
    
    //vista de nuestro index
    require_once "./vista/vista_logros.php";