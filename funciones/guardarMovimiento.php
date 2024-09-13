<?php
function guardarMovimiento()
{
    $movimiento = $_GET['ajedrez'];
    setcookie("movimiento", $movimiento, time() + 3600);
}