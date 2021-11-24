<?php 
session_start();
$Accion = $_POST['Accion'];
$TiempoMaximoInactivo = 45 * 60; //45 minutos

    switch($Accion)
    {
        case 'ValidarSesion' :
         //La sesion ya no esta abierta
         if(isset($_SESSION['UltimaAccion']))
         {
            $TiempoInactivo = time() - $_SESSION['UltimaAccion'];
            if($TiempoInactivo >= $TiempoMaximoInactivo)
            {
                $session = ["valida" => 0 ] ;
                echo json_encode($session);
            }
            else
            {
                $session = ["valida" => 1 ] ;
                echo json_encode($session);
            }
           
         }
        
        break;
        case 'RefrescarSesion' :
            $_SESSION['UltimaAccion'] = time();
            $session = ["valida" => 1] ;
            echo json_encode($session);
        break;


    }
    
?>