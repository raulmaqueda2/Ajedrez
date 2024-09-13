<?php
require '../objetos/tablero.php';
function unicode_to_char($unicode)
{
    return json_decode('"\\' . $unicode . '"');
}

function cargarTabla($donde)
{
    if ($donde == 1) {
        if (isset($_COOKIE["tablero"])) {
            $tabla = json_decode($_COOKIE['tablero']);
        } else {
            $tabla = new Tabla();
            $tabla = $tabla->get();
            setcookie("tablero", json_encode($tabla));
        }
    } elseif ($donde == 2) {
        $base_datos = mysqli_connect("localhost", "root", "");
        mysqli_select_db($base_datos, "ajedrez");

        $resultado_db = mysqli_query($base_datos, "select * from tablero");
        if (!(mysqli_num_rows($resultado_db) > 0)) {
            $tabla = new Tabla();
            $tabla = $tabla->get();
            $tabla_encode = json_encode($tabla);
            $sql = "INSERT INTO tablero (tabla) VALUES ('$tabla_encode')";
            $resultado = mysqli_query($base_datos, $sql);
        }else{
            $del = "DELETE FROM tablero";
            $consulta = "SELECT * FROM tablero LIMIT 1";
            $tab = mysqli_query($base_datos, $consulta);
    
            $primer_dato = mysqli_fetch_assoc($tab);
            mysqli_free_result($tab);
    
    
            $tablas = json_decode($primer_dato['tabla'], true);
            $tabla = $tablas;
            $tabla = array_map('unicode_to_char', $tabla);
    
        }
    }
    return $tabla;
}
