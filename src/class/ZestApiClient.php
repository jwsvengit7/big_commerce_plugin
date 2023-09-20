<?php

namespace src\class;

class ZestApiClient {
    private $zestApiKey;
    private $zestApiSecret;

    public function __construct($zestApiKey, $zestApiSecret) {
        $this->zestApiSecret = $zestApiSecret;
        $this->zestApiKey = $zestApiKey;
    }

    public function setApiKey($zestApiKey) {
        $this->zestApiKey = $zestApiKey;
    }

    public function createPaymentToken($orderId, $amount, $customer_name) {
        $url = "https://api.dev.gateway.zestpayment.com/payment-engine/api/v1/web-engine/process/transaction-initialization";

        $data = [
            'email' => $customer_name,
            'amount' => $amount,
            'currency' => 'NGN'
        ];

        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Accept: application/json",
                "Api-Public-Key: " . $this->zestApiKey,
                "Content-Length: " . strlen(json_encode($data)) 
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                throw new \Exception(curl_error($ch));
            }

            curl_close($ch);

            return $response;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function initializePayment($url) {
        

    }

}
?>
