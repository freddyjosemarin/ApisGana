<?php

require_once 'config.php';
require_once  'funciones.php';

$FuncionesClass = new funciones();

$Accion = $_GET['Accion'];
$IdUsuario = $_SESSION['IdUsuario'];

if ($Accion == 'Saldo'){

    $ArraySaldo = $FuncionesClass->SelectSaldoActual($IdUsuario);

}else if($Accion == 'Prepago'){

    $ArraySaldo = $FuncionesClass->SelectSaldoBilletera($IdUsuario);


}else if($Accion == 'Seguros'){

    $ArraySaldo = $FuncionesClass->SelectSaldoSeguros($IdUsuario);

}
/*
    $IdUsuario = $_SESSION['IdUsuario'];
    if($_SESSION['Prepago'] == 0){

        $ArraySaldo = $FuncionesClass->SelectSaldoActual($IdUsuario);

    }else{

        $ArraySaldo = $FuncionesClass->SelectSaldoBilletera($IdUsuario);

    }
*/


echo FormatoDinero($ArraySaldo['Saldo']);