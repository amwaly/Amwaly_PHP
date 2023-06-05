<?php
// Amwaly PHP APi WithOut Client Deatils
// https://github.com/Amwaly/Amwaly_PHP


// use this function in your project 

function AmwalyCreateLink($Product,$Total,$callback_url){

// this info's will get from your email README.pdf
$Amwaly_Url   = "";
$Amwaly_Key   = "";
$Amwaly_Email = "";

$curl = curl_init();
curl_setopt_array($curl, array(
 CURLOPT_URL => $Amwaly_Url,
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => '',
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 0,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS => 'email='.$Amwaly_Email.'&Publishable_Key='.$Amwaly_Key.'&Product='.$Product.'&Total='.$Total.'&callback_url='.$callback_url.'',
 CURLOPT_HTTPHEADER => array(
  'Content-Type: application/x-www-form-urlencoded'
 ),
));

$response = curl_exec($curl);
$json = json_decode($response);
curl_close($curl);
return $json->url;
}

// Customer Info's sent with APi 

$Amwaly_Product = "Order 10#"; // Name Product
$Amwaly_Total  = "10"; // Amount USD 
$Amwaly_callback_url = "https://yourdomen.com/Amwaly/callback"; // After Payment Completed will back the your url


// cell with Amwaly APi for get Payment url for Pay..
$Payment_Url = AmwalyCreateLink($Amwaly_Product,$Amwaly_Total,$Amwaly_callback_url);


echo "Payment Url is : $Payment_Url";
