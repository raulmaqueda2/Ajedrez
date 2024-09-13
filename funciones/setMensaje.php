<? function setMensaje($mensaje)
{
    setcookie('mensaje', $mensaje, time() + 3600);
}