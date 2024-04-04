<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header {
        display: flex;
        justify-content: left;
        align-items: center;
        height: 70px;
        background-color: #5e0209;
    }

    .flex {
        display: flex;
        align-items: center;
    }

    a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size:30px;
        margin-left:10px;
    }

    a:hover {
        color:white;
    }

    .header img {
        margin-top:700px;
        height:600px;
}
    </style>
</head>
<body>
<div class="header">
        <div class="flex">
            <a href="../student-fee.php">Back</a>
    <img src="https://s31898.pcdn.co/wp-content/uploads/2022/07/upi-image-2-800x430.jpg">

        </div>
    </div>
    
</body>
</html>
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