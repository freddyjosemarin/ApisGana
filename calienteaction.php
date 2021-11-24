<?php
session_start();

require_once 'calienterequest.php';

define("TOKEN", "A15ogZIuc5LOk26IHJgnjb64DsqjO3BKWCubmRDgYBm5RiyEps3G");
// define("URL", "https://integration-gc.caliente.cr/shops/aliados/transaction/");
define("URL", "https://integration-gc.caliente.cr/shops/latam/transaction/");


$Entrada=count($_GET) ? $_GET : '';
$Entrada=count($_POST) ? $_POST : $Entrada;
$operation=isset($Entrada['operation']) ? $Entrada['operation'] : '';
$respuesta=array('success'=>false);

switch ($operation) {
	case 'Test':
		$respuesta=calienterequest::api('',array('operation'=>'test'));
		break;
	case 'deposit':
		$amount=$Entrada['amount'] !='' ? : 1000;
		$id_store=$Entrada['id_store'] !='' ? : "1";
		$id_terminal=$Entrada['id_terminal'] !='' ? : "1";
		$phone=$Entrada['phone'] != '' ? : '17171615';

		$respuesta=calienterequest::api(URL,array(
			'token'				=> TOKEN,
      'operation' 	=> 'deposit',
      'amount' 			=> $amount,
      'id_store' 		=> $id_store,
      'id_terminal' => $id_terminal,
      'phone' 			=> $phone
    	)
		);
		break;

	case 'withdraw':
		$transactionid=$Entrada['transactionId'] !='' ? : "69c7eb5f-013c-4f33-ad80-cbc8591f93b8";
		$pin=$Entrada['pin'] !='' ? : "12345";
		$id_store=$Entrada['id_store'] !='' ? : 1;
		$id_terminal=$Entrada['id_terminal'] !='' ? :1;
		$phone=$Entrada['phone'] !='' ? : '17171615';

		$respuesta=calienterequest::api(URL,array(
			'token'					=> TOKEN,
      'operation' 		=> 'withdraw',
      'transactionid' => $transactionid,
      'pin' 					=> $pin,
      'id_store' 			=> $id_store,
      'id_terminal' 	=> $id_terminal,
      'phone' 				=> $phone
    	)
		);
		break;

	case 'check':
		$phone=$Entrada['phone'] !='' ? : '17171615';

		$respuesta=calienterequest::api(URL,array(
			'token'					=> TOKEN,
      'operation' 		=> 'check',
      'phone' 				=> $phone
    	)
		);
		break;

	case 'withdraw_check_amount':
		$transactionid=$Entrada['transactionId']!='' ? : "69c7eb5f-013c-4f33-ad80-cbc8591f93b8";
		$pin=$Entrada['pin'] !='' ? : "12345";
		$phone=$Entrada['phone'] != '' ? : '17171615';
		$amount=$Entrada['amount'] !='' ? : '50';

		$respuesta=calienterequest::api(URL,array(
			'token'					=> TOKEN,
      'operation' 		=> 'withdraw_check_amount',
      'transactionid' => $transactionid,
      'pin' 					=> $pin,
      'phone' 				=> $phone,
      'amount' 				=> $amount,
    	)
		);
		break;

	case 'withdraw_check_status':
		$transactionid=$Entrada['transactionId']!='' ? : "69c7eb5f-013c-4f33-ad80-cbc8591f93b8";
		$respuesta=calienterequest::api(URL,array(
			'token' => TOKEN,'operation' => 'withdraw_check_status', 'transactionid' => $transactionid));
		break;

	case 'pending_withdraw':
		$user=$Entrada['phone']!='' ? : 'realapi';
		$token=$Entrada['token']!='' ? : TOKEN;
		$respuesta=calienterequest::api(
			"http://pinnacle-na.caliente.cr/stores/pending-withdraws/",array(
				'token'		=> $token,
				'user' 		=>$user)
		);
		break;

 	case 'info':
		$phone=$Entrada['phone']!='' ? : '17171615';
		$respuesta=calienterequest::api(URL,
			array(
				'token'			=> TOKEN,
				'operation' => 'check',
        'phone' 		=>$phone)
		);
		break;

	default:
		break;

}

header('Content-Type: application/json');
echo json_encode($respuesta ? : array('success'=>false,'operation' => $operation, 'result' => $respuesta));

