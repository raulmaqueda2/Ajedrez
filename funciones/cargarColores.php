<?php 
require '../objetos/color.php';
function cargarColores($restablecer)
{
    if (!isset($_COOKIE['color']) or $restablecer) {
        $color = new Color();
        $colorJson = json_encode($color->get());

        setcookie('color', $colorJson, time() + 3600);
        return $color->get();
    } else {
        $color = json_decode($_COOKIE['color'], true);
        return $color;
    }
}