<?php
function resetTabla($url, $donde)
{
    if ($donde == 1) {
        if (isset($_GET['reset'])) {
            unset($_COOKIE['turno']);
            unset($_COOKIE['tablero']);
            unset($_COOKIE['color']);
            setcookie('turno');
            setcookie('tablero');
            setcookie('color');
            header("refresh:0.1;url=$url");
        }
    } elseif ($donde == 2) {
        if (isset($_GET['reset'])) {
            unset($_COOKIE['turno']);
            unset($_COOKIE['tabla']);
            unset($_COOKIE['color']);
            setcookie('turno');
            setcookie('tabla');
            setcookie('color');
            $del_ta = "DELETE FROM tablero";
            $del_tu = "DELETE FROM turno";
            $base_datos = mysqli_connect("localhost", "root", "");
            mysqli_select_db($base_datos, "ajedrez");
            $query = mysqli_query($base_datos, $del_ta);
            $query = mysqli_query($base_datos, $del_tu);
            header("refresh:0.1;url=$url");

        }
    }
}
