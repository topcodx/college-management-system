<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!$_SESSION["LoginStudent"]) {
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
// Process payment completion
if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['voucher'])) {
    $payment_id = $_POST['razorpay_payment_id'];
    $voucher = $_POST['voucher'];

    // Update payment status and paid at timestamp in the database
    $update_query = "UPDATE student_fee SET status = 'Paid', paid_at = NOW() WHERE fee_voucher = '$voucher'";
    $result = mysqli_query($con, $update_query);
    if ($result) {
        echo "Payment successful!"; // Debugging message
        echo date('Y-m-d H:i:s'); // Debugging message
        exit; // Exit to prevent further output
    } else {
        http_response_code(500); // Internal server error
        exit("Error updating database: " . mysqli_error($con)); // Debugging message
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Fees</title>
    <link rel="shortcut icon" href="<?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">
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

            <div class="row">
                <div class="col-md-12">
                    <section class="border mt-3">
                        <table class="w-100 table-striped table-hover table-dark" cellpadding="10">
                            <tr>
                                <th colspan="9">
                                    <h4 class="text-center">Student Fee Detail</h4>
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
                                $query="select fee_voucher,student_fee.roll_no,first_name,middle_name,last_name,course_code,amount,date(posting_date) as posting_date,status,paid_at from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
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
                                        <td>
                                            <?php if($row['status'] == 'Unpaid') { ?>
                                                <a href="javascript:void(0);" type="button" class="btn btn-primary pay_now"
                                                    data-amount="<?php echo ($row['amount'] * 100); ?>"
                                                    data-voucher="<?php echo $row['fee_voucher']; ?>"
                                                    data-user-name="<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?>"
                                                >Pay</a>
                                            <?php } else {
                                                echo date('Y-m-d H:i:s', strtotime($row['paid_at']));
                                            } ?>
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
            let voucher = $(this).data('voucher');

            // Create Razorpay options
            var options = {
                key: '<?php echo API_KEY; ?>',
                amount: amount,
                currency: 'INR',
                name: '<?php echo COMPANY_NAME; ?>',
                description: 'College Management System',
                image: '<?php echo COMPANY_LOGO_URL; ?>',
                prefill: {
                    name: userName
                },
                handler: function(response) {
                    var payment_id = response.razorpay_payment_id;
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $_SERVER['PHP_SELF']; ?>',
                        data: { razorpay_payment_id: payment_id, voucher: voucher },
                        success: function(response) {
                            // Update table on success
                            $('.pay_now[data-voucher="' + voucher + '"]').closest('tr').find('td:last').html(response);
                            $('.pay_now[data-voucher="' + voucher + '"]').addClass('hidden');
                            alert('Payment successful!');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred while processing your payment.');
                        }
                    });
                }
            };

            // Open Razorpay payment popup
            var rzp = new Razorpay(options);
            rzp.open();
        });
    </script>
</body>

</html>
