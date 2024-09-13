<?php
require "../funciones/cargarTabla.php";
require "../funciones/cargarColores.php";
require "../funciones/guardarTabla.php";
require '../funciones/setCokies.php';
require '../funciones/setDatos.php';
require '../funciones/cambioTurno.php';
require '../funciones/moverFicha.php';
require '../funciones/dentroTabla.php';
require '../funciones/setMensaje.php';
require '../funciones/guardarMovimiento.php';
require '../funciones/resetTabla.php';
require '../funciones/reyHacke.php';
require '../funciones/comprobarSession.php';

comprobarSession();
$color = reyHacke();
print("<h1>$possicion</h1>");
resetTabla("ia.php",1);
$resultado = moverFicha(1, "ia.php");
$tabla = $resultado[0];
$menssaje = $resultado[1];
/*
$color = $resultado[2];*/
$turno = cambioTurno(false, 1, "ia.php")
?>

<body>
    <a href="../inicio/inicio.php">Regresar</a>
    <form action="" method="get">
        <p>Bienvenido</p>
        <div class="Juego">
            <div class="turno">
                <div>
                    <p>Turno</p>
                </div>
                <div>
                    <p><?php print("$turno"); ?></p>
                </div>
            </div>
            <div class="mensajes">
                <p><?php print("$menssaje"); ?></p>
            </div>
        </div>
        <div class="tablero">

            <?php
            $cont1 = 0;
            print("<div>");
            for ($i = 0; $i < 64; $i++) {
                print "<button id='casilla' name='ajedrez' value='$i' class=" . $color[$i] . ">" . $tabla[$i] . "</button>";
                $cont1++;
                if ($cont1 == 8) {
                    $cont1 = 0;
                    print "</div>";
                    print "<div>";
                }
            }
            print "</div>";

            ?>

        </div>
        <button id="No_mov" name="reset" value="true">
            Reset
        </button>
    </form>
</body>

<style>
    .juego {
        display: flex;
        margin: 0 auto;
        border: solid;
        width: 80vh;
    }

    .juego * {
        margin: 0px;

    }

    .turno {
        flex: 1;
    }

    .mensajes {
        flex: 3;
    }

    p {
        font-size: 5vh;
        display: inline-block;
        margin: 0px;


    }

    form {
        margin: 0 auto;
        align-items: center;
        text-align: center;
    }

    form div * {
        display: flex;
        margin: 0 0;
        justify-content: center;

    }


    button {
        font-size: 7vh;
        /* transform: rotate(0deg);*/
        /* Cambiado a 0deg para empezar en la posición original */
    }

    /* Agregamos un evento para activar el giro */

    .b {
        background-color: burlywood;
    }

    .n {
        background-color: #a9a9a9;
    }

    .r {
        background-color: green;
    }


    #casilla:hover {
        background-color: aquamarine;
    }

    #No_mov{
        transform: rotate(0deg);
    }
</style>