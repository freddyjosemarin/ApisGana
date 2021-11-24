<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('America/Costa_Rica');
setlocale(LC_ALL,"es_ES@euro","es_CR","esp");

require_once 'metodosgenericos.php';
/*
$DB_Servidor="followyourluck.net";
$DB_Username="suerte";
$DB_Password="crMtIptB";
$DB_Database="GanaTiempos";
*/
/*
$DB_Servidor="www.dashboardtimes.com";
$DB_Username="dashboar_times";
$DB_Password="WorldSoft2018";
$DB_Database="dashboar_dashboardtimes";
*/

$DB_Servidor="148.72.71.49";
$DB_Username="gana95test";
$DB_Password="test2021";
$DB_Database="gana95tiempostest";
