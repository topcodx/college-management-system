<?php  
	session_start(); // Session already started, so no need to call it again
    
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	require_once "/connection/connection.php";

	// Include helper.php file
	require_once "C:\wamp64\www\college-management-system\common\helper.php";
	$universityLogo = getUniversityLogo('University_logo');

	// Fetch payment amount from the database
	$roll_no = $_SESSION['LoginStudent']; // Assuming this holds the user's roll number
    $query = "SELECT amount FROM student_fee WHERE roll_no = '$roll_no' ORDER BY posting_date DESC LIMIT 1"; // Assuming the amount is stored in the student_fee table
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$paymentAmount = $row['amount'];
?>

<?php
require './config.php';
require '../../vendor/autoload.php';

use Razorpay\Api\Api;

// Check if form is submitted
if (!empty($_POST['amount'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'] * 100;
    $api = new Api(API_KEY, API_SECRET);

    // Create a Razorpay order
    $res = $api->order->create([
        'receipt' => '123',
        'amount' => $amount,
        'currency' => 'INR',
    ]);

    // If order creation is successful
    if (!empty($res['id'])) {
        $_SESSION['order_id'] = $res['id'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Dashboard</title>
    <link rel="shortcut icon" href="<?php echo $universityLogo != null ? $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">
</head>

<body>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <!-- Other content here -->

            <div class="d-flex justify-content-end">
                <!-- Payment form -->
                
                <?php if (!empty($paymentAmount)) : ?>
                    <form action="index.php" method="post">
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="<?php echo API_KEY; ?>"
                            data-amount="<?php echo $paymentAmount * 100; ?>"
                            data-currency="INR"
                            data-buttontext="Pay <?php echo $paymentAmount; ?>"
                            data-name="<?php echo COMPANY_NAME; ?>"
                            data-description="Company Description"
                            data-image="<?php echo COMPANY_LOGO_URL; ?>"
                            data-prefill.name="<?php echo $name; ?>"
                            data-prefill.email="<?php echo $email; ?>">
                        </script>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Other content here -->
        </div>
    </main>

    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>