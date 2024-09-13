<?php
function guardarTabla($tabla, $donde)
{
    $tablaJson = json_encode($tabla);
    setDatos("tablero", $tablaJson, $donde);
}
