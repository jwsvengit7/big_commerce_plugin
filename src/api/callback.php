<?php

require '../../vendor/autoload.php'; 

use \Firebase\JWT\JWT;
use src\class\ZestApiClient;
use src\class\BigCommerceApiClient;
use src\config\Config;
use GuzzleHttp\Client;

$config = new Config();
$paymentSecrete = $config->getKey();
$clientId = $config->commerce_client_id();
$bigCommerceAccessToken =$config->bicommerce_client_secret();
$clientSecret = $config->getAccessToken();


$redirectUri = 'http://localhost/plugin/big_commerce_plugin/src/api/api.php?code='.$clientSecret;
$tokenEndpoint = 'https://login.bigcommerce.com/oauth2/token';
$client = new Client();


if (isset($_GET['code'])) {
    $code = $_GET['code'];
    echo $code;


    $response = $client->post($tokenEndpoint, [
        'form_params' => [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectUri,
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    if (isset($data['access_token'])) {
        $accessToken = $data['access_token'];
        echo "Access Token: $accessToken";
    } else {
        echo 'Access Token not received. Handle the error.';
    }
} else {
    echo 'Authorization code not found. Handle the error.';
}

$jwtSecret = '404E635266556A586E3272357538782F413F4428472B4B6250645367566B5970';

$signedJwt = $_GET['signed_payload_jwt'];

try {
    $decodedJwt = JWT::decode($signedJwt, $jwtSecret, ['HS256']);
} catch (Exception $e) {

    http_response_code(401); 
    echo 'JWT verification failed';
    exit;
}

$userId = $decodedJwt->user->id;
$storeId = $decodedJwt->context->store_id;
echo $userId;

?>
