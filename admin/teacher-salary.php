<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->

<?php 
    // Check if the form for saving data is submitted
   /* if (isset($_POST['btn_save'])) {
        $teacher_id = $_POST["teacher_id"];
        $basic_salary = $_POST["basic_salary"];
        $medical_allowance = $_POST["medical_allowance"];
        $hr_allowance = $_POST["hr_allowance"];
        $scale = $_POST["scale"];
        
        // Check if record already exists for the given teacher ID
        $check_query = "SELECT * FROM teacher_salary_allowances WHERE teacher_id = '$teacher_id'";
        $check_result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            // If record exists, update the existing record
            $update_query = "UPDATE teacher_salary_allowances SET basic_salary = '$basic_salary', medical_allowance = '$medical_allowance', hr_allowance = '$hr_allowance', scale = '$scale' WHERE teacher_id = '$teacher_id'";
            $update_result = mysqli_query($con, $update_query);
            if ($update_result) {
                echo "Record for this teacher already exists. Record has been updated.";
            } else {
                echo "Failed to update record.";
            }
        } else {
            // If record doesn't exist, insert a new record
            $insert_query = "INSERT INTO teacher_salary_allowances (teacher_id, basic_salary, medical_allowance, hr_allowance, scale) VALUES ('$teacher_id', '$basic_salary', '$medical_allowance', '$hr_allowance', '$scale')";
            $insert_result = mysqli_query($con, $insert_query);
            if ($insert_result) {
                echo "Your Data has been submitted";
            } else {
                echo "Your Data has not been submitted";
            }
        }
    }

    // Check if the form for submitting salary is submitted
    if (isset($_POST['btn_sub'])) {
        $teacher_id = $_POST["teacher_id"];

        // Check if record exists for the given teacher ID
        $check_query = "SELECT * FROM teacher_salary_allowances WHERE teacher_id = '$teacher_id'";
        $check_result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_result) == 0) {
            echo "Record for this teacher does not exist. Salary cannot be paid.";
        } else {
            // Insert salary report
            $insert_query = "INSERT INTO teacher_salary_report (teacher_id, total_amount, status) SELECT teacher_id, (basic_salary + (basic_salary * medical_allowance / 100) + (basic_salary * hr_allowance / 100)), 'Paid' FROM teacher_salary_allowances WHERE teacher_id = '$teacher_id'";
            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) { ?>
                <script type="text/javascript">
                    alert("Salary has been paid to ID: <?php echo $teacher_id; ?>");
                </script>
            <?php } else { ?>
                <script type="text/javascript">
                    alert("Salary has not been paid due to some errors");
                </script>
            <?php }
        }
    }
	*/

	// Check if the form for submitting salary is submitted
if (isset($_POST['btn_sub'])) {
    $teacher_id = $_POST["teacher_id"];

    // Check if record exists for the given teacher ID
    $check_query = "SELECT * FROM teacher_salary_allowances WHERE teacher_id = '$teacher_id'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) == 0) {
        echo "Record for this teacher does not exist. Salary cannot be paid.";
    } else {
        // Check if salary has already been paid for the given teacher ID
        $check_paid_query = "SELECT * FROM teacher_salary_report WHERE teacher_id = '$teacher_id'";
        $check_paid_result = mysqli_query($con, $check_paid_query);
        if (mysqli_num_rows($check_paid_result) > 0) {
            ?>
            <script type="text/javascript">
                alert("Salary for this ID has already been paid.");
            </script>
            <?php
        } else {
            // Insert salary report
            $insert_query = "INSERT INTO teacher_salary_report (teacher_id, total_amount, status) SELECT teacher_id, (basic_salary + (basic_salary * medical_allowance / 100) + (basic_salary * hr_allowance / 100)), 'Paid' FROM teacher_salary_allowances WHERE teacher_id = '$teacher_id'";
            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) { ?>
                <script type="text/javascript">
                    alert("Salary has been paid to ID: <?php echo $teacher_id; ?>");
                </script>
            <?php } else { ?>
                <script type="text/javascript">
                    alert("Salary has not been paid due to some errors");
                </script>
            <?php }
        }
    }
}

?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Teacher Salary</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Teacher Salary Management System </h4>
						<button type="button" class="btn btn-primary ml-5 mr-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Salary Scale</button>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".add_salary">Add Salary</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class=" mt-3">
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Add Salary</h4>
													</div>
													<div class="modal-body">
														<form action="teacher-salary.php" method="post">
															<div class="row mt-3">
																<div class="col-md-6 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Teacher I'd: </label>
																		<input type="text" name="teacher_id" class="form-control" placeholder="Enter Teacher Id">
																	</div>
																</div>
																<div class="col-md-6 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Basic Salary:</label>
																		<input type="text" name="basic_salary" class="form-control" placeholder="Enter Basic Salary">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Medical Allowance: </label>
																		<input type="text" name="medical_allowance" class="form-control" placeholder="Enter Medical Allowance">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputEmail1">House Rent Allowance: </label>
																		<input type="text" name="hr_allowance" class="form-control" placeholder="Enter HR Allowance">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputEmail1">Paid Scale: </label>
																		<input type="text" name="scale" class="form-control"placeholder="Enter Paid Scale">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade add_salary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Add Salary</h4>
													</div>
													<div class="modal-body">
														<form action="teacher-salary.php" method="post">
															<div class="row mt-3">
																<div class="col-md-12 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Teacher I'd: </label>
																		<input type="text" name="teacher_id" class="form-control" placeholder="Enter Teacher Id">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_sub" value="Save Data">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="w-100 table-elements table-three-tr" cellpadding="3">
										<tr class="table-tr-head table-three text-white">
											<td colspan="9" class=" text-center text-white"><h4>All Teachers Salary Report</h4></td>
										</tr>
										<tr class="table-tr-head">
											<th>Salary Voucher</th>
											<th>I'd</th>
											<th>Name</th>
											<th>Basic Salary</th>
											<th>Medical Allowance</th>
											<th>HR Allowance</th>
											<th>Pay Scale</th>
											<th>Paid Date</th>
											<th>Total Amount</th>
										</tr>
										<?php  
											$query="select tsr.teacher_id,ti.first_name,middle_name,last_name,salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from teacher_salary_allowances tsa inner join teacher_salary_report tsr on tsa.teacher_id=tsr.teacher_id inner join teacher_info ti on ti.teacher_id=tsr.teacher_id";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
													<td><?php echo $row['salary_id'] ?></td>
													<td><?php echo $row['teacher_id'] ?></td>
													<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
													<td><?php echo $row['basic_salary'] ?></td>
													<td><?php echo ($row['basic_salary']*$row['medical_allowance']/100) ?></td>
													<td><?php echo ($row['basic_salary']*$row['hr_allowance']/100) ?></td>
													<td><?php echo $row['scale'] ?></td>
													<td><?php echo $row['paid_date'] ?></td>
													<td><?php echo $row['total_amount'] ?></td>
												</tr>		
											<?php
											}
										?>
									</table>
								</div>
							</div>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>