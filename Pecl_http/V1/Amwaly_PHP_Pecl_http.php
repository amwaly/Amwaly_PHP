<?php
// Amwaly PHP APi WithOut Client Deatils
// https://github.com/Amwaly/Amwaly_PHP



$client = new http\Client;
$request = new http\Client\Request;

// this info's will get from your email README.pdf
$Amwaly_Url   = "";
$Amwaly_Key   = "";
$Amwaly_Email = "";



// Customer Info's sent with APi 

$Amwaly_Product = "Order 10#"; // Name Product
$Amwaly_Total  = "10"; // Amount USD 
$Amwaly_callback_url = "https://yourdomen.com/Amwaly/callback"; // After Payment Completed will back the your url

$request->setRequestUrl($Amwaly_Url);

$request->setRequestMethod('POST');
$body = new http\Message\Body;
$body->append(new http\QueryString(array(
'email' => $Amwaly_Email,
'Publishable_Key' => $Amwaly_Key,
'Product' => $Amwaly_Product,
'Total' => $Amwaly_Total,
'callback_url' => $Amwaly_callback_url)));

$request->setBody($body);
$request->setOptions(array());
$request->setHeaders(array(
'Content-Type' => 'application/x-www-form-urlencoded'
));
$client->enqueue($request)->send();
$response = $client->getResponse();
$body =  $res->getBody();
$json = json_decode($body);
$Payment_Url = $json->url;


echo "Payment Url is : $Payment_Url";

