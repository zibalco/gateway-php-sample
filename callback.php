<?php

require 'functions.php';

if ($_GET['success']==1) {
    echo "شناسه سفارش: ".$_GET['orderId']."<br>";

    //start verfication
    $parameters = array(
        "merchant" => ZIBAL_MERCHANT_KEY,//required
        "trackId" => $_GET['trackId'],//required
    );

    $response = postToZibal('verify', $parameters);

    if ($response->result == 100) {
        echo "<pre>";//for pretty view :)
        var_dump($response);
        //update database or something else
    } else {
        echo "result: " . $response->result . "<br>";
        echo "message: " . $response->message;
    }
} else {
    echo "پرداخت با شکست مواجه شد.";
}
?>
