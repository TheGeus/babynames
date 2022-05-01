<?php

//Iniciamos la session
session_start();

if (empty($_GET)) {
    //Header location para redireccionarnos si el usuario no nos está mandando datos por $_GET.
    //Y el codigo 403 que significa que no tiene permiso de estar aqui
    header('Location:index.php', true, 403);
} else {
    //config con información por defecto
    require_once "./config/config.php";

    //El filtro
    require_once "./modelo/funciones/clearFormat.php";

    //llamamos a la clase de la base de datos para luego utilizarlo
    require_once "./modelo/funciones/conectaBDCrud.php";

    $conexion = ConectaBDCrud::singleton();
    $permiso = !empty($_SESSION['id']) ? $conexion->getPermiso(unserialize($_SESSION['id'])) : false;
    $admin = (strcmp($permiso, "Administrador") === 0) ? true : false;

    //comprobar de que esta logueado osea que tiene un session id

    //comprobar las siguientes tablas
    //nivel usuario en el exp_usuario, tabla puntos_exp sumarle give_exp
    //tabla got_exp si el estado es 0 cambiarlo a 1 // que indica que esta puntuación a sido dada
    if(!empty($_SESSION['id'])){ //comprobamos de que está logueado
        $exp_id = 1;
        $id = unserialize($_SESSION['id']);
        $estado = $conexion->comprobarEstadoGotExp($exp_id, $id); //-> estado [0, 1]
        if($estado == 0){
            //conseguimos el exp del usuario total de la tabla nivel_usuario
            $exp_usuario = $conexion->getExpDelUsuario($id);
            print_r($estado);
            die();
            $exp_usuario += $conexion->getExpPuntosExp($exp_id); //sumamos el exp del usuario y el exp que nos da la tabla puntos_Exp
    
    
            //cambiar estado a 1
            $conexion->ActivarEstadoGotExp($exp_id, $id);
        }

    }
    



    /**
     * Inicio de de validación
     */
    //[sexo]
    $losSexos = [0 => 'hombre', 1 => 'mujer'];
    $sexo = null;
    if (!empty($_GET['sexo'])) {
        $sexo = clearFormat($_GET['sexo']);
        $tieneElSexo = false;
        foreach($losSexos as $sex){
            if(str_contains($sex, $sexo)){
                $tieneElSexo = true;
            }
        }
        if ($tieneElSexo == false) {
            $sexo = $losSexos[mt_rand(0, 1)];
            $_GET['sexo'] = $sexo;
        }
    } else {
        $sexo = $losSexos[mt_rand(0, 1)];
        $_GET['sexo'] = $sexo;
    }
    //[Letra]
    $listadoLetras = $conexion->listarLetras();
    $todaslasLetras = null;
    foreach ($listadoLetras as $value) {
        $todaslasLetras .= $value['letra'];
    }
    $letra = null;
    if (!empty($_GET['letra'])) {
        $letra = substr(clearFormat($_GET['letra']), 0, 1);
        if (!str_contains($todaslasLetras, $letra)) {
            //catidad total de letras
            $cantidadLetras = strlen($todaslasLetras);
            //para devolver una letra aleatoria, utilizamos mt_rand para sacar un numero aletario
            //iniciamos desde la posicion 0 y el final del string -1 ya que nos devuelve en numero entero
            $letra = $todaslasLetras[mt_rand(0, $cantidadLetras - 1)];
        }
    } else {
        //catidad total de letras
        $cantidadLetras = strlen($todaslasLetras);
        //para devolver una letra aleatoria, utilizamos mt_rand para sacar un numero aletario
        //iniciamos desde la posicion 0 y el final del string -1 ya que nos devuelve en numero entero
        $letra = $todaslasLetras[mt_rand(0, $cantidadLetras - 1)];
    }
    //[num x pag]
    if (!empty($_GET['cantidad'])) {
        $cantidad = clearFormat($_GET['cantidad']);

        if (is_numeric($cantidad)) {
            if ($cantidad < $min_pag && $cantidad > $max_pag) {
                $cantidad = mt_rand($min_pag, $max_pag);
                $_GET['cantidad'] = $cantidad;
            }
            //si no, esta bien
        } else {
            $cantidad = mt_rand($min_pag, $max_pag);
        }
    } else {
        $cantidad = mt_rand($min_pag, $max_pag);
        $_GET['cantidad'] = $cantidad;
    }

    //comprobamos que el formulario dentro de esta misma pág el valor este presente
    if (isset($_GET['pag'])) {

        //comprobamos que esa un numero y que sea positivo
        $variableAuxiliarNumeroDePagina = intval(clearFormat($_GET['pag']));
        //comprobamos de que no es numero y el valor es menor a 0
        if (!is_numeric($variableAuxiliarNumeroDePagina) || $variableAuxiliarNumeroDePagina < 0) {
            //si no es numero entonces empezara desde la primera pagina
            $variableAuxiliarNumeroDePagina = 0;
        }
        //vemos el total de los campos
        $totalCampos = $conexion->cantidadBabysPorSexoLetra($sexo, $letra);

        //si es asi lo metemos en una cookie

        $pag = $variableAuxiliarNumeroDePagina;
    } else {

        if (empty($_GET['pag'])) {
            $pag = 0;
        } else {
            $variableAuxiliarNumeroDePagina = intval(clearFormat($_GET['pag']));
            if (!is_null($variableAuxiliarNumeroDePagina) || $variableAuxiliarNumeroDePagina < 0) {
                $variableAuxiliarNumeroDePagina = 0;
            }
            //si es asi lo metemos en una cookie
            $pag = $variableAuxiliarNumeroDePagina;
        }
        //vemos el total de los campos
        $totalCampos = $conexion->cantidadBabysPorSexoLetra($sexo, $letra);
    }
    $num = intval($cantidad) * intval($pag);


    $bebes = $conexion->listadoNombres($sexo, $letra, $pag, $cantidad);
    /**
     * FIn de validación
     */
    //vista de nuestro buscar
    require_once "./vista/vista_buscar.php";
}
