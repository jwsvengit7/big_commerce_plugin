<?php
// if (isset($_POST['sub'])) {
//     $orderId = $_POST['order_id'];
//     $amount = $_POST['amount'];
//     $customerName = $_POST['customer_name'];
  
//     try {
//         $paymentToken = $zestClient->createPaymentToken($orderId, $amount, $customerName);
     
//         echo $paymentToken;
//         $responseData = json_decode($paymentToken, true);

// if ($responseData !== null) {
//     $status = $responseData['status'];
//     $message = $responseData['message'];
//     $data = $responseData['data'];
//     $authorizationUrl = $data['paymentURL'];
//     $reference = $data['reference'];
//     $initUrl="https://api.dev.gateway.zestpayment.com/payment-engine/transaction-verification";
//     echo $paymentToken;
//     $n =$zestClient->initializePayment($initUrl);
//     exit;
// }
//     } catch (Exception $e) {
//         echo 'Error: ' . $e->getMessage();
//     }
// }


// if (isset($_GET['payment_id']) && isset($_GET['status'])) {
//     $paymentId = $_GET['payment_id'];
//     $status = $_GET['status'];


//     try {
//         $paymentStatus = $zestClient->verifyPaymentStatus($paymentId, $status);
//         if ($paymentStatus === 'approved') {
       
//             $orderId = $_GET['order_id'];
//             $bigCommerceClient->markOrderAsPaid($orderId);
//             echo 'Payment successfully processed!';
//         } else {
//             echo 'Payment failed or was not approved.';
//         }
//     } catch (Exception $e) {
//         echo 'Error: ' . $e->getMessage();
//     }
// }

?>