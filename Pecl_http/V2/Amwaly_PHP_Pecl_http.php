<?php

// Amwaly PHP APi With Client Deatils
// https://github.com/Amwaly/Amwaly_PHP


$client = new http\Client;
$request = new http\Client\Request;

// this info's will get from your email README.pdf
$Amwaly_Url   = "";
$Amwaly_Key   = "";
$Amwaly_Email = "";



// Customer Info's sent with APi 

$Amwaly_Product = "Order 10#"; // Name Product
$Amwaly_amount  = "10"; // Amount USD 
$Amwaly_callback_url = "https://yourdomen.com/Amwaly/callback"; // After Payment Completed will back the your url
$Amwaly_customer_email = "email@email.com"; // Email Customer
$Amwaly_billing_street1 = "Dubae"; // Billing Street 1
$Amwaly_billing_city = "Dubae"; // Customer City
$Amwaly_billing_state = "Dubae Street "; // Billing State
$Amwaly_billing_country = "AE";// Customer Country  like AE - IQ - FR etc...
$Amwaly_billing_postcode = "10013"; // Customer ZIP Code
$Amwaly_customer_givenName = "Azozz"; // Customer First Name
$Amwaly_customer_surname   = "ALFiras"; // Customer Last Name
$Amwaly_customer_phonenumber = "9647719675127"; // Customer Phone Number

$request->setRequestUrl($Amwaly_Url);

$request->setRequestMethod('POST');
$body = new http\Message\Body;
$body->append(new http\QueryString(array(
'email' => $Amwaly_Email,
'Publishable_Key' => $Amwaly_Key,
'Product' => $Amwaly_Product,
'amount' => $Amwaly_amount,
'callback_url' => $Amwaly_callback_url,
'customer_email' => $Amwaly_customer_email,
'billing_street1' => $Amwaly_billing_city,
'billing_city' => $Amwaly_billing_state,
'billing_state' => $Amwaly_billing_country,
'billing_country' => $Amwaly_billing_postcode,
'billing_postcode' => $Amwaly_billing_postcode,
'customer_givenName' => $Amwaly_customer_givenName,
'customer_surname' => $Amwaly_customer_surname,
'customer_phonenumber' => $Amwaly_customer_phonenumber)));

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

