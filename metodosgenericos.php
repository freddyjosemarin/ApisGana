<?php

function FormatoDinero($number, $forDownload = false)
{
    if (!$forDownload)
        $return = '¢' . number_format($number, 0, ',', '.');
    else
        $return = number_format($number, 0, '', '');

    return $return;

}///

function FormatoDineroDecimal($number, $forDownload = false)
{
    if (!$forDownload)
        $return = '¢' . number_format($number, 2, ',', '.');
    else
        $return = number_format($number, 2, ',', '.');

    return $return;

}

function FormatoFecha($Fecha, $Hora = true){

    if($Hora){
        $return = date("d-m-Y H:i:s", strtotime($Fecha));
    }else{
        $return = date("d-m-Y", strtotime($Fecha));
    }

    return $return;

}//

//Encriptacion
function encriptacion( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'cRH8YtUagW';
    $secret_iv = 'zGJZGbNuhU';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
/*
function Redondeo12($numeroAredondear){

    $numero = substr($numeroAredondear, strlen($numeroAredondear)-3);
    $redondear = 100 - $numero;
    if($redondear < 50 && $redondear > 0){
        if($redondear <= 25){
            $redondear = 25 - $redondear;
            //Entre 88-99
            if($redondear <= 12){
                return $numeroAredondear - $redondear;
            }else{//Entre 75-87
                $redondear = 25 - $redondear;
                return $numeroAredondear + $redondear;
            }
        }else{
            $redondear = $redondear - 25;
            //Entre 63-74
            if($redondear <= 12){
                return $numeroAredondear + $redondear;
            }else{//Entre 51-62
                $redondear = 25 - $redondear;
                return $numeroAredondear - $redondear;
            }
        }

    }else if($redondear > 50 && $redondear < 100){
        $redondear = 50 - $numero;
        if($redondear <= 25){
            $redondear = 25 - $redondear;
            //Entre 38-49
            if($redondear <= 12){
                return $numeroAredondear - $redondear;
            }else{//Entre 26-37
                $redondear = 25 - $redondear;
                return $numeroAredondear + $redondear;
            }
        }else{
            $redondear = $redondear - 25;
            //Entre 13-24
            if($redondear <= 12){
                return $numeroAredondear + $redondear;
            }else{//Entre 1-12
                $redondear = 25 - $redondear;
                return $numeroAredondear - $redondear;
            }
        }
    }else{
        return $numeroAredondear;
    }

}//Fin redondeo12
*/


function Redondeo12($Numero, $Factor = 25) { 

    return (int)($Numero / $Factor + 0.5) * $Factor; 

}//


function Redondeo5($Numero, $Factor = 5) { 

    return (int)($Numero / $Factor + 0.5) * $Factor; 

}//