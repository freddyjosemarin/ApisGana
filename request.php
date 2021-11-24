<?php 
date_default_timezone_set('America/Costa_Rica');
require_once 'vendor/autoload.php';

class request 
{
    public static function getApi($params)
    {
        //$apiUrl = "https://dashboardtimes.com/FEInterface";
        $apiUrl = "https://gana95.com/FEProd";
        $client = new \GuzzleHttp\Client();        
        $response = $client->request('GET', $apiUrl,$params);
        if($response->getStatusCode() == 200)
        {
            $response->getHeaderLine('application/json; charset=utf8'); 
            return $response->getBody();
        }
        else
        {
            $msjError = [
                'Error' => $response->getStatusCode(),
                'Msj' => 'HTTP API ERROR'
            ];

            return $msjError;
        }
    }
    public static function postApi($params)
    {
        //$apiUrl = "https://dashboardtimes.com/FEInterface";
        $apiUrl = "https://gana95.com/FEProd";
        $client = new \GuzzleHttp\Client();        
        $response = $client->request('POST', $apiUrl,$params);
        if($response->getStatusCode() == 200)
        {
            $response->getHeaderLine('application/json; charset=utf8'); 
            return $response->getBody();
        }
        else
        {
            $msjError = [
                'Error' => $response->getStatusCode(),
                'Msj' => 'HTTP API ERROR'
            ];

            return $msjError;
        }
    }
}
?>