<?php
// Amwaly PHP APi With Client Deatils
// https://github.com/Amwaly/Amwaly_PHP


// use this function in your project 

function AmwalyCreateLink($Product,$amount,$callback_url,$customer_email,$billing_street1,$billing_city,$billing_state,$billing_country,$billing_postcode,$customer_givenName,$customer_surname,$customer_phonenumber){

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
 CURLOPT_POSTFIELDS => 'email='.$Amwaly_Email.'&Publishable_Key='.$Amwaly_Key.'&Product='.$Product.'&amount='.$amount.'&callback_url='.$callback_url.'&customer_email='.$customer_email.'&billing_street1='.$billing_street1.'&billing_city='.$billing_city.'&billing_state='.$billing_state.'&billing_country='.$billing_country.'&billing_postcode='.$billing_postcode.'&customer_givenName='.$customer_givenName.'&customer_surname='.$customer_surname.'&customer_phonenumber='.$customer_phonenumber.'',
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



// cell with Amwaly APi for get Payment url for Pay..
$Payment_Url = AmwalyCreateLink($Amwaly_Product,$Amwaly_amount,$Amwaly_callback_url,$Amwaly_customer_email,$Amwaly_billing_street1,$Amwaly_billing_city,$Amwaly_billing_state,$Amwaly_billing_country,$Amwaly_billing_postcode,$Amwaly_customer_givenName,$Amwaly_customer_surname,$Amwaly_customer_phonenumber);


echo "Payment Url is : $Payment_Url";
