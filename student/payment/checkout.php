<?php
session_start();

require './config.php';
require '../../vendor/autoload.php';

use Razorpay\Api\Api;

if(!empty($_POST['amount'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'] * 100;
    $api = new Api(API_KEY, API_SECRET);

    $res = $api->order->create([
        'receipt' => '123',
        'amount' => $amount,
        'currency' => 'INR',
    ]);

    if(!empty($res['id'])){
        $_SESSION['order_id'] = $res['id'];
    ?>
        <form action="./success.php" method="post">
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo API_KEY; ?>"
                data-amount="<?php echo $amount; ?>"
                data-currency="INR"
                data-order_id="<?php echo $res['id']; ?>"
                data-buttontext="Pay <?php echo $amount/100; ?> with Razorpay"
                data-name="<?php echo COMPANY_NAME; ?>"
                data-description="Company Description"
                data-image="<?php echo COMPANY_LOGO_URL; ?>"
                data-prefill.name="<?php echo $name; ?>"
                data-prefill.email="<?php echo $email; ?>"
            >
            </script>
        </form>
    <?php
    }
}