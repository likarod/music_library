<?php

// Apertura
function dbo(){
    $db = new mysqli(DDBB_HOST, DDBB_USER, DDBB_PASS, DDBB);
    $tz = (new DateTime('now', new DateTimeZone('Europe/Madrid')))->format('P');
    $db->query("SET time_zone='$tz';");
    if($db->connect_errno) {
        echo 'Error al conectar a la bbdd.';
        exit();
    } else {
        $db->set_charset("utf8");
    }
    return $db;
}

// Cierre
function dbc($db){
    $db->close();
}

?>