<?php
    //Iniciamos la session
    session_start();

    //config con información por defecto
    require_once "./config/config.php";

    //El filtro
    require_once "./modelo/funciones/clearFormat.php";

    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";


    /**
     * [validación del formulario]
     */

    //Comprobamos de que han mandado el formulario
    if (!empty($_POST)) {
        $errores = [];
        $pass1 = null;
        $pass2 = null;
        
        foreach ($_POST as $clave => $valor) {
            $errNombre = [];
            if($clave == "password"){
                $logitudMinimaPassword = 8;
            }
            if(empty($valor)){
                $errNombre[] = "Tienes que rellenar $clave"; //password: dr
            }else if (strlen($valor) < 3) {
                if($clave == "password" or $clave == "password2"): 
                    $errNombre[] = "La $clave es muy corto";
                else: 
                    $errNombre[] = "El $clave es muy corto";
                    if($clave == "nombre" or $clave == "apellido"){
                        if(!ctype_alpha($valor)){
                            $errNombre[] = "El $clave debe contener exclusivamente letras";
                        }
                    }
                endif;
            } else if (strlen($valor) > 50) {
                $errNombre[] = "El $clave es muy largo";
            } else {
                if($clave == "nombre" or $clave == "apellido"){
                    if(!ctype_alpha($valor)){
                        $errNombre[] = "El $clave debe contener exclusivamente letras";
                    }
                }
                if ($clave == "password") {
                    $pass1 = $valor;
                    if(strlen($valor) >= 3 and strlen($valor) < 8){
                        $errNombre[] = "La $clave es muy corto";
                    }
                }
                if ($clave == "password2") {
                    $pass2 = $valor;
                    if(strlen($valor) >= 3 and strlen($valor) < 8){
                        $errNombre[] = "La $clave es muy corto";
                    }
                    if(!empty($pass1) and !empty($pass2)){
                        if(strcmp($pass1, $pass2) !== 0){
                            $errNombre[] = "Las contraseñas no coinciden";
                        }
                    }
                }
            }
            if(!empty($errNombre)){
                $errores[$clave] = $errNombre;
            }
        }
        $errNombre = [];
        if(empty($errores)){
            //ingresar los datos en la base de datos
            $conexion = ConectaBDCrud::singleton();
            //valores
            $nombre = clearFormat($_POST['nombre']);    
        $apellido = clearFormat($_POST['apellido']);
        $password = clearFormat($_POST['password']);
        $sexo = clearFormat($_POST['sexo']);
        $usuario = clearFormat($_POST['usuario']);
        $email = clearFormat($_POST['email']);
        $verSiExisteElUsuario = $conexion->comprobarUsuExiste($usuario);

        if(is_string($verSiExisteElUsuario)){
            $errNombre['usuario'] = $verSiExisteElUsuario;
        }else if($verSiExisteElUsuario > 0){
            $errNombre['usuario'] = "Este usuario no puede ser utilizado";
        }
        if(!empty($errNombre['usuario'])){
            $errores['usuario'] = $errNombre['usuario'];
        }

        $verSiExisteElEmail = $conexion->comprobarEmailExiste($email);
        
        if(is_string($verSiExisteElEmail)){
            $errNombre['email'] = $verSiExisteElEmail;
        }else if($verSiExisteElEmail > 0){
            $errNombre['email'] = "Este Email no puede ser utilizado";
        }

        if(!empty($errNombre['email'])){
            $errores['email'] = $errNombre['email'];
        }
        if(empty($errNombre)){
            //creamos el usuario
            $nuevoUsuario = $conexion->nuevoUsuario($nombre, $apellido, $usuario, $email, $password, $sexo);
        }

    }
}

    /**
     * [vista] formulario registro.
     */
    require_once "./vista/vista_registro.php";
