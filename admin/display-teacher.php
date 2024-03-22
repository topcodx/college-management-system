<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ ?>
		<script> alert("Your Are Not Autorize Person For This link");</script>
	<?php
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

		<title>Admin - Teacher Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container mt-1 border border-secondary mb-1">
    <div class="row text-white bg-primary pt-5">
        <div class="col-md-4">
            <?php $profile_image = $row["profile_image"]; ?>
            <img class="ml-5 mb-5" height='270px' width='250px' src="<?php echo "images/$profile_image"; ?>">
        </div>
        <div class="col-md-8">
            <h3 class="ml-5"><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?></h3><br>
            <div class="row">
                <div class="col-md-6">
                    <h5>Email:</h5> <?php echo !empty($row['email']) ? $row['email'] : 'N/A'; ?><br><br>
                    <h5>Contact:</h5> <?php echo !empty($row['phone_no']) ? $row['phone_no'] : 'N/A'; ?><br><br>
                </div>
                <div class="col-md-6">
                    <h5>CNIC:</h5> <?php echo !empty($row['cnic']) ? $row['cnic'] : 'N/A'; ?><br><br>
                    <h5>Teacher I'd:</h5> <?php echo !empty($row['teacher_id']) ? $row['teacher_id'] : 'N/A'; ?><br><br>
                </div>		
            </div>
        </div>
        <hr>
    </div>
    <div class="row pt-3">
        <div class="col-md-4"><h5>Status:</h5> <?php echo !empty($row['teacher_status']) ? $row['teacher_status'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>Gender:</h5> <?php echo !empty($row['gender']) ? $row['gender'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>Date of Birth:</h5> <?php echo !empty($row['dob']) ? $row['dob'] : 'N/A'; ?></div>
    </div>
    <div class="row pt-3">
        <div class="col-md-4"><h5>Phone No:</h5> <?php echo !empty($row['other_phone']) ? $row['other_phone'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>Last Qualification:</h5> <?php echo !empty($row['last_qualification']) ? $row['last_qualification'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>Current Address:</h5> <?php echo !empty($row['current_address']) ? $row['current_address'] : 'N/A'; ?></div>
    </div>
    <div class="row pt-3">
        <div class="col-md-4"><h5>BA Completion Date:</h5> <?php echo !empty($row['ba_completion_date']) ? $row['ba_completion_date'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>BA Certificate:</h5> <?php echo !empty($row['ba_certificate']) ? $row['ba_certificate'] : 'N/A'; ?></div>
    </div>
    <div class="row pt-3">
        <div class="col-md-4"><h5>MA Completion Date:</h5> <?php echo !empty($row['ma_completion_date']) ? $row['ma_completion_date'] : 'N/A'; ?></div>
        <div class="col-md-4"><h5>MA Certificate:</h5> <?php echo !empty($row['ma_certificate']) ? $row['ma_certificate'] : 'N/A'; ?></div>
    </div>
</div>

	<?php } ?>
</body>
</html>
