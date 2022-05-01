<?php
function clearFormat($str){
    //Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
    $str = trim($str);
    //Devuelve una cadena con las barras invertidas eliminadas Reconoce las marcas tipo C \n, \r ..., y la representación octal y hexadecimal.
    $str = stripcslashes($str);
    //Convierte caracteres especiales que pueden ser interpretados por HTML a su representación equivalente el cual no se ejecuta 
    $str = htmlspecialchars($str);
    //devolvemos el string al usuario.
    return $str;
}