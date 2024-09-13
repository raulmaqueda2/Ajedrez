<?php

function comprobarSession(){
    if (!isset($_COOKIE['PHPSESSID'])) {
        header("refresh:0.1;url=../");
    }
}