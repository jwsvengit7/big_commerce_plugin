<?php


require_once('../../vendor/autoload.php');
use src\class\ZestApiClient;
use src\class\BigCommerceApiClient;
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



$bigCommerceClient = new BigCommerceApiClient($bigCommerceClientId, $bigCommerceAccessToken);
$bigCommerceClient->acceptPayment();






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
   
</head>
<body>


<style>

    /* Reset some default styles */
body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

/* Apply some basic styling to the page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    text-align: left;
    height:400px;
    
}
form input{
    width:350px;
    height:40px;
    border:1px solid #ccc;
    border-radius:5px

}

.form-group {
    margin-bottom: 15px;
    width:100%;
    
}

label {
    display: block;
    font-weight: bold;
}



button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}


</style>
    <div class="container">
       
        <form id="paymentForm">
        <h1>Checkout</h1>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email-address" required />
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" required />
            </div>
            <div class="form-submit">
                <button type="submit">Pay</button>
            </div>
        </form>
    </div>

    <script src="https://sdk.dev.gateway.zestpayment.com/paymentgatewaysdk/omni-payment-gateway-sdk.js"></script>
 
    <script src="js/payment.js"> </script>


 
</body>
</html>

