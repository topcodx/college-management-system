<?php
include('common/header.php');
require_once "connection/connection.php";

// Check if the form has been submitted
if(isset($_POST['btn_save'])) {
	
	$first_name=$_POST["first_name"];
	$middle_name=$_POST["middle_name"];
	$last_name=$_POST["last_name"];
	$email=$_POST["email"];
	$mobile_no=$_POST["mobile_no"];
	$course_code=$_POST['course_code'];
	$session=$_POST['session'];
	$profile_image = $_FILES['profile_image']['name'];
	$tmp_name=$_FILES['profile_image']['tmp_name'];
	$path = "images/".$profile_image;
	move_uploaded_file($tmp_name, $path);
	$application_status=$_POST["application_status"];
	$cnic=$_POST["cnic"];
	$dob=$_POST["dob"];
	$gender=$_POST["gender"];
	$current_address=$_POST["current_address"];
	$matric_complition_date=$_POST["matric_complition_date"];
	$matric_certificate = $_FILES['matric_certificate']['name'];
	$tmp_name=$_FILES['matric_certificate']['tmp_name'];
	$path = "images/".$matric_certificate;
	move_uploaded_file($tmp_name, $path);
	$fa_complition_date=$_POST["fa_complition_date"];
	$fa_certificate = $_FILES['fa_certificate']['name'];
	$tmp_name=$_FILES['fa_certificate']['tmp_name'];
	$path = "images/".$fa_certificate;
	move_uploaded_file($tmp_name, $path);

	$randDom = rand();
    $query = "INSERT INTO student_info (roll_no, first_name, middle_name, last_name, email, mobile_no, course_code, session, profile_image, application_status, cnic, dob, gender,current_address, matric_complition_date, matric_certificate, fa_complition_date, fa_certificate) 
    VALUES ('$randDom', '$first_name', '$middle_name', '$last_name', '$email', '$mobile_no', '$course_code', '$session', '$profile_image', '$application_status', '$cnic', '$dob', '$gender', '$current_address', '$matric_complition_date', '$matric_certificate', '$fa_complition_date', '$fa_certificate')";
    
    $run = mysqli_query($con, $query);

    // Prepare and execute the query for inserting login information
    $password = mysqli_real_escape_string($con, $_POST['password']); // Assuming you have a password field in your form
    $role = mysqli_real_escape_string($con, $_POST['role']); // Assuming you have a role field in your form

    $query2 = "INSERT INTO login (user_id, Password, Role, account) VALUES ('$randDom', '$password', '$role', 'Deactive')";
    $run2 = mysqli_query($con, $query2);

	if ($run && $run2) {
		// Fetch and display user_id and password
		$query3 = "SELECT user_id, Password FROM login WHERE user_id = '$randDom'";
		$result = mysqli_query($con, $query3);
		$row = mysqli_fetch_assoc($result);
		if ($row) {
			$user_id = $row['user_id'];
			$password = $row['Password'];
			echo '<div style = "background-color:#5e020af5;color:white;display:flex;justify-content:center;margin:50px;">';
			echo "<b>User ID: $user_id </b>";
			echo ' ';
			echo "<b>Password: $password</b>";
			echo '</div>';
		}
	} else {
		echo '<script>alert("Your Data has not been submitted.");</script>';
	}
}
?>

	<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Online Addmission Form</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-md-12">
				<form action="" method="POST" enctype="multipart/form-data">
				<!-- <form action="./login/login.php" method="POST" enctype="multipart/form-data"> -->
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Applicant First Name:*</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Middle Name:</label>
								<input type="text" name="middle_name" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Applicant Last Name:*</label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Email:*</label>
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="number" name="mobile_no" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Course which you want?: </label>
								<select class="browser-default custom-select" name="course_code">
									<option >Select Course</option>
									<?php
										$query="select course_code from courses";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Select Session:</label>
								<select class="browser-default custom-select" name="session">
									<option >Select Session</option>
									<?php
										$query="select session from sessions";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['session'].">".$row['session']."</option>";
										}
									?>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Your Profile Image:</label>
								<input type="file" name="profile_image" placeholder="Student Age" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">application Status: </label>
								<select class="browser-default custom-select" name="application_status">
									<option>Select Option</option>
									<option value="Admitted">Admitted</option>
									<option value="Not Admitted">Not Admitted</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">CNIC No:</label>
								<input type="text" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Date of Birth: </label>
								<input type="date" name="dob" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Current Address:</label>
								<input type="text" name="current_address" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
								<select class="browser-default custom-select" name="gender">
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Matric/OLevel Complition Date: </label>
								<input type="date" name="matric_complition_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload Matric/OLevel Certificate:</label>
								<input type="file" name="matric_certificate" class="form-control" value="there is no image">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">FA/ALevel Complition Date: </label>
								<input type="date" name="fa_complition_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
								<input type="file" name="fa_certificate" class="form-control" value="there is no image" >
							</div>
						</div>
					</div>	
					<!-- _________________________________________________________________________________
														Hidden Values are here
					_________________________________________________________________________________ -->
					<div>
						<input type="hidden" name="password" value="student123*">
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are end here
					_________________________________________________________________________________ -->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary px-5" name="btn_save" value="Submit">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 w-100 p-5">
				<h4 class="bg-secondary p-3 text-center text-white">Undertaking</h4>
				<h5>Candidates awaiting results are required to sign the following undertaking:</h5>
				<p class="tet-justify">
					I solemnly declare that I have submitted the application with the consent of my father / guardian. I pledge to abide by the Rules and Regulations of the VMJ Lahore and shall not take part in political activities of any kind. If I do so the VMJ Administration will have the right to strike my name off the VMJ Rolls. I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time. I understand that if my class attendance percentage is not up to the required standard of the VMJ, I will not be eligible to sit in the final examinations. I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the VMJ Administration shall be rightful to cancel my admission and to take necessary action against me.
					I solemnly declare that I have submitted the application with the consent of my father / guardian. I pledge to abide by the Rules and Regulations of the VMJ Lahore and shall not take part in political activities of any kind. If I do so the VMJ Administration will have the right to strike my name off the VMJ Rolls. I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time. I understand that if my class attendance percentage is not up to the required standard of the VMJ, I will not be eligible to sit in the final examinations. I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the VMJ Administration shall be rightful to cancel my admission and to take necessary action against me..
				</p>
			</div>
		</div>	
	</div>
</body>
</html>