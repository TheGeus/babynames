<?php
    //Iniciamos la session
    session_start();

    if(empty($_POST['token'])){

    }

    //config con información por defecto
    require_once "./config/config.php";

     //El filtro
    require_once "./modelo/funciones/clearFormat.php";

    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";

    $conexion = ConectaBDCrud::singleton();

    $admin = false;
    $editar = false;
    $crear = false;
    $completado = false;
    if(!empty($_SESSION['id'])){
        $permiso = $conexion->getPermiso(unserialize($_SESSION['id']));
        $admin = (strcmp($permiso, "Administrador") === 0) ? true : false;
    }
    if(is_null($_GET['token'])){
        header('Location: index.php');
    }
    $token = $_GET['token'];

    if(strlen($token) != $logitudToken){
        header('Location: index.php');
    }
    $bebe = $conexion->bebe($token);
    
    if(isset($_POST['id'])){
        $errores = [];
        $id = $_POST['id'];
        $letra = $_POST['letra'];
        $nombre = clearFormat(!empty($_POST['nombre']) ? $_POST['nombre'] : '');
        $sexo = clearFormat($_POST['sexo']);
        $origen = clearFormat(!empty($_POST['origen']) ? $_POST['origen'] : '');
        $descripcion = !empty($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : '';
        $estado = $_POST['estado'];
        
        if(empty($nombre)){
            $errores['nombre']= "Por favor ingresa un Nombre";
        }
        if(empty($origen)){
            $errores['origen']= "Por favor ingresa un Origen";
        }
        if(!empty($errores)){
            if($admin == true){
                $update = $conexion->updateBebe($id, $letra, $nombre, $sexo, $origen, $descripcion, $estado);
                if(is_numeric($update)){
                    if($estado == 1){
                        $status = "Publicado";
                    }else{
                        $status = "No publicado";
                    }
                    $_SESSION['msg_sucess'] = "Se ha guardado correctamente el bebe $nombre y su estado es $status";
                    $completado = true;
                }
            }
        }
    }

if(isset($_GET['editar'])){ //en el caso de que quiera modificar un nombre

    if(isset($_GET['id']) && empty($_GET['id'])){ //no esta logueado
        $_SESSION['msg_error'] = "No ha seleccionado un usuario o Este usuario no existe";
        header('location:index.php');
    }else if($admin == false){ //no es administrador
        $_SESSION['msg_error'] = "No tienes los permisos necesarios";
        header('location:index.php');
    }else{//es administrador
        $editar = true;
    }
}
    
    if($editar == true){
        $letras = $conexion->listarLetras();
        //vista de nuestro index
        require_once "./vista/vista_modificarNombre.php";
    }else if($crear == true){
        //vista de nuestro index
        require_once "./vista/vista_crearNombre.php";
    }else{
        //vista de nuestro index
        require_once "./vista/vista_pagDelNombre.php";

    }