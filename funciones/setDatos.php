<?php
function setDatos($nombre, $dato, $donde)
{
    if ($donde == 1) {
        setCokies($nombre, $dato);
    }
    if ($donde == 2) {
        setBaseDatos($nombre, $dato);
    }
}
