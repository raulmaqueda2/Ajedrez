<?php
function setBaseDatos($nombre, $dato)
{
    $base_datos = mysqli_connect("localhost", "root", "");
    mysqli_select_db($base_datos, "ajedrez");
    if ($nombre == "tablero") {
        $sql = "INSERT INTO tablero (tabla) VALUES ('$dato')";
        $resultado = mysqli_query($base_datos, $sql);
    } elseif($nombre == "turno"){
        $sql = "INSERT INTO turno (turno) VALUES ('$dato')";
        $resultado = mysqli_query($base_datos,$sql);
    }
}
