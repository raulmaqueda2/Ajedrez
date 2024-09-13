<?php
function moverFicha($sel,$ruta)
{
    $blancas = ["♙", "♖", "♘", "♗", "♕", "♔"];
    $negras =  ["♟", "♜", "♞", "♝", "♛", "♚"];
    $movPeonPrin = [48, 49, 50, 51, 52, 53, 54, 55];
    $movPeonPrinN = [8, 9, 10, 11, 12, 13, 14, 15];

    $color = cargarColores(false);
    $tabla = cargarTabla($sel);

    $menssaje = "";
    /*Mostrar movimientos ficha*/
    if (isset($_GET['ajedrez'])) {
        $movimiento = $_GET['ajedrez'];
        if (!isset($_COOKIE['movimiento'])) {
            $turno = cambioTurno(false,$sel,"");
            $selecion = $tabla[$_GET['ajedrez']];
            if ($selecion != "ㅤ") {
                if (in_array($selecion, $blancas)) {
                    if ($turno == "blancas") {
                        /** Peon */
                        if ($selecion == "♙") {
                            if ($tabla[$movimiento - 8] == "ㅤ") {
                                $color[$movimiento - 8] = "r";
                                if ($tabla[$movimiento - 16] ==  "ㅤ") {
                                    if (in_array($movimiento, $movPeonPrin)) {
                                        $color[$movimiento - 16] = "r";
                                    }
                                }
                            }
                            if ((in_array($tabla[$movimiento - 9], $negras))) {
                                $color[$movimiento - 9] = "r";
                            }
                            if ((in_array($tabla[$movimiento - 7], $negras))) {
                                $color[$movimiento - 7] = "r";
                            }
                        }
                        /** Peon */
                        /** caballo */
                        if ($selecion == "♘") {
                            if (isset($tabla[$movimiento - 10])) {
                                if (!(in_array($tabla[$movimiento - 10], $blancas))) {
                                    if (dentroTabla($movimiento, -10, -1)) {
                                        $color[$movimiento - 10] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 17])) {
                                if (!(in_array($tabla[$movimiento - 17], $blancas))) {
                                    if (dentroTabla($movimiento, -17, -2)) {
                                        $color[$movimiento - 17] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 15])) {
                                if ((!in_array($tabla[$movimiento - 15], $blancas))) {
                                    if (dentroTabla($movimiento, -15, -2)) {
                                        $color[$movimiento - 15] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 6])) {
                                if (!(in_array($tabla[$movimiento - 6], $blancas))) {
                                    if (dentroTabla($movimiento, -6, -1)) {
                                        $color[$movimiento - 6]  = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 10])) {
                                if (!(in_array($tabla[$movimiento + 10], $blancas))) {
                                    if (dentroTabla($movimiento, 10, 1)) {
                                        $color[$movimiento + 10] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 17])) {
                                if (!(in_array($tabla[$movimiento + 17], $blancas))) {
                                    if (dentroTabla($movimiento, 17, 2)) {
                                        $color[$movimiento + 17] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 15])) {
                                if (!(in_array($tabla[$movimiento + 15], $blancas))) {
                                    if (dentroTabla($movimiento, 15, 2)) {
                                        $color[$movimiento + 15] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 6])) {
                                if (!(in_array($tabla[$movimiento + 6], $blancas))) {
                                    if (dentroTabla($movimiento, 6, 1)) {
                                        $color[$movimiento + 6]  = "r";
                                    }
                                }
                            }
                            guardarMovimiento();
                        }
                        /** caballo */
                        /** torre */
                        if ($selecion == "♖") {
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento + $i])) {
                                    if (!(in_array($tabla[$movimiento + $i], $blancas))) {
                                        if (dentroTabla($movimiento, $i, 0)) {
                                            $color[$movimiento + $i]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento + $i], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento - $i])) {
                                    if (!(in_array($tabla[$movimiento - $i], $blancas))) {
                                        if (dentroTabla($movimiento, -$i, 0)) {
                                            $color[$movimiento - $i]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento - $i], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento  + ($i * 8)])) {
                                    if (!(in_array($tabla[$movimiento + ($i * 8)], $blancas))) {
                                        if (dentroTabla($movimiento, $i * 8, $i)) {
                                            $color[$movimiento + $i * 8]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento + ($i * 8)], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento - $i * 8])) {
                                    if (!(in_array($tabla[$movimiento - $i * 8], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 8, -$i)) {
                                            $color[$movimiento + -$i * 8]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento - $i * 8], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                        }
                        /** torre */
                        /** alfil */
                        if ($selecion == "♗") {
                            $count1 = 0;
                            $ultimo1 = 0;
                            $ultimo2 = 0;

                            for ($i = 1; $i < 8; $i++) {
                                $count1 = $movimiento - 7;
                                if (isset($tabla[$movimiento + -$i * 7])) {
                                    if (!(in_array($tabla[$movimiento + -$i * 7], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 7, -$i)) {
                                            $ultimo2 = $color[$movimiento + -$i * 7];
                                            $color[$movimiento + -$i * 7]  = "r";
                                            $ultimo1 = $movimiento + -$i * 7;
                                            if ($ultimo1 == 0) {
                                                $color[$movimiento + -$i * 7]  = $ultimo2;
                                            }
                                            if (in_array($tabla[$movimiento + -$i * 7], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + $i * 7], $blancas))) {
                                        if (dentroTabla($movimiento, $i * 7, $i)) {
                                            $ultimo2 = $color[$movimiento + $i * 7];
                                            $color[$movimiento + $i * 7]  = "r";
                                            $ultimo1 = $movimiento + $i * 7;
                                            if ($ultimo1 == 0) {
                                                $color[$movimiento + $i * 7]  = $ultimo2;
                                            }
                                            if (in_array($tabla[$movimiento + $i * 7], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + -$i * 9], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 9, -$i)) {
                                            $ultimo2 = $color[$movimiento + -$i * 9];
                                            $color[$movimiento + -$i * 9]  = "r";
                                            $ultimo1 = $movimiento + -$i * 9;
                                            if (in_array($tabla[$movimiento + -$i * 9], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + $i * 9], $blancas))) {
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
                        }
                        /** alfil */
                        /** reyna */
                        if ($selecion == "♕") {
                            $count1 = 0;
                            $ultimo1 = 0;
                            $ultimo2 = 0;
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento + $i])) {
                                    if (!(in_array($tabla[$movimiento + $i], $blancas))) {
                                        if (dentroTabla($movimiento, $i, 0)) {
                                            $color[$movimiento + $i]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento + $i], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento - $i])) {
                                    if (!(in_array($tabla[$movimiento - $i], $blancas))) {
                                        if (dentroTabla($movimiento, -$i, 0)) {
                                            $color[$movimiento - $i]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento - $i], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento  + ($i * 8)])) {
                                    if (!(in_array($tabla[$movimiento + ($i * 8)], $blancas))) {
                                        if (dentroTabla($movimiento, $i * 8, $i)) {
                                            $color[$movimiento + $i * 8]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento + ($i * 8)], $negras)) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }
                            }
                            for ($i = 1; $i < 8; $i++) {
                                if (isset($tabla[$movimiento - $i * 8])) {
                                    if (!(in_array($tabla[$movimiento - $i * 8], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 8, -$i)) {
                                            $color[$movimiento + -$i * 8]  = "r";
                                        } else {
                                            break;
                                        }
                                        if (in_array($tabla[$movimiento - $i * 8], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + -$i * 7], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 7, -$i)) {
                                            $ultimo2 = $color[$movimiento + -$i * 7];
                                            $color[$movimiento + -$i * 7]  = "r";
                                            $ultimo1 = $movimiento + -$i * 7;
                                            if ($ultimo1 == 0) {
                                                $color[$movimiento + -$i * 7]  = $ultimo2;
                                            }
                                            if (in_array($tabla[$movimiento + -$i * 7], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + $i * 7], $blancas))) {
                                        if (dentroTabla($movimiento, $i * 7, $i)) {
                                            $ultimo2 = $color[$movimiento + $i * 7];
                                            $color[$movimiento + $i * 7]  = "r";
                                            $ultimo1 = $movimiento + $i * 7;
                                            if ($ultimo1 == 0) {
                                                $color[$movimiento + $i * 7]  = $ultimo2;
                                            }
                                            if (in_array($tabla[$movimiento + $i * 7], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + -$i * 9], $blancas))) {
                                        if (dentroTabla($movimiento, -$i * 9, -$i)) {
                                            $ultimo2 = $color[$movimiento + -$i * 9];
                                            $color[$movimiento + -$i * 9]  = "r";
                                            $ultimo1 = $movimiento + -$i * 9;
                                            if (in_array($tabla[$movimiento + -$i * 9], $negras)) {
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
                                    if (!(in_array($tabla[$movimiento + $i * 9], $blancas))) {
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
                        }
                        /** reina */
                        /** rey */
                        if ($selecion == "♔") {
                            if (isset($tabla[$movimiento + -9])) {
                                if (!(in_array($tabla[$movimiento + -9], $blancas))) {
                                    if (dentroTabla($movimiento, -9, -1)) {
                                        $color[$movimiento + -9]  = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + -8])) {
                                if (!(in_array($tabla[$movimiento + -8], $blancas))) {
                                    if (dentroTabla($movimiento, -8, -1)) {
                                        $color[$movimiento + -8]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + -7])) {
                                if (!(in_array($tabla[$movimiento + -7], $blancas))) {
                                    if (dentroTabla($movimiento, -7, -1)) {
                                        $color[$movimiento + -7]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + -1])) {
                                if (!(in_array($tabla[$movimiento + -1], $blancas))) {
                                    if (dentroTabla($movimiento, -1, 0)) {
                                        $color[$movimiento + -1]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 1])) {
                                if (!(in_array($tabla[$movimiento + 1], $blancas))) {
                                    if (dentroTabla($movimiento, 1, 0)) {
                                        $color[$movimiento + 1]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 7])) {
                                if (!(in_array($tabla[$movimiento + 7], $blancas))) {
                                    if (dentroTabla($movimiento, 7, 1)) {
                                        $color[$movimiento + 7]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 8])) {
                                if (!(in_array($tabla[$movimiento + 8], $blancas))) {
                                    if (dentroTabla($movimiento, 8, 1)) {
                                        $color[$movimiento + 8]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 9])) {
                                if (!(in_array($tabla[$movimiento + 9], $blancas))) {
                                    if (dentroTabla($movimiento, 9, 1)) {
                                        $color[$movimiento + 9]  = "r";
                                    }
                                }
                            }
                        }
                        /** rey */
                        guardarMovimiento();
                    } else {
                        $menssaje = "No es tu turno";
                    }
                    /**negras */
                } else {
                    if ($turno == "negras") {
                        /** Peon */
                        if ($selecion == "♟") {
                            if ($tabla[$movimiento + 8] == "ㅤ") {
                                $color[$movimiento + 8] = "r";
                                guardarMovimiento();
                                if ($tabla[$movimiento + 16] ==  "ㅤ") {
                                    if (in_array($movimiento, $movPeonPrinN)) {
                                        $color[$movimiento + 16] = "r";
                                    }
                                }
                            }
                            if ((in_array($tabla[$movimiento + 9], $blancas))) {
                                $color[$movimiento + 9] = "r";
                            }
                            if ((in_array($tabla[$movimiento + 7], $blancas))) {
                                $color[$movimiento + 7] = "r";
                            }
                        }
                        /** Peon */
                        /** caballo */
                        if ($selecion == "♞") {
                            if (isset($tabla[$movimiento - 10])) {
                                if (!(in_array($tabla[$movimiento - 10], $negras))) {
                                    if (dentroTabla($movimiento, -10, -1)) {
                                        $color[$movimiento - 10] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 17])) {
                                if (!(in_array($tabla[$movimiento - 17], $negras))) {
                                    if (dentroTabla($movimiento, -17, -2)) {
                                        $color[$movimiento - 17] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 15])) {
                                if ((!in_array($tabla[$movimiento - 15], $negras))) {
                                    if (dentroTabla($movimiento, -15, -2)) {
                                        $color[$movimiento - 15] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento - 6])) {
                                if (!(in_array($tabla[$movimiento - 6], $negras))) {
                                    if (dentroTabla($movimiento, -6, -1)) {
                                        $color[$movimiento - 6]  = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 10])) {
                                if (!(in_array($tabla[$movimiento + 10], $negras))) {
                                    if (dentroTabla($movimiento, 10, 1)) {
                                        $color[$movimiento + 10] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 17])) {
                                if (!(in_array($tabla[$movimiento + 17], $negras))) {
                                    if (dentroTabla($movimiento, 17, 2)) {
                                        $color[$movimiento + 17] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 15])) {
                                if (!(in_array($tabla[$movimiento + 15], $negras))) {
                                    if (dentroTabla($movimiento, 15, 2)) {
                                        $color[$movimiento + 15] = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + 6])) {
                                if (!(in_array($tabla[$movimiento + 6], $negras))) {
                                    if (dentroTabla($movimiento, 6, 1)) {
                                        $color[$movimiento + 6]  = "r";
                                    }
                                }
                            }
                            guardarMovimiento();
                        }
                        /** caballo */
                        /** torre */
                        if ($selecion == "♜") {
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
                        }
                        /** torre */
                        /** alfil */
                        if ($selecion == "♝") {
                            $count1 = 0;
                            $ultimo1 = 0;
                            $ultimo2 = 0;

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
                                            if (in_array($tabla[$movimiento + $i * 9], $blancas)) {
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
                        }
                        /** alfil */
                        /** reyna */
                        if ($selecion == "♛") {
                            $count1 = 0;
                            $ultimo1 = 0;
                            $ultimo2 = 0;
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
                        }
                        /** reina */
                        /** rey */
                        if ($selecion == "♚") {
                            if (isset($tabla[$movimiento + -9])) {
                                if (!(in_array($tabla[$movimiento + -9], $negras))) {
                                    if (dentroTabla($movimiento, -9, -1)) {
                                        $color[$movimiento + -9]  = "r";
                                    }
                                }
                            }
                            if (isset($tabla[$movimiento + -8])) {
                                if (!(in_array($tabla[$movimiento + -9], $negras))) {
                                    if (dentroTabla($movimiento, -8, -1)) {
                                        $color[$movimiento + -8]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + -7])) {
                                if (!(in_array($tabla[$movimiento + -7], $negras))) {
                                    if (dentroTabla($movimiento, -7, -1)) {
                                        $color[$movimiento + -7]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + -1])) {
                                if (!(in_array($tabla[$movimiento + -1], $negras))) {
                                    if (dentroTabla($movimiento, -1, 0)) {
                                        $color[$movimiento + -1]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 1])) {
                                if (!(in_array($tabla[$movimiento + 1], $negras))) {
                                    if (dentroTabla($movimiento, 1, 0)) {
                                        $color[$movimiento + 1]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 7])) {
                                if (!(in_array($tabla[$movimiento + 7], $negras))) {
                                    if (dentroTabla($movimiento, 7, 1)) {
                                        $color[$movimiento + 7]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 8])) {
                                if (!(in_array($tabla[$movimiento + 8], $negras))) {
                                    if (dentroTabla($movimiento, 8, 1)) {
                                        $color[$movimiento + 8]  = "r";
                                    }
                                }
                            }

                            if (isset($tabla[$movimiento + 9])) {
                                if (!(in_array($tabla[$movimiento + 9], $negras))) {
                                    if (dentroTabla($movimiento, 9, 1)) {
                                        $color[$movimiento + 9]  = "r";
                                    }
                                }
                            }
                        }
                        /** rey */
                        guardarMovimiento();
                    } else {
                        $menssaje = "No es tu turno";
                    }
                }
            } else {
                $menssaje = "Seleciona una ficha valida";
            }
            /*Realizar movimiento */
            $colorJson = json_encode($color);
            setcookie('color', $colorJson, time() + 3600);
        } else {
            $ficha = $_COOKIE["movimiento"];
            $mover = $_GET['ajedrez'];
            setcookie("movimiento");
            if ((in_array($tabla[$ficha], $blancas) != in_array($tabla[$mover], $blancas) or (in_array($tabla[$ficha], $negras) != in_array($tabla[$mover], $negras)))) {
                print("$mover $color[$ficha]");
                if ($color[$mover] == 'r') {
                    $tabla[$mover] = $tabla[$ficha];
                    $tabla[$ficha] = "ㅤ";
                    guardarTabla($tabla,$sel);
                    $turno = cambioTurno(true,$sel,$ruta);
                    $color = cargarColores(true);
                } else {
                    $menssaje = "No se puede realizar el movimiento";
                    $color = cargarColores(true);
                }
            } else {
                $menssaje = "Cancelando movimiento";
                $color = cargarColores(true);
            }
        }
    }
    if (!isset($turno)) {
        return [$tabla, $menssaje, $color];
    }
    return [$tabla, $menssaje, $color];
}
