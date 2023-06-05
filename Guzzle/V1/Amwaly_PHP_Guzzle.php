<?php

// Amwaly PHP APi WithOut Client Deatils
// https://github.com/Amwaly/Amwaly_PHP


$client = new Client();
$headers = [
  'Content-Type' => 'application/x-www-form-urlencoded'
];

// this info's will get from your email README.pdf
$Amwaly_Url   = "";
$Amwaly_Key   = "";
$Amwaly_Email = "";



// Customer Info's sent with APi 

$Amwaly_Product = "Order 10#"; // Name Product
$Amwaly_Total  = "10"; // Amount USD 
$Amwaly_callback_url = "https://yourdomen.com/Amwaly/callback"; // After Payment Completed will back the your url



$options = [
'form_params' => [
  'email' => $Amwaly_Email,
  'Publishable_Key' => $Amwaly_Key,
  'Product' => $Amwaly_Product,
  'Total' => $Amwaly_Total,
  'callback_url' => $Amwaly_callback_url,
]];
$request = new Request('POST', $Amwaly_Url, $headers);
$res = $client->sendAsync($request, $options)->wait();
$body =  $res->getBody();
$json = json_decode($body);
$Payment_Url = $json->url;


echo "Payment Url is : $Payment_Url";

