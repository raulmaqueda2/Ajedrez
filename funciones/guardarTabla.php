<?php
function guardarTabla($tabla, $donde)
{
    if ($donde == 1) {
        $tablaJson = json_encode($tabla);
        setDatos("tablero", $tablaJson, $donde);
    } elseif ($donde == 2) {
        $del = "DELETE FROM tablero";
        $base_datos = mysqli_connect("localhost", "root", "");
        mysqli_select_db($base_datos, "ajedrez");
        $query = mysqli_query($base_datos, $del);
        $tabla_encode = json_encode($tabla);
        $sql = "INSERT INTO tablero (tabla) VALUES ('$tabla_encode')";
        $resultado = mysqli_query($base_datos, $sql);
    }
}
