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

		<title>Admin - Password</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Update Your Password</h4>
				</div>
				<?php 
    if (isset($_POST['submit'])) {
        $user_id=$_SESSION['LoginAdmin'];
        $password=$_POST['password'];
        $query="UPDATE login set Password='$password' where user_id='$user_id'";
        $run=mysqli_query($con,$query);
        if ($run) {  
            echo "<div class='alert alert-success' role='alert'>Your password has been updated successfully.</div>";
        } else { 
            echo "<div class='alert alert-danger' role='alert'>Failed to update password. Please try again.</div>";
        }
    }
?>

				<div class="container pt-5">
					<div class="row">
						<div class="col-md-12">
							<form action="admin-password.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Enter New Password</label>
											<input type="text" name="password" class="form-control" required placeholder="Enter New Password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group pt-4 pl-5">
											<input type="submit" name="submit" value="Update Password" class="btn btn-primary">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
