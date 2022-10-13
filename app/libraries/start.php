<?php
    session_start();
    set_time_limit(0);
    ini_set("display_errors", "on"); //faz com que o PHP emita todos os erros que existam durante a execução do script
    ini_set("display_startup_errors", "on"); //faz com que o PHP emita todos os erros que estejam a impedir a execução do script
    error_reporting(E_ALL); //ativar a emissão de todo o tipo de mensagens de aviso e erros.
    define('BDS', 'localhost');
    define('BDPX', 'exportador');
    define('IDIOMA', "pt");

    define('BDN', 'ifreshhost15_estagio');
    define('BDU', 'ifreshhost15_estagio');
    define('BDP', 'agosto2022#');

    define('CP',basename($_SERVER['PHP_SELF'],".php"));

    /*define('BDN', 'onlinestore');
    define('BDU', 'root');
    define('BDP', '');*/
/* 
    require_once('models/user.php');
    $users = new users; */

    $_SESSION["getData"] = 0;
    
?>
