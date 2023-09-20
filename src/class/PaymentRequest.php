<?php
namespace src\class;
class PaymentRequest{
    private $amount;
    private $email;
    public function __construct($email, $amount) {
        $this->email = $email;
        $this->amount = $amount;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function setAmount($amount) {
        $this->amount = $amount;
    }


}