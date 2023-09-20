<?php
require '../../vendor/autoload.php'; 
use src\config\Config;

$config = new Config();
$clientId = $config->commerce_client_id();
$scopes = 'store_v2_orders';

$redirectUri = 'http://localhost/plugin/big_commerce_plugin/src/api/load.php'; 

$oauthUrl = "https://login.bigcommerce.com/oauth2/authorize?client_id={$clientId}&scope={$scopes}&redirect_uri={$redirectUri}&response_type=code";

echo $oauthUrl;
header("Location: $oauthUrl");
exit;
?>
