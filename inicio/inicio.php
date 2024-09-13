<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
$valido = false;
/**Crear cuenta */
if (isset($_GET['usuario_register']) and isset($_GET['pass_register'])) {
    $base_datos = mysqli_connect("localhost", "root", "");
    mysqli_select_db($base_datos, "ajedrez");
    $user = $_GET['usuario_register'];
    $pass = $_GET['pass_register'];
    $sql = "select * from usuario where usuario = ('$user')";
    $resultado = mysqli_query($base_datos, $sql);
    if (mysqli_num_rows($resultado) == 0) {
        $pass = password_hash($pass, CRYPT_SHA256);
        $sql = "INSERT INTO usuario (usuario,pass) VALUES ('$user','$pass')";
        $resultado = mysqli_query($base_datos, $sql);
        print("Cuneta creada con exito");
    } else {
        print("Error usuario ya existe");
    }
}
if (isset($_GET['session'])) {
    unset($_COOKIE['turno']);
    unset($_COOKIE['tablero']);
    unset($_COOKIE['color']);
    unset($_COOKIE['PHPSESSID']);
    setcookie('turno');
    setcookie('tablero');
    setcookie('color');

    header("refresh:0.1;url=inicio.php");
}
if (isset($_GET['usuario']) and isset($_GET['pass'])) {
    $user = $_GET['usuario'];
    $pass = $_GET['pass'];
    $base_datos = mysqli_connect("localhost", "root", "");
    mysqli_select_db($base_datos, "ajedrez");
    $sql = "select * from usuario where usuario = ('$user')";
    $resultado = mysqli_query($base_datos, $sql);
    if (mysqli_num_rows($resultado)) {
        $resultado_simplificado = mysqli_fetch_all($resultado);
        $user_bd = $resultado_simplificado[0][0];
        $pass_bd = $resultado_simplificado[0][1];
        if (password_verify($pass, $pass_bd)) {
            setcookie("usuario", $user, 0, "/");
            session_start();
            header("refresh:0.1;inicio.php");
        } else {
            print("Password incorrecto");
        }
    } else {
        print("Usuario no registrado");
    }


    //print_r($resultado);
    //if (password_verify($pass, $validar)) {
    // }
}
if (isset($_COOKIE["PHPSESSID"])) {
?>

    <body class="gradient-border">
        <div>
            <a href="../juegos/offline.php">Ajedrez Offline</a>
        </div>
        <div>
            <a href="../juegos/online.php">Ajedrez Online</a>
        </div>
        <div>
            <a href="../juegos/ia.php">Ajedrez AI</a>
        </div>
        <div>
            <form action="" method="get">
                <button name="session" value="1">Cerrar sesion</button>
            </form>
        </div>
    </body>
    <style>
        html {
            background-color: rgb(17, 4, 4);
            text-align: center;
            align-items: center;
        }

        body {
            text-align: center;
            align-items: center;
            margin: 10vw;
            background-color: rgb(36, 36, 67);
            height: 30vw;
            margin-left: 30vw;
            margin-right: 30vw;
            border-radius: 2vw;
            ;
        }

        div {
            padding-top: 3vw;
        }

        a {
            font-size: 5vw;
            text-decoration: none;
            color: rgb(149, 29, 29);
        }

        a:hover {
            color: red;
            color: #705e18;
        }

        .gradient-border {
            --border-width: 3px;

            position: relative;
            justify-content: center;
            align-items: center;
            width: 50vw;
            height: 30vw;
            font-family: Lato, sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            color: white;
            background: #222;
            border-radius: var(--border-width);

            &::after {
                position: absolute;
                content: "";
                top: calc(-1 * var(--border-width));
                left: calc(-1 * var(--border-width));
                z-index: -1;
                width: calc(100% + var(--border-width) * 2);
                height: calc(100% + var(--border-width) * 2);
                background: linear-gradient(60deg,
                        hsl(224, 85%, 66%),
                        hsl(269, 85%, 66%),
                        hsl(314, 85%, 66%),
                        hsl(359, 85%, 66%),
                        hsl(44, 85%, 66%),
                        hsl(89, 85%, 66%),
                        hsl(134, 85%, 66%),
                        hsl(179, 85%, 66%));
                background-size: 300% 300%;
                background-position: 0 50%;
                border-radius: calc(2 * var(--border-width));
                animation: moveGradient 4s alternate infinite;
            }
        }

        @keyframes moveGradient {
            50% {
                background-position: 100% 50%;
            }
        }
    </style>
<?php
} else if (isset($_GET['cuenta'])) {
?>

    <body class="gradient-border">
        <form action="" method="get">
            <div>
                <h1 style="font-size: 2vw;">Introduce usuario: </h1>
                <input style="font-size: 2vw;" type="text" value="" name="usuario_register" required>
            </div>
            <div>
                <h1 style="font-size: 2vw;">Introduce contraseña: </h1>
                <input style="font-size: 2vw;" type="password" value="" name="pass_register" required>
            </div>
            <button style="font-size: 2vw;" name="registro">registrarse</button>
        </form>
    </body>
    <style>
        html {
            background-color: rgb(17, 4, 4);
            text-align: center;
            align-items: center;
        }

        body {
            text-align: center;
            align-items: center;
            margin: 10vw;
            background-color: rgb(36, 36, 67);
            height: 30vw;
            margin-left: 30vw;
            margin-right: 30vw;
            border-radius: 2vw;
            ;
        }

        div {
            padding-top: 3vw;
        }

        a {
            font-size: 5vw;
            text-decoration: none;
            color: rgb(149, 29, 29);
        }

        a:hover {
            color: red;
            color: #705e18;
        }

        .gradient-border {
            --border-width: 3px;

            position: relative;
            justify-content: center;
            align-items: center;
            width: 50vw;
            height: 30vw;
            font-family: Lato, sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            color: white;
            background: #222;
            border-radius: var(--border-width);

            &::after {
                position: absolute;
                content: "";
                top: calc(-1 * var(--border-width));
                left: calc(-1 * var(--border-width));
                z-index: -1;
                width: calc(100% + var(--border-width) * 2);
                height: calc(100% + var(--border-width) * 2);
                background: linear-gradient(60deg,
                        hsl(224, 85%, 66%),
                        hsl(269, 85%, 66%),
                        hsl(314, 85%, 66%),
                        hsl(359, 85%, 66%),
                        hsl(44, 85%, 66%),
                        hsl(89, 85%, 66%),
                        hsl(134, 85%, 66%),
                        hsl(179, 85%, 66%));
                background-size: 300% 300%;
                background-position: 0 50%;
                border-radius: calc(2 * var(--border-width));
                animation: moveGradient 4s alternate infinite;
            }
        }

        @keyframes moveGradient {
            50% {
                background-position: 100% 50%;
            }
        }
    </style>

<?php
} else {
?>

    <body class="gradient-border">
        <form action="" method="get">
            <button style="font-size: 2vw;" name="cuenta" value="1">Crear cuenta</button>
        </form>
        <form action="" method="get">
            <div>
                <p style="font-size: 2vw;">Introduce usuario: </p>
                <input style="font-size: 2vw;" type="text" value="" name="usuario" required>
            </div>
            <div>
                <p style="font-size: 2vw;">Introduce contraseña: </p>
                <input style="font-size: 2vw;" type="password" value="" name="pass" required>
            </div>
            <button style="font-size: 2vw;">Comprobar</button>
        </form>
    </body>
    <style>
        html {
            background-color: rgb(17, 4, 4);
            text-align: center;
            align-items: center;
        }

        body {
            text-align: center;
            align-items: center;
            margin: 10vw;
            background-color: rgb(36, 36, 67);
            height: 40vw;
            margin-left: 30vw;
            margin-right: 30vw;
            border-radius: 2vw;
            ;
        }

        div {
            padding-top: 3vw;
        }

        a {
            font-size: 5vw;
            text-decoration: none;
            color: rgb(149, 29, 29);
        }

        a:hover {
            color: red;
            color: #705e18;
        }

        .gradient-border {
            --border-width: 3px;

            position: relative;
            justify-content: center;
            align-items: center;
            width: 50vw;
            height: 40vw;
            font-family: Lato, sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            color: white;
            background: #222;
            border-radius: var(--border-width);

            &::after {
                position: absolute;
                content: "";
                top: calc(-1 * var(--border-width));
                left: calc(-1 * var(--border-width));
                z-index: -1;
                width: calc(100% + var(--border-width) * 2);
                height: calc(100% + var(--border-width) * 2);
                background: linear-gradient(60deg,
                        hsl(224, 85%, 66%),
                        hsl(269, 85%, 66%),
                        hsl(314, 85%, 66%),
                        hsl(359, 85%, 66%),
                        hsl(44, 85%, 66%),
                        hsl(89, 85%, 66%),
                        hsl(134, 85%, 66%),
                        hsl(179, 85%, 66%));
                background-size: 300% 300%;
                background-position: 0 50%;
                border-radius: calc(2 * var(--border-width));
                animation: moveGradient 4s alternate infinite;
            }
        }

        @keyframes moveGradient {
            50% {
                background-position: 100% 50%;
            }
        }
    </style>
<?php
}
?>

</html>