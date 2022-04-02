<?php  
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
/*/ Insert DB /*/
include '../../../templates/includes/paypal/insert_db/BetaNormal.php';

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require "../../../templates/includes/paypal/app/start.php";
if(!isset($_GET["success"] , $_GET["paymentId"] , $_GET["PayerID"])){
	die();
}

if((bool) $_GET["success"] === false){
	die();
}

$paymentId = $_GET["paymentId"];
$payerId = $_GET["PayerID"];

$payment = Payment::get($paymentId,$apiContext );
$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try{
	$result = $payment->execute($execute , $apiContext );
	/* var_dump($result); */
	BetaNormal();
	header("Location: ../../../Home/");
	print "Thanks for Payment";
}
catch(Exception $e){
	$data = json_decode($e->getData());
	var_dump($data->message);
	die();
}
