<?php
namespace src\config;
require_once '../../vendor/autoload.php';
use Dotenv\Dotenv;

class Config{

private $dotenv;
function __construct(){
    $this->dotenv = Dotenv::createImmutable(__DIR__.'/../../');

}

public function getKey() {
    $this->dotenv->load(); 
    return  $_ENV['API_KEY'];
}
public function bicommerce_client_secret() {
    $this->dotenv->load(); 
    return $_ENV['BIG_COMMERCE_CLIENT_SECRET'];
   
}
public function getAccessToken() {
    $this->dotenv->load(); 
    return$_ENV['BIG_COMMERCE_ACCESSTOKEN'];
    
}
public function commerce_client_id() {
    $this->dotenv->load(); 
    return $_ENV['BIG_COMMERCE_API_CLIENTID'];
    
}
}


?>