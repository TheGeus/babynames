<?php
    //Iniciamos la session
    session_start();
    
    if(isset($_GET['id']) && empty($_GET['id'])){
        $_SESSION['msg_error'] = "No ha seleccionado un usuario o Este usuario no existe";
        header('location:index.php');
    }
    
    //config con información por defecto
    require_once "./config/config.php";
    
    //El filtro
    require_once "./modelo/funciones/clearFormat.php";
    
    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";
    $perfil = null;
    $conexion = ConectaBDCrud::singleton();
    $permiso = $conexion->getPermiso(unserialize($_SESSION['id']));
    $admin = (strcmp($permiso, "Administrador") === 0) ? true : false;

    if(isset($_POST['id'])){
        $errores = [];
        $id = $_POST['id'];
        $nombre = clearFormat(!empty($_POST['nombre']) ? $_POST['nombre'] : '');
        $apellido = clearFormat(!empty($_POST['apellido']) ? $_POST['apellido'] : '');
        $usu = clearFormat(!empty($_POST['usu']) ? $_POST['usu'] : '');
        $sex = clearFormat($_POST['sexo']);
        $estado = $_POST['estado'];
        if($admin == true){
            $email = clearFormat(!empty($_POST['email']) ? $_POST['email'] : '');
            if(empty($email)){
                $errores['email']= "Por favor ingresa un Email";
            }else{
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $errores['email'] = "Por favor ingresar un Email valido";
                }
            }
        }
        if(empty($nombre)){
            $errores['nombre']= "Por favor ingresa un Nombre";
        }

        if(empty($apellido)){
            $errores['apellido']= "Por favor ingresa un Apellido";
        }
        if(empty($usu)){
            $errores['usu']= "Por favor ingresa un Usuario";
        }
        if($admin == true){
            $actualizar = $conexion->updatePerfil($id, $nombre, $apellido, $email, $usu, $sex, $estado);
            if($actualizar == 1){
                $_SESSION['msg_correcto'] = "El perfil se ha actualizado correctamente";
            }else{
                $_SESSION['msg_error'] = "El perfil no ha podido ser actualizado, por favor intente nuevamente";
            }
        }else{
            if(unserialize($_SESSION['id']) === $id){
                $actualizar = $conexion->updatePerfil($id, $nombre, $apellido, $email, $usu, $sex, $estado);
                if($actualizar == 1){
                    $_SESSION['msg_correcto'] = "El perfil se ha actualizado correctamente";
                }else{
                    $_SESSION['msg_error'] = "El perfil no ha podido ser actualizado, por favor intente nuevamente";
                }
            }

        }
    }

    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            if($_GET['id'] > 0){
                $perfil = $_GET['id'];
            }else{
                $_SESSION['msg_error'] = "Este usuario no existe";
                header('location:index.php');
            }
        }else{
            $_SESSION['msg_error'] = "Tiene que ser el ID del usuario!";
            header('location:index.php');
        }
    }else{
        if(empty($_SESSION['id'])){
            $_SESSION['msg_error'] = "No te has logueado";
            header('location:index.php');
        }else{
            $perfil = unserialize($_SESSION['id']);
        }
    }

    
    if(!empty($_GET['editar'])){
        if(is_numeric($_GET['editar'])){
            if($_GET['editar'] > 0){
                $permiso = $conexion->getPermiso(unserialize($_SESSION['id']));
                if(is_string($permiso)){
                    if($admin == true){
                        $perfil = $_GET['editar']; 
                    }
                }else{
                    if(unserialize($_SESSION['id']) == $_GET['editar']){
                        $perfil = $_GET['editar']; 
                    }else{
                        $_SESSION['msg_error'] = "No tienes permiso para editar este usuario";
                    }
                }
            }else{
                $_SESSION['msg_error'] = "Este usuario no existe";
                header('location:index.php');
            }
        }
    }
    
    $usuario = $conexion->verNivel($perfil);
    
    if(!empty($_GET['editar'])){
        //editamos el perfil
        require_once "./vista/vista_editarPerfil.php";
    }else{
        //vista del perfil
        require_once "./vista/vista_perfil.php";

    }
    