<?php
function cambioTurno($cambio, $donde, $url)
{
    if ($donde == 1) {
        $turno = "blancas";
        if ($cambio == true) {
            if (!isset($_COOKIE['turno'])) {
                setDatos("turno", "blancas", 1);
            } else {
                $turno = $_COOKIE['turno'];
                if ($turno == 'blancas') {
                    setDatos("turno", "negras", 1);
                } else {
                    setDatos("turno", "blancas", 1);
                }
                header("refresh:0.1;url=$url");
            }
        } else {
            if (!isset($_COOKIE['turno'])) {
                setDatos("turno", "blancas", 1);
            } else {
                $turno = $_COOKIE['turno'];
            }
        }
    } elseif ($donde == 2) {
        $base_datos = mysqli_connect("localhost", "root", "");
        mysqli_select_db($base_datos, "ajedrez");
        $resultado_db = mysqli_query($base_datos, "select * from turno");
        $del = "DELETE FROM turno";
        $sql_blanco = "INSERT INTO turno (turno) VALUES ('blancas')";
        $sql_negro = "INSERT INTO turno (turno) VALUES ('negras')";
        if (!(mysqli_num_rows($resultado_db) > 0)) {
            $turno = "blancas";
            $resultado = mysqli_query($base_datos, $sql_blanco);
            return $turno;
        } else {
            if ($cambio == true) {
                /* */
                $turno = mysqli_fetch_assoc($resultado_db);
                mysqli_free_result($resultado_db);
                $turno = $turno['turno'];
                if ($turno == 'blancas') {
                    $resultado = mysqli_query($base_datos, $del);

                    $resultado = mysqli_query($base_datos, $sql_negro);
                } else {
                    $resultado = mysqli_query($base_datos, $del);

                    $resultado = mysqli_query($base_datos, $sql_blanco);
                }
                header("refresh:0.1;url=$url");
            } else {

                $turno = mysqli_fetch_assoc($resultado_db);
                mysqli_free_result($resultado_db);
                /* print_r($turno['turno']);*/
                $turno = $turno['turno'];
            }
        }
    }
    return $turno;
}
