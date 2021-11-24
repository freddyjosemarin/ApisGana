<?php 
date_default_timezone_set('America/Costa_Rica');

require 'vendor/autoload.php';

class calienterequest 
{

  public static function Test()
  {
      return json_encode(array('token' => TOKEN));
  }

  public static function api($url,$post_fields)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $post_fields,
      CURLOPT_HTTPHEADER => array("Accept: application/json"))
    );
    $response = curl_exec($curl); 
    $error = curl_error($curl);
    $result = array( 'header' => '',
       'body' => '',
       'curl_error' => '',
       'http_code' => '',
       'last_url' => '');
    if ( $error != "" ) {
      $result['curl_error'] = $error;
      return $result;
    }
   
    $header_size = curl_getinfo($curl,CURLINFO_HEADER_SIZE);
    $result['header'] = substr($response, 0, $header_size);
    $result['body'] = substr( $response, $header_size );
    $result['http_code'] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
    $result['last_url'] = curl_getinfo($curl,CURLINFO_EFFECTIVE_URL);
    curl_close($curl);
    return $result;    
  }

}

// https://integration-gc.caliente.cr/shops/aliados/transaction/
// https://integration-gc.caliente.cr/shops/aliados/transaction/
?>
