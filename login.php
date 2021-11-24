<?php

require_once 'config.php';
require_once 'funciones.php';

$NomUsuario = trim($_POST['Usuario']);
$Contrasena = $_POST['Contrasena'];

$FuncionesClass = new funciones();

$LoginUsuario = $FuncionesClass->Login($NomUsuario, $Contrasena);

$Array = ["Existe" => 0, "URL" => "", "MSG" => "Usuario o contraseña incorrecta"];

foreach($LoginUsuario as $Usuario){

    $_SESSION['IdUsuario'] = $Usuario['IdUsuario'];
    $_SESSION['Usuario'] = $Usuario['Usuario'];
    $_SESSION['Comision'] = $Usuario['Comision'];
    $_SESSION['PagaPorcertaje'] = $Usuario['PagaPorcentaje'];
    $_SESSION['PagaReal'] = $Usuario['PagaReal'];
    $_SESSION['Devolucion'] = $Usuario['Devolucion'];
    $_SESSION['MontoArranque'] = $Usuario['MontoArranque'];
    $_SESSION['IdRol'] = $Usuario['IdRol'];
    $_SESSION['NombreRol'] = $Usuario['NombreRol'];
    $_SESSION['Icono'] = $Usuario['Icono'];
    $_SESSION['Prepago'] = $Usuario['Prepago'];
    $_SESSION['Iva'] =$Usuario['Iva'];
    $_SESSION['HoraCierre'] = date("Y-m-d H:i:s", strtotime("+1 hours"));
    $_SESSION['UltimaAccion'] = time();
    $_SESSION['Dominio'] = "Gana";
    //  $_SESSION['Menu'] = $UsuarioClass->SelectMenuRol($UsuarioLogin);
    $Array = ["Existe" => 1, "URL" => "principal.php", "MSG" => ""];
}

echo json_encode($Array);