<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";

		// Include helper.php file
		require_once "../common/helper.php";
		$universityLogo = getUniversityLogo('University_logo');
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>"
        type="image/x-icon">

    <title>Student - Fees</title>

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
                                <th>paid_at</th>
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
                                    <a href="payment/index.php" class="btn btn-primary">Pay Now</a>
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

    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Check if payment is successful and update the payment status
if (!empty($_SESSION['order_id'])) {
    // Assuming '123' is the receipt ID generated earlier
    $orderId = $_SESSION['order_id'];

    // Your logic to update the payment status to 'Paid' and add the paid timestamp
    // Example SQL query to update the status
    // UPDATE student_fee SET status = 'Paid', paid_at = NOW() WHERE receipt_id = '123';

    // After updating the status, unset the order ID session variable
    unset($_SESSION['order_id']);

    // Set a session variable to display a success message after redirecting back to this page
    $_SESSION['payment_success'] = true;

    // Redirect back to this page after payment success
    header('Location: student-fee.php');
    exit;
}
?>