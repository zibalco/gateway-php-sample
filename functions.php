<?php

/**
 * put your gatewat merchant key here.
 * use "zibal" for test
 */
define("ZIBAL_MERCHANT_KEY","zibal");


define("ZIBAL_CALLBACK_URL","http://yourapiurl.com/callback.php");

/**
 * connects to zibal's rest api
 * @param $path
 * @param $parameters
 * @return stdClass
 */
function postToZibal($path, $parameters)
{
    $url = 'https://gateway.zibal.ir/v1/'.$path;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
    return json_decode($response);
}

?>
<?php

/**
 * put your gatewat merchant key here.
 * use "zibal" for test
 */
define("ZIBAL_MERCHANT_KEY","zibal");


define("ZIBAL_CALLBACK_URL","http://yourapiurl.com/callback.php");

/**
 * connects to zibal's rest api
 * @param $path
 * @param $parameters
 * @return stdClass
 */
function postToZibal($path, $parameters)
{
    $url = 'https://gateway.zibal.ir/v1/'.$path;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
    return json_decode($response);
}

/**
 * returns a string message based on result parameter from curl response
 * @param $code
 * @return String
 */
function resultCodes($code)
{
    switch ($code) 
    {
        case 100:
            return "با موفقیت تایید شد";
        
        case 102:
            return "merchant یافت نشد";

        case 103:
            return "merchant غیرفعال";

        case 104:
            return "merchant نامعتبر";

        case 201:
            return "قبلا تایید شده";
        
        case 105:
            return "amount بایستی بزرگتر از 1,000 ریال باشد";

        case 106:
            return "callbackUrl نامعتبر می‌باشد. (شروع با http و یا https)";

        case 113:
            return "amount مبلغ تراکنش از سقف میزان تراکنش بیشتر است.";

        case 201:
            return "قبلا تایید شده";
        
        case 202:
            return "سفارش پرداخت نشده یا ناموفق بوده است";

        case 203:
            return "trackId نامعتبر می‌باشد";

        default:
            return "وضعیت مشخص شده معتبر نیست";
    }
}

?>
