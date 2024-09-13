<?php
function dentroTabla($movimiento, $numCasillas, $numColum)
{
$min = [0, 8, 16, 24, 32, 40, 48, 56];
$max = [7, 15, 23, 31, 39, 47, 55, 63];
$valor = 0;
$resultado = 0;
$mover = $movimiento + $numCasillas;
$movimiento = $movimiento + ($numColum * 8);
for ($i = 0; $i < 8; $i++) { if ($min[$i] <=$movimiento and $max[$i]>= $movimiento) {
    $resultado = $i;
    break;
    }
    }
    if (($min[$resultado] <= $mover and $max[$resultado]>= $mover)) {
        $valor = 1;
        }
        print("Resultado : $resultado");
        print("Es $valor");
        print(" Mover $mover");
        return $valor;
        }