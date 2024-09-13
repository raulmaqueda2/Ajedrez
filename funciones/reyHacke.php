<?php
function reyHacke()
{
    $blancas = ["♙", "♖", "♘", "♗", "♕", "♔"];
    $negras =  ["♟", "♜", "♞", "♝", "♛", "♚"];
    $tabla = cargarTabla(1);
    $turno = cambioTurno(false, 1, "");
    $color = cargarColores(false);
    $buacar = "";
    $posicion = 0;
    if ($turno == "blancas") {
        $buscar = "♔";
    } else {
        $buscar = "♚";
    }
    for ($i = 0; $i < 63; $i++) {
        if ($tabla[$i] == $buscar) {
            $posicion = $i;
        }
    }
        $count1 = 0;
        $ultimo1 = 0;
        $ultimo2 = 0;
        $movimiento = $posicion;
        for ($i = 1; $i < 8; $i++) {
            if (isset($tabla[$movimiento + $i])) {
                if (!(in_array($tabla[$movimiento + $i], $negras))) {
                    if (dentroTabla($movimiento, $i, 0)) {
                        $color[$movimiento + $i]  = "r";
                    } else {
                        break;
                    }
                    if (in_array($tabla[$movimiento + $i], $blancas)) {
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            if (isset($tabla[$movimiento - $i])) {
                if (!(in_array($tabla[$movimiento - $i], $negras))) {
                    if (dentroTabla($movimiento, -$i, 0)) {
                        $color[$movimiento - $i]  = "r";
                    } else {
                        break;
                    }
                    if (in_array($tabla[$movimiento - $i], $blancas)) {
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            if (isset($tabla[$movimiento  + ($i * 8)])) {
                if (!(in_array($tabla[$movimiento + ($i * 8)], $negras))) {
                    if (dentroTabla($movimiento, $i * 8, $i)) {
                        $color[$movimiento + $i * 8]  = "r";
                    } else {
                        break;
                    }
                    if (in_array($tabla[$movimiento + ($i * 8)], $blancas)) {
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            if (isset($tabla[$movimiento - $i * 8])) {
                if (!(in_array($tabla[$movimiento - $i * 8], $negras))) {
                    if (dentroTabla($movimiento, -$i * 8, -$i)) {
                        $color[$movimiento + -$i * 8]  = "r";
                    } else {
                        break;
                    }
                    if (in_array($tabla[$movimiento - $i * 8], $blancas)) {
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            $count1 = $movimiento - 7;
            if (isset($tabla[$movimiento + -$i * 7])) {
                if (!(in_array($tabla[$movimiento + -$i * 7], $negras))) {
                    if (dentroTabla($movimiento, -$i * 7, -$i)) {
                        $ultimo2 = $color[$movimiento + -$i * 7];
                        $color[$movimiento + -$i * 7]  = "r";
                        $ultimo1 = $movimiento + -$i * 7;
                        if ($ultimo1 == 0) {
                            $color[$movimiento + -$i * 7]  = $ultimo2;
                        }
                        if (in_array($tabla[$movimiento + -$i * 7], $blancas)) {
                            break;
                        }
                    } else {
                        /* $color[$ultimo1]  = $ultimo2;*/
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            $count1 = $movimiento - 7;
            if (isset($tabla[$movimiento + $i * 7])) {
                if (!(in_array($tabla[$movimiento + $i * 7], $negras))) {
                    if (dentroTabla($movimiento, $i * 7, $i)) {
                        $ultimo2 = $color[$movimiento + $i * 7];
                        $color[$movimiento + $i * 7]  = "r";
                        $ultimo1 = $movimiento + $i * 7;
                        if ($ultimo1 == 0) {
                            $color[$movimiento + $i * 7]  = $ultimo2;
                        }
                        if (in_array($tabla[$movimiento + $i * 7], $blancas)) {
                            break;
                        }
                    } else {
                        /* $color[$ultimo1]  = $ultimo2;*/
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            $count1 = $movimiento - 7;
            if (isset($tabla[$movimiento + -$i * 9])) {
                if (!(in_array($tabla[$movimiento + -$i * 9], $negras))) {
                    if (dentroTabla($movimiento, -$i * 9, -$i)) {
                        $ultimo2 = $color[$movimiento + -$i * 9];
                        $color[$movimiento + -$i * 9]  = "r";
                        $ultimo1 = $movimiento + -$i * 9;
                        if (in_array($tabla[$movimiento + -$i * 9], $blancas)) {
                            break;
                        }
                    } else {
                        /* $color[$ultimo1]  = $ultimo2;*/
                        break;
                    }
                } else {
                    break;
                }
            }
        }
        for ($i = 1; $i < 8; $i++) {
            $count1 = $movimiento - 7;
            if (isset($tabla[$movimiento + $i * 9])) {
                if (!(in_array($tabla[$movimiento + $i * 9], $negras))) {
                    if (dentroTabla($movimiento, $i * 9, $i)) {
                        $ultimo2 = $color[$movimiento + $i * 9];
                        $color[$movimiento + $i * 9]  = "r";
                        $ultimo1 = $movimiento + $i * 9;
                        if ($ultimo1 == 0) {
                            $color[$movimiento + $i * 9]  = $ultimo2;
                        }
                        if (in_array($tabla[$movimiento + $i * 9], $negras)) {
                            break;
                        }
                    } else {
                        /* $color[$ultimo1]  = $ultimo2;*/
                        break;
                    }
                } else {
                    break;
                }
            }
        }
    
    /** reina */
    $color[$posicion - 9]  = "r";

    $colorJson = json_encode($color);
    setcookie('color', $colorJson);
    return $color;
}
