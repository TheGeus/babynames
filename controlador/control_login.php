<?php
//Iniciamos la session
session_start();

//comprobamos de que no este logueado
if (!empty($_SESSION['usuario'])) {
    $_SESSION['msg_error'] = "No puedes intentar loguearte ya que estás logueado.";
    header('Location:index.php');
}
//config con información por defecto
require_once "./config/config.php";

//El filtro
require_once "./modelo/funciones/clearFormat.php";

//llamamos a la clase de la base de datos para luego utilizarlo
require_once "./modelo/funciones/conectaBDCrud.php";

if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    //la conexion a la BD
    $conexion = ConectaBDCrud::singleton();
    //los datos
    $usuario = clearFormat($_POST['usuario']);
    $password = $_POST['password'];

    //comprobamos si tiene  el caracter @ para indicar que es un correo.
    if (str_contains($usuario, '@')) {
        $resultado = $conexion->loginEmail($usuario);
        if (gettype($resultado) != "string") {
            if (!empty($resultado)) {
                $id = $resultado[0]['id'];
                $resultado_pass = $conexion->loginPassword($id);
                if (gettype($resultado_pass) != "string") {
                    if(password_verify("$password", $resultado_pass[0]['pass'])){
                        foreach ($resultado as $valor) {
                            $valor_id =  serialize($valor['id']);
                            $valor_usu =  serialize($valor['nom_usu']);
                            $valor_email =  serialize($valor['email']);
                            $valor_estado =  $valor['estado'];
                        }
                        if($valor_estado == "activo"){ //si el usuario esta activo podra loguearse
                            $_SESSION['id'] = $valor_id;
                            $_SESSION['usuario'] = $valor_usu;
                            $_SESSION['email'] = $valor_email;
                            $_SESSION['msg_confirmacion'] = "Te has logueado correctamente";

                        }else{
                            $_SESSION['msg_error'] = "Ouh! Tu usuario está inactivo! :(";
                        }
                        header('Location:index.php');
                    }else{
                        $error = "Las credenciales indicadas son incorrectas.";
                    }
                }
            } else {
                $error = "Las credenciales indicadas son incorrectas.";
            }
        } else {
            $error = $resultado;
        }
    } else {
        $resultado = $conexion->loginUsuario($usuario);
        if (gettype($resultado) != "string") {
            if (!empty($resultado)) {
                $id = $resultado[0]['id'];
                $resultado_pass = $conexion->loginPassword($id);
                if (!empty($resultado_pass)) {
                    if (gettype($resultado_pass) != "string") {
                        if (md5($password) == $resultado_pass[0]['pass']) {
                            foreach ($resultado as $valor) {
                                $valor_id =  serialize($valor['id']);
                                $valor_usu =  serialize($valor['nom_usu']);
                                $valor_email =  serialize($valor['email']);
                                $valor_estado =  $valor['estado'];
                            }
                            if($valor_estado == "activo"){ //si el usuario esta activo podra loguearse
                                $_SESSION['id'] = $valor_id;
                                $_SESSION['usuario'] = $valor_usu;
                                $_SESSION['email'] = $valor_email;
                                $_SESSION['msg_confirmacion'] = "Te has logueado correctamente";

                            }else{
                                $_SESSION['msg_error'] = "Ouh! Tu usuario está inactivo! :(";
                            }

                            header('Location:index.php');
                        }
                    }
                }
            }
            $error = "Las credenciales indicadas son incorrectas.";
        } else {
            $error = $resultado;
        }
    }
}

//vista de nuestro index
require_once "./vista/vista_login.php";
