<?php

require_once('../../vendor/autoload.php');
use src\class\ZestApiClient;
use src\class\BigCommerceApiClient;
use src\class\PaymentRequest;
use src\config\Config;

$zestApiKey = '';
$zestApiSecret = '';
$config = new Config();

$paymentSecrete = $config->getKey();
$bigCommerceClientId = $config->commerce_client_id();
$bigCommerceAccessToken =$config->bicommerce_client_secret();
$bigcomerceClinentSecrete = $config->getAccessToken();

$zestClient = new ZestApiClient($zestApiKey, $zestApiSecret);
$zestClient->setApiKey($paymentSecrete);
$email = "chiorlujack@gmail.com";
$amount = "200";

$paymentRequest = new PaymentRequest($email,$amount);
$paymentRequest->setEmail($email);
$paymentRequest->setAmount($amount);

try {
  
    $paymentResponse = $zestClient->processPayment($email,$amount);
    $response = json_decode($paymentResponse, true); 

    echo $paymentResponse;
 
    if ($response) {
        $orderStatus = 'Paid';
        $confirmationMessage = 'Payment successful. Thank you!';
     
    $data = $response['data'];
    $authorizationUrl = $data['paymentURL'];
    $reference = $data['reference'];
    $initUrl="https://api.dev.gateway.zestpayment.com/payment-engine/transaction-verification?ref=".$reference;
    $resp = $zestClient->init($reference);
    echo $resp;
    //  header("location: $initUrl");
    } else {
        $orderStatus = 'Failed';
        $errorMessage = 'Payment failed. Please try again.';
        echo $orderStatus;
    }
 

} catch (Exception $e) {
    $errorMessage = 'Payment error: ' . $e->getMessage();
}


?>