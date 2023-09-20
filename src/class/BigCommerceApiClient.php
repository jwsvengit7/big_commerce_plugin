<?php
namespace src\class;

class BigCommerceApiClient {
    private $bigCommerceClientId;
    private $bigCommerceAccessToken;

    function __construct($bigCommerceAccessToken,$bigCommerceClientId){
        $this->bigCommerceAccessToken=$bigCommerceAccessToken;
        $this->bigCommerceClientId=$bigCommerceClientId;
    }

}

?>