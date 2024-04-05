<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
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
	<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

		<title>Admin - Student Fee</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Student Fee Management System </h4>
				</div>
				<?php
if (isset($_POST['sub'])) {
 	$roll_no=$_POST['roll_no'];
 	$amount=$_POST['amount'];
 	$status=$_POST['status'];
		$que="insert into student_fee(roll_no,amount,status)values('$roll_no','$amount','$status')";
		$run=mysqli_query($con,$que);
		if ($run) {  
            echo "<div class='alert alert-success' role='alert'> Data send successfully</div>";
        } else { 
            echo "<div class='alert alert-danger' role='alert'>data not send. Please try again.</div>";
        }
	}

?>

				<div class="row">
					<div class="col-md-12">
						<form action="student-fee.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Roll No:</label>
										<div class="d-flex">
											<input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No">
											<input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Press">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr No.</th>
									<th>Roll No.</th>
									<th>Student Name</th>
									<th>Program</th>
									<th>Amount (Rs.)</th>
									<th>Status</th>
										


								</tr>
								<?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];


										$que="select roll_no,first_name,middle_name,last_name,course_code from student_info where roll_no='$roll_no' ";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
									?>
										<form action="student-fee.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?> >
											<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<td><?php echo $row['course_code'] ?></td>
											<td><input type="text" name="amount" class="form-control" placeholder="Enter Amount for fee"></td>
											<input type="hidden" name="status" value="Paid">
											<td>
                                        <select name="status" class="form-control">
                                            <option value="Paid">Paid</option>
                                            <option value="Unpaid">Unpaid</option>
                                        </select>
                                    </td>											

										</tr>
										
								<?php		
									}
									}
								?>
									<div class="d-flex justify-content-end">
    <input type="submit" name="sub" class="btn btn-success px-4 ml-4 mr-2 mb-2 mt-2">
</div>

								</form>
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

