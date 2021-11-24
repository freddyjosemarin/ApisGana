<?php

//$SesionExpirada = 0;
if (!isset($_SESSION['IdUsuario']))
{

    $_SESSION = array();
    session_destroy();
 //   $SesionExpirada = 1;
    header("Location: Error404");
    
}else if($_SESSION['HoraCierre'] < date('Y-m-d H:i:s') || $_SESSION['Dominio'] != 'Gana'){

    $_SESSION = array();
    session_destroy();
   // $SesionExpirada = 1;
    header("Location: Error403");

}else{

    $_SESSION['HoraCierre'] = date("Y-m-d H:i:s", strtotime("+1 hours"));

}

?>


