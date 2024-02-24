<?php

require 'functions.php';

$parameters = array(
    "merchant"=> ZIBAL_MERCHANT_KEY,//required
    "callbackUrl"=> ZIBAL_CALLBACK_URL,//required
    "amount"=> 1000,//required

    "orderId"=> time(),//optional
    "mobile"=> "09120000000",//optional for mpg
);

$response = postToZibal('request', $parameters);
var_dump($response);
if ($response->result == 100)
{
    $startGateWayUrl = "https://gateway.zibal.ir/start/".$response->trackId;
    header('location: '.$startGateWayUrl);
} else {
    echo "errorCode: ".$response->result."<br>";
    echo "message: ".$response->message;
}

?>
