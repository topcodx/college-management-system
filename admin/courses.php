<!---------------- Session starts from here ----------------------->
<?php  
	session_start();
	if (!isset($_SESSION["LoginAdmin"]) || !$_SESSION["LoginAdmin"]) {
		header('location:../login/login.php');
		exit(); // Terminate script execution after redirection
	}
	require_once "../connection/connection.php";

	 // Include helper.php file
	 require_once "../common/helper.php";
	 $universityLogo = getUniversityLogo('University_logo');
?>
<!---------------- Session ends here ------------------------>

<!-- --------------------------------add courses------------------------------------- -->
<?php  
	if (isset($_POST['sub'])) {
		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$semester_or_year = $_POST['semester_or_year'];
		$no_of_year = $_POST['no_of_year'];

		$query = "INSERT INTO courses (course_code, course_name, semester_or_year, no_of_year) VALUES ('$course_code', '$course_name', '$semester_or_year', '$no_of_year')";
		$run = mysqli_query($con, $query);
		if ($run) {
			echo "<div class='alert alert-success' role='alert'>Course added successfullydiv>";
		} else { 
			echo "<div class='alert alert-danger' role='alert'>Failed to add course.</div>";
		}
	}
?>

<!-- --------------------------------PHP code for updating course------------------------------------- -->
<?php  
	// Function to update course details
	function updateCourse($con, $course_code, $course_name, $semester_or_year, $no_of_year) {
		$query = "UPDATE courses SET course_name=?, semester_or_year=?, no_of_year=? WHERE course_code=?";
		$stmt = mysqli_prepare($con, $query);
		mysqli_stmt_bind_param($stmt, "ssis", $course_name, $semester_or_year, $no_of_year, $course_code);
		$result = mysqli_stmt_execute($stmt);
		return $result;
	}

	// Check if the form is submitted for updating course
	if (isset($_POST['update'])) {
		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$semester_or_year = $_POST['semester_or_year'];
		$no_of_year = $_POST['no_of_year'];


		if (updateCourse($con, $course_code, $course_name, $semester_or_year, $no_of_year)) {
			echo "<div class='alert alert-success' role='alert'>Course updated successfully </div>";
		} else { 
			echo "<div class='alert alert-danger' role='alert'>Failed to update course</div>";
		}
	}
?>
<!-- --------------------------------End PHP------------------------------------- -->

<!doctype html>
<html lang="en">
<head>
<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

	<title>Admin - Courses</title>
</head>
<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Course Management System</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form action="courses.php" method="post">
						<div class="row mt-3">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Course Code:</label>
									<input type="text" name="course_code" class="form-control" required placeholder="Enter Course Code">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Course Name:</label>
									<input type="text" name="course_name" class="form-control" required placeholder="Enter Course Name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Semester Or Years:</label>
									<input type="text" name="semester_or_year" class="form-control" required placeholder="Enter Semester Or Years">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">No of Years:</label>
									<input type="text" name="no_of_year" class="form-control" required placeholder="Enter No of Years">
								</div>
							</div>
						</div>
						<div class="row w-100">
							<div class="col-md-12">
								<input type="submit" name="sub" value="Add Course" class="btn btn-primary ml-auto">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 ml-2">
					<section class="mt-3">
						<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="3">
							<tr class="table-tr-head table-three text-white">
								<th>Sr.No</th>
								<th>Course Code</th>
								<th>Cource Name</th>
								<th>Semester/Years</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							<?php
								$sr = 1;
								$query = "SELECT course_code, course_name, semester_or_year, no_of_year FROM courses";
								$run = mysqli_query($con, $query);
								while ($row = mysqli_fetch_array($run)) {
									echo "<tr>";
									echo "<td>".$sr++."</td>";
									echo "<td>".$row['course_code']."</td>";
									echo "<td>".$row['course_name']."</td>";
									echo "<td>".$row['semester_or_year']."</td>";
									echo "<td width='20'>
											<form action='update-course.php' method='post'>
												<input type='hidden' name='course_code' value='".$row['course_code']."'>
												<input type='hidden' name='course_name' value='".$row['course_name']."'>
												<input type='hidden' name='semester_or_year' value='".$row['semester_or_year']."'>
												<input type='hidden' name='no_of_year' value='".$row['no_of_year']."'>
												<button type='submit' name='update' class='btn btn-success'>Update</button>
											</form>
										</td>";
									echo "<td width='20'><a class='btn btn-danger' href='delete-function.php?course_code=".$row['course_code']."'>Delete</a></td>";
									echo "</tr>";
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
