<?php
session_start();

if(!empty($_SESSION['usuario'])){
    session_destroy();
    session_unset();
    session_start();
    $_SESSION['msg_confirmacion'] = "te has deslogueado correctamente";
}else{
    $_SESSION['msg_error'] = "No has iniciado sessión para poder desloguearte";
}

header('Location:index.php');
?>