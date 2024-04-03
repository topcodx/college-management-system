<?php
session_start();

require './config.php';
require '../../vendor/autoload.php';

use Razorpay\Api\Api;

if(!empty($_POST)){

    $orderId = $_SESSION['order_id'];

    // Response from the razorpay
    $razorpayOrderId = $_POST['razorpay_order_id'];
    $razorpaySignature = $_POST['razorpay_signature'];
    $razorpayPaymentId = $_POST['razorpay_payment_id'];

    // Generate server side signature
    $generatedSignature = hash_hmac('sha256',$orderId . "|" . $razorpayPaymentId, API_SECRET);

    if($generatedSignature == $razorpaySignature){
        echo "Payment is successful";
    }else{
        echo "Invalid payment";
    }
}