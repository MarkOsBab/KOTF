<?php
require   '../../../templates/includes/paypal/vendor/autoload.php';

define("SITE_URL" , "https://kingdomsothefuture.com/store");
//Sesuaikan dengan URL anda...

$apiContext  = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfRrXeHmfPC7hWvdFX4RyvFPg5ASNcTsdl8ZrZZIqCANzDbUbpSmQrm1EKMDUKUMSaGFa3kMooXGHb_l',
        'EPrUMt5fp3K0mS6WnRjrumfkR-GO97iRAg2stqv8XbpsCAyHBVjMelzly-mbS3BlmkRkXu7GgFW_827S' 
    )
);

$apiContext->setConfig([
'mode'=>'live',
'http.ConnectionTimeOut'=>30,
'log.LogEnabled' => false,
'log.FileName'=>'',
'log.LogLevel' =>'FINE',
'validation.level'=>'log' ]);
