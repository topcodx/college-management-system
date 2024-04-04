<!---------------- Session starts form here ----------------------->
<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";

		// Include helper.php file
		require_once "../common/helper.php";
		$universityLogo = getUniversityLogo('University_logo');

require '../student/payment/config.php';
require '../vendor/autoload.php';

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
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>"
        type="image/x-icon">

    <title>Student - Fees</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main ">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4 class="">Student Fee Summary</h4>
            </div>

            <div class="d-flex justify-content-end">
                <a href="payment/index.php" type="button" class="btn btn-primary">PAY NOW</a>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <section class="border mt-3">
                        <table class="w-100 table-striped table-hover table-dark" cellpadding="10">
                            <tr>
                                <th colspan="9">
                                    <h4 class="text-center">Student Fee Detail</h4 class="text-center">
                                </th>
                            </tr>
                            <tr>
                                <th>Voucher No.</th>
                                <th>Roll No.</th>
                                <th>Student Name</th>
                                <th>Program</th>
                                <th>Amount (Rs.)</th>
                                <th>Posting Date</th>
                                <th>Status</th>
                                <th>Paid At</th>
                            </tr>
                            <?php 
								$roll_no=$_SESSION['LoginStudent'];
									$query="select fee_voucher,student_fee.roll_no,first_name,middle_name,last_name,course_code,amount,date(posting_date) as posting_date,status from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
									$run=mysqli_query($con,$query);
									while ($row=mysqli_fetch_array($run)) { ?>
                            <tr>
                                <td><?php echo $row['fee_voucher'] ?></td>
                                <td><?php echo $row['roll_no'] ?></td>
                                <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
                                <td><?php echo $row['course_code'] ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo date($row['posting_date']) ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <?php if($row['status'] == 'Unpaid') { ?>
                                <td>
                                    <a href="javascript:void(0);" type="button" class="btn btn-primary pay_now"
                                            data-amount="<?php echo ($row['amount'] * 100); ?>"
                                            data-user-name="<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?>"
                                    >Pay</a>

                                    <?php } else { ?>
                                    <?php echo date('Y-m-d H:i:s', strtotime($row['time_of_payment'])); ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php	
									}
								?>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </main>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).on('click', '.pay_now', function(){

            let userName = $(this).data('user-name');
            let amount = $(this).data('amount');


            // Create Razorpay options
            var options = {
                key: '<?php echo API_KEY; ?>',
                amount: amount,
                currency: 'INR',
                name: '<?php echo COMPANY_NAME; ?>',
                description: 'Colleage Management System',
                image: '<?php echo COMPANY_LOGO_URL; ?>',
                prefill: {
                    name: userName
                },
                handler: function(response) {
                    // Handle payment success
                    alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
                    // You can also redirect or perform other actions here
                }
            };

            // Open Razorpay payment popup
            var rzp = new Razorpay(options);
            rzp.open();
        });
    </script>
</body>

</html>