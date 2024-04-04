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


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>"
        type="image/x-icon">
    <title>Student Personal Information</title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
        <div class="sub-main sub-main-student">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4 class="">Update Your Personal Information </h4>
            </div>
            <?php 
    
    $roll_no=$_SESSION['LoginStudent'];
    $query1="select * from student_info where email='$roll_no'";
    $run1=mysqli_query($con,$query1);
    while ($row=mysqli_fetch_array($run1)){
        $roll_no=$row['$roll_no'];
    }


    if (isset($_POST['sub'])) {

        $first_name=$_POST['first_name'];

        $middle_name=$_POST['middle_name'];

        $last_name=$_POST['last_name'];

        $current_address=$_POST['current_address'];

        $mobile_no=$_POST['mobile_no'];

        $gender=$_POST['gender'];

        $profile_image=$_POST['profile_image'];

        $query="update student_info set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',current_address='$current_address',gender='$gender',profile_image='$profile_image',mobile_no='$mobile_no' where roll_no='$roll_no'";
        $run=mysqli_query($con,$query);
        if ($run) {  ?>
<div class="alert alert-success" role="alert">
    student data has been updated
</div>
<?php }
        else { ?>
<div class="alert alert-danger" role="alert">
    student data has not been updated paid due to some errors
</div>
<?php }
    }
?>
            <div class="row ml-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form action="student-personal-information.php" method="post">
                        <?php
                        $roll_no = $_SESSION['LoginStudent'];
                        $query = "SELECT * FROM student_info WHERE roll_no='$roll_no'";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) { ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name:*</label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="<?php echo $row['first_name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Middle Name:*</label>
                                    <input type="text" class="form-control" name="middle_name"
                                        value="<?php echo $row['middle_name'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name:*</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="<?php echo $row['last_name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Current Address:*</label>
                                    <input type="text" name="current_address" class="form-control"
                                        value="<?php echo $row['current_address'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile:*</label>
                                    <input type="number" class="form-control" name="mobile_no"
                                        value="<?php echo $row['mobile_no'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gender</label>
                                    <input type="text" class="form-control" name="gender"
                                        value="<?php echo $row['gender'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profile</label>
                                    <input type="File" class="form-control" name="profile_image"
                                        value="<?php echo $row['profile_image'] ?>" required>
                                </div>
                            </div>

                        </div>
                        <?php } ?>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 offset-4">
                                <input type="submit" name="sub" class="btn btn-primary" value="Update Information">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>