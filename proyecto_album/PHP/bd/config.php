<?php 

    session_start();

    date_default_timezone_set('Europe/Madrid');
    set_time_limit(300); // 5 minutos


    if(strpos($_SERVER["HTTP_HOST"], 'practicas.devogilvy.com') !== false){
        define('ENVIRONMENT', 'PRE');
        define('DDBB_HOST', 'practicas.devogilvy.com');
        define('DDBB_USER', 'root');
        define('DDBB_PASS', 'practicas.devogilvy.com');
        define('DDBB',      'practicas');
        define('BASEURL',   'https://practicas.devogilvy.com/');
    } else {
        define('ENVIRONMENT', 'PRO');
        define('DDBB_HOST', '');
        define('DDBB_USER', '');
        define('DDBB_PASS', '');
        define('DDBB',      '');
        define('BASEURL',   '');
    }
    
    if(ENVIRONMENT == 'PRE') {
    	error_reporting(E_ALL);
        ini_set('display_errors', '1');
    } else {
    	error_reporting(0);
    }
    
    
?>