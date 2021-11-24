<?php 
date_default_timezone_set('America/Costa_Rica');
define("HOST", "https://coinpay.cr/webapiv2/");
define("CREDENCIALES", array(
    'UserId'    => '31201',
    'User'      => 'info@gana95.comBusiness',
    'Name'      => 'Ksino Net limitada',
    'Password'  => 'G@n@2021',
    'ApiKey'    => 'D2EF219CBA76E364505F8003B80D217B',
    'ShareKey'  => '---'
  )
);
define("TOKEN", base64_encode (CREDENCIALES['UserId'].':'.CREDENCIALES['ApiKey']));

require 'vendor/autoload.php';

class loteriarequest 
{

  public static function Test()
  {
      $url = HOST.'api/Integration/CreateChannel' ;
      $cr= CREDENCIALES;
      return json_encode(array('token' => TOKEN));
  }

  public static function CreateChannel($IdCurrency,$IdExternalIdentification,$TagName)
  {
      $url = HOST.'api/Integration/CreateChannel' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client(); 
     
      $response = $client->request('POST', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ],
          'body'    => json_encode ( [
              "IdCurrency" => $IdCurrency,
              "IdExternalIdentification" => $IdExternalIdentification,
              "TagName" => $TagName
              ])
      ]);
      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function IsValidAddress($IdCurrency,$Address) {
      $url = HOST.'api/Integration/IsValidAddress' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client();        
      $response = $client->request('POST', $url, [
        'headers' => [
          'content-type' => 'application/json' , 
          'Authorization' => 'Bearer '.TOKEN , 
          ],
        'body'    => json_encode ( [
          "IdCurrency" => $IdCurrency,
          "Address"    => $Address,
          ])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function JPCCreateUserAccount(
      $Name,$MiddleName,$LastName,$LastName2,$Email, 
      $Phone, $City, $CountryCode, $StateCode,$Languaje, $ip, $Password)
  {
      $url = HOST.'api/Integration/IsValidAddress' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client(); 
     
      $response = $client->request('POST', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ],
          'body' => json_encode([
              'Name'=>$Name,
              'MiddleName'=>$MiddleName,
              'LastName'=>$LastName,
              'LastName2'=>$LastName2,
              'Email'=>$Email,
              'Phone'=>$Phone,
              'City'=>$City,
              'CountryCode'=>$CountryCode,
              'StateCode'=>$StateCode,
              'Languaje'=>$Languaje,
              'Ip' => $ip,
              'Signature' => hash('sha256', $cr['UserId'].$Email.$ip),
              'Data' => base64_encode($Email.$cr['UserId'].$ip.$Password) 
          ])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function GetAccountBalance()
  {
      $url = HOST.'api/Integration/GetAccountBalance' ;
      $client = new GuzzleHttp\Client(); 
     
      $response = $client->request('GET', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ]
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function GetAccountBalanceByIdCurrency($IdCurrency)
  {
      $url = HOST.'api/Integration/GetAccountBalanceByIdCurrency';
      $client = new GuzzleHttp\Client(); 
     
      $response = $client->request('GET', $url, [
        'headers' => [
            'content-type' => 'application/json' , 
            'Authorization' => 'Bearer '.TOKEN , 
            ],
        'Body' => json_encode (['IdCurrency' => $IdCurrency])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function JPCEasyPaymentGetCustomerDetails($Email) {
      $url = HOST.'api/Integration/JPCEasyPaymentGetCustomerDetails' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client();        
      $response = $client->request('POST', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ],
          'body'    => json_encode ( [
              "CustomerEmail"    => $Email,
              ])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function JPCEasyPaymentGetTransactionDetails($Id) {
      $url = HOST.'api/Integration/JPCEasyPaymentGetTransactionDetails' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client();        
      $response = $client->request('GET', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ],
          'query'    => json_encode ( [
              "IdTransaction"    => $Id,
              ])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function JPCEasyPaymentRequest($Customer, $Amount, $Fee, $Description, $Currency) {
      $url = HOST.'api/Integration/JPCEasyPaymentRequest' ;
      $cr= CREDENCIALES;
      $client = new GuzzleHttp\Client();        
      $response = $client->request('POST', $url, [
          'headers' => [
              'content-type' => 'application/json' , 
              'Authorization' => 'Bearer '.TOKEN , 
              ],
          'body'    => json_encode ( [
              "Customer"    => $Customer,
              "Amount" => $Amount,
              "Fee" => $Fee,
              "Description" => $Description,
              "Currency" => $Currency
              ])
      ]);

      $response->getHeaderLine('application/json; charset=utf8'); 
      return $response->getBody();
  }

  public static function MoveFundsWithAuthorization($CoinId, $IdTransaction, 
    $AddressTo, $Amount, $Comments) {
        $url = HOST.'api/Integration/MoveFundsWithAuthorization' ;
        $cr= CREDENCIALES;
        $client = new GuzzleHttp\Client();        
        $response = $client->request('POST', $url, [
            'headers' => [
                'content-type' => 'application/json' , 
                'Authorization' => 'Bearer '.TOKEN , 
                ],
            'body'    => json_encode ( [
                "CoindId"    => $CoinId,
                "IdTransaction" => $IdTransaction,
                "AddressTo" => $AddressTo,
                "Amount" => $Amount,
                "Comments" => $Comments
                ])
        ]);

        $response->getHeaderLine('application/json; charset=utf8'); 
        return $response->getBody();
    }

  public static function buyProduct($Ip, $IdCurrency, $TotalAmountCurrency, $AmountUsd,
    $TotalAmountUsd, $IdProduct, $Product) {
    $url = HOST.'api/globalServices/buyProduct/v1' ;
    $cr= CREDENCIALES;
    $client = new GuzzleHttp\Client();        
    $response = $client->request('POST', $url, [
        'headers' => [
            'content-type' => 'application/json' , 
            'Authorization' => 'Bearer '.TOKEN , 
            ],
        'body'    => json_encode ( [
            "Ip"    => $Ip,
            "IdCurrency" => $IdCurrency,
            "TotalAmountCurrency" => $TotalAmountCurrency,
            "AmountUsd" => $AmountUsd,
            "TotalAmountUsd" => $TotalAmountUsd,
            "IdProduct" => $IdProduct,
            "Product" => $Product
            ])
    ]);

    $response->getHeaderLine('application/json; charset=utf8'); 
    return $response->getBody();
    }

  public static function getProducts($Ip, $Country) {
    $url = HOST.'api/globalServices/getProducts/v1' ;
    $cr= CREDENCIALES;
    $client = new GuzzleHttp\Client();        
    $response = $client->request('POST', $url, [
        'headers' => [
            'content-type' => 'application/json' , 
            'Authorization' => 'Bearer '.TOKEN , 
            ],
        'body'    => json_encode ( [
            "Ip"    => $Ip,
            "EndCursor" => "",
            "Country" => $Country,
            ])
    ]);


    $response->getHeaderLine('application/json; charset=utf8'); 
    return $response->getBody();
    }

  public static function productFee($Ip, $IdCurrency, $TotalAmountCurrency, $AmountUsd,
    $TotalAmountUsd, $IdProduct, $Product) {
    $url = HOST.'api/globalServices/productFee/v1' ;
    $cr= CREDENCIALES;
    $client = new GuzzleHttp\Client();        
    $response = $client->request('POST', $url, [
        'headers' => [
            'content-type' => 'application/json' , 
            'Authorization' => 'Bearer '.TOKEN , 
            ],
        'body'    => json_encode ( [
            "Ip"    => $Ip,
            "IdCurrency" => $IdCurrency,
            "TotalAmountCurrency" => $TotalAmountCurrency,
            "AmountUsd" => $AmountUsd,
            "TotalAmountUsd" => $TotalAmountUsd,
            "IdProduct" => $IdProduct,
            "Product" => $Product
            ])
    ]);

    $response->getHeaderLine('application/json; charset=utf8'); 
    return $response->getBody();
    }

}

?>