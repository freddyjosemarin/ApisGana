<?php
session_start();

// require_once 'config.php';
function getUserIp(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    //ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    //ip pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}


require_once 'coinpayrequest.php';

$Entrada=count($_GET) ? $_GET : '';
$Entrada=count($_POST) ? $_POST : $Entrada;
$Accion=isset($Entrada['accion']) ? $Entrada['accion'] : '';
$Accion=isset($Entrada['Accion']) ? $Entrada['Accion'] : $Accion;
$Test=False;

switch ($Accion) {
	case 'GetSorteos':
	    $producto = $Entrada['producto'];
	    $ArraySorteos = json_decode(loteriarequest::SorteosLoteria($producto) , true );
	    $count = 1;
		break;
	case 'Test':
		header('Content-Type: application/json');
		echo loteriarequest::Test();
		break;
	case 'CreateChannel':
		if ($Test) {
			$IdCurrency=1;
			$IdExternalIdentification=31201;
			$TagName='info@gana95.comBusiness';

		} else {
			$IdCurrency=$Entrada['IdCurrency'];
			$IdExternalIdentification=$Entrada['IdExternalIdentification'];
			$TagName=$Entrada['TagName'];
		}

		$respuesta=loteriarequest::CreateChannel($IdCurrency,$IdExternalIdentification,$TagName);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'IsValidAddress':
		if ($Test) {
			$IdCurrency=1;
			$Address='3H8DV5AqGA9rE7tEw4Ytg3heiLLbVwQany';
		} else {
			$IdCurrency=$Entrada['IdCurrency'];
			$Address=$Entrada['Address'];
		}
		$respuesta=loteriarequest::IsValidAddress($IdCurrency,$Address);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'JPCCreateUserAccount':
		if ($Test) {
      	$Name="Freddy";
      	$MiddleName="Jose";
      	$LastName="Marin";
      	$LastName2="";
      	$Email="info@gana95.com" ;
      	$Phone="+584259875472";
      	$City="Nueva Esparta";
      	$CountryCode="VZ";
      	$StateCode="NE";
      	$Languaje="";
      	$Password="0102030405";
		} else {
      	$Name=$Entrada["Name"];
      	$MiddleName=$Entrada["MiddleName"];
      	$LastName=$Entrada["LastName"];
      	$LastName2=$Entrada["LastName2"];
      	$Email=$Entrada["Email" ];
      	$Phone=$Entrada["Phone"];
      	$City=$Entrada["City"];
      	$CountryCode=$Entrada["CountryCode"];
      	$StateCode=$Entrada["StateCode"];
      	$Languaje=$Entrada["Languaje"];
      	$Password=$Entrada["Password"];
		}
		$ip=getUserIp();
		$respuesta=loteriarequest::JPCCreateUserAccount(
    	$Name,$MiddleName,$LastName,$LastName2,$Email,$Phone,$City,$CountryCode,$StateCode,
    	$Languaje,$ip,$Password);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'GetAccountBalance':
		$respuesta=loteriarequest::GetAccountBalance();
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'GetAccountBalanceByIdCurrency':
		if ($Test) {
			$IdCurrency=1;
		} else {
			$IdCurrency=$Entrada['IdCurrency'];
		}
		$respuesta=loteriarequest::GetAccountBalanceByIdCurrency($IdCurrency);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'JPCEasyPaymentGetCustomerDetails':
		if ($Entrada["Email"]!=='') {
        	$Email=$Entrada["Email" ];
		} else {
        	$Email="info@gana95.com" ;
		}
		$respuesta=loteriarequest::JPCEasyPaymentGetCustomerDetails($Email);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'JPCEasyPaymentGetTransactionDetails':
		$Id=0;
		if ($Entrada["Id"]!=='') {
    	$Id=intval($Entrada["Id" ]);
		}
		if ($Id==0) {
			$Id=4545;	
		}
		$respuesta=loteriarequest::JPCEasyPaymentGetTransactionDetails($Id);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'JPCEasyPaymentRequest':
		if ($Test) {
    	$Customer=json_encode(array(
    		'IdUser' => 31201,
    		'FirstName' => "Freddy",
    		'LastName' =>"Marin",
    		'LastName2' =>"",
    		'Email' => "info@gana95.com",
    		'Identification' => 4545
    	));
    	$Amount=$Entrada["Amount" ];
    	$Fee=$Entrada["Fee" ];
    	$Description=$Entrada["Description" ];
    	$Currency=json_encode(array('Id'=>1));
		} else {
    	$Customer=$Entrada["Customer" ];
    	$Amount=$Entrada["Amount" ];
    	$Fee=$Entrada["Fee" ];
    	$Description=$Entrada["Description" ];
    	$Currency=$Entrada["Currency" ];
		}
		$respuesta=loteriarequest::JPCEasyPaymentRequest($Customer,$Amount,$Fee,$Description,$Currency);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'MoveFundsWithAuthorization':
		if ($Test) {
    	$CoinId=6;
    	$IdTransaction=4545;
    	$AddressTo='goldsportven';
    	$Amount=10;
    	$Comments='Test de Transferencia';
		} else {
    	$CoinId=$Entrada["CoinId"];
    	$IdTransaction=$Entrada["IdTransaction" ];
    	$AddressTo=$Entrada["AddressTo" ];
    	$Amount=$Entrada["Amount" ];
    	$Comments=$Entrada["Comments" ];
		}
		$respuesta=loteriarequest::MoveFundsWithAuthorization($CoinId,$IdTransaction,
		$AddressTo,$Amount,$Comments);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'buyProduct':
    $Ip=getUserIp();
		if ($Test) {
    	$IdCurrency=6;
    	$TotalAmountCurrency='goldsportven';
    	$AmountUsd=10;
    	$TotalAmountUsd=10;
    	$IdProduct="1";
    	$Product = json_encode(array(
    		'Email' => 'freddyjosemarin@msn.com',
    		'Id' => '1',
    		'Sku' => '11233',
    		'Name' => 'Producto A',
    		'Amount' => 10,
    		'VariablePrice' => true,
    		'MinAmount' => 1,
    		'MaxAmount' => 100,
    		'inputs' => array(
        	array(
	          "name"=> "accountNumber",
	          "label"=> "Email",
	          "required"=> true,
	          "type"=> "email",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "email",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
        	),
        	array(
	          "name"=> "customerFirstName",
	          "label"=> "First Name",
	          "required"=> false,
	          "type"=> "string",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "text",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
        	),
        	array(
	          "name"=> "customerLastName",
	          "label"=> "Last Name",
	          "required"=> false,
	          "type"=> "string",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "text",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
	        )
        )
    	));
		} else {
    	$IdCurrency=$Entrada['IdCurrency'];
    	$TotalAmountCurrency=$Entrada['TotalAmountCurrency'];
    	$AmountUsd=$Entrada['AmountUsd'];
    	$TotalAmountUsd=$Entrada['TotalAmountUsd'];
    	$IdProduct=$Entrada['IdProduct'];
    	$Product = $Entrada['Product'];
		}
		$respuesta=loteriarequest::buyProduct($Ip,$IdCurrency, $TotalAmountCurrency,
			$AmountUsd, $TotalAmountUsd, $IdProduct, $Product);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'getProducts':
    $Ip=getUserIp();
		if ($Test) {
    	$Country="US";
		} else {
       $Country=$Entrada['Country'];
		}
		$respuesta=loteriarequest::getProducts($Ip,$Country);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	case 'productFee':
  	$Ip=getUserIp();
  	if ($Test) {
    	$IdCurrency=6;
    	$TotalAmountCurrency='goldsportven';
    	$AmountUsd=1;
    	$TotalAmountUsd=10;
    	$IdProduct=1;
    	$Product = json_encode(array(
    		'Email' => 'freddyjosemarin@msn.com',
    		'Id' => '1',
    		'Sku' => '1',
    		'Name' => 'Producto A',
    		'Amount' => 10,
    		'VariablePrice' => true,
    		'MinAmount' => 1,
    		'MaxAmount' => 100,
    		'inputs' => array(
        	array(
	          "name"=> "accountNumber",
	          "label"=> "Email",
	          "required"=> true,
	          "type"=> "email",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "email",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
        	),
        	array(
	          "name"=> "customerFirstName",
	          "label"=> "First Name",
	          "required"=> false,
	          "type"=> "string",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "text",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
        	),
        	array(
	          "name"=> "customerLastName",
	          "label"=> "Last Name",
	          "required"=> false,
	          "type"=> "string",
	          "help"=> null,
	          "allowMultiple"=> false,
	          "choices"=> null,
	          "html"=> array(
	            "value"=> null,
	            "type"=> "text",
	            "pattern"=> null,
	            "max"=> null,
	            "maxlength"=> null,
	            "min"=> null,
	            "minlength"=> null
	          	),
	          "PreSetValue"=> "",
	          "Value"=> ""
	        )
        )
        ));
		} else {
    	$IdCurrency=$Entrada['IdCurrency'];
    	$TotalAmountCurrency=$Entrada['TotalAmountCurrency'];
    	$AmountUsd=$Entrada['AmountUsd'];
    	$TotalAmountUsd=$Entrada['TotalAmountUsd'];
    	$IdProduct=$Entrada['IdProduct'];
    	$Product = $Entrada['Product'];
		}
		$respuesta=loteriarequest::productFee($Ip,$IdCurrency, $TotalAmountCurrency,
			$AmountUsd, $TotalAmountUsd, $IdProduct, $Product);
		header('Content-Type: application/json');
		echo $respuesta;
		break;
	default:
		break;
}

