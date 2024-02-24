<?php

require 'functions.php';

$parameters = array(
    "merchant"=> ZIBAL_MERCHANT_KEY,//required
    "callbackUrl"=> ZIBAL_CALLBACK_URL,//required
    "amount"=> 200000,//required

    "orderId"=> time(),//optional
    "mobile"=> "09120000000",//optional
    "percentMode"=> 0,//optional
    "feeMode"=> 0,//optional
    "description"=> "Hello World!",//optional
    "multiplexingInfos"=> array(//optional
        array("id"=> "self","amount"=> 150000),
        array("bankAccount"=> "IR000000000000000000000000","amount"=> 50000),
    )
);

$response = postToZibal('request', $parameters);

if ($response->result == 100)
{
    //save trackId into database if you want or do something else
    $startGateWayUrl = "https://gateway.zibal.ir/start/".$response->trackId;
    header('location: '.$startGateWayUrl);
} else {
    echo "result: ".$response->result."<br>";
    echo "message: ".$response->message;
}

?>
