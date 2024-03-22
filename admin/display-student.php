<!---------------- Session starts form here ----------------------->
<?php  
    session_start();
    
    if ($_SESSION["LoginAdmin"]) {
        $roll_no = $_GET['roll_no'] ?? $_SESSION['LoginStudent'];
    } else if (!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']) {
        $roll_no = $_SESSION['LoginStudent'];
    } else { ?>
        <script> alert("Your Are Not Authorize Person For This link");</script>
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
    <link rel="shortcut icon" href="<?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

        <title>Admin - Student Information</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
    <?php
    $query = "select * from student_info where roll_no='$roll_no'";
    $run = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($run)) {
        ?>
        <div class="container  mt-1 border border-secondary mb-1">
            <div class="row text-white bg-primary pt-5">
                <div class="col-md-4">
                    <?php  $profile_image = $row["profile_image"] ?>
                    <img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image" ?> >
                </div>
                <div class="col-md-8">
                    <h3 class="ml-5"><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?></h3><br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Email:</h5> <?php echo !empty($row['email']) ? $row['email'] : 'N/A' ?><br><br>
                            <h5>Contact:</h5> <?php echo !empty($row['mobile_no']) ? $row['mobile_no'] : 'N/A' ?><br><br>
                        </div>
                        <div class="col-md-6">
                            <h5>Roll No:</h5> <?php echo !empty($row['roll_no']) ? $row['roll_no'] : 'N/A' ?><br><br>
                            <h5>Current address:</h5> <?php echo !empty($row['current_address']) ? $row['current_address'] : 'N/A' ?><br><br>
                        </div>      
                    </div>
                </div>
                <hr>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Application Status:</h5> <?php echo !empty($row['application_status']) ? $row['application_status'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Semester:</h5> <?php echo !empty($row['semester']) ? $row['semester'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Date of Birth:</h5> <?php echo !empty($row['dob']) ? $row['dob'] : 'N/A' ?></div>

            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Gender:</h5> <?php echo !empty($row['gender']) ? $row['gender'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Course:</h5> <?php echo !empty($row['course_code']) ? $row['course_code'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Session:</h5> <?php echo !empty($row['session']) ? $row['session'] : 'N/A' ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Admission Date:</h5> <?php echo !empty($row['admission_date']) ? $row['admission_date'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Matric Complition Date:</h5> <?php echo !empty($row['matric_complition_date']) ? $row['matric_complition_date'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Matric Certificate:</h5> <?php echo !empty($row['matric_certificate']) ? $row['matric_certificate'] : 'N/A' ?></div>
            </div>
        
            <div class="row pt-3">
                <div class="col-md-4"><h5>Fa Completion Date:</h5> <?php echo !empty($row['fa_complition_date']) ? $row['fa_complition_date'] : 'N/A' ?></div>
                <div class="col-md-4"><h5>Fa Certificate:</h5> <?php echo !empty($row['fa_certificate']) ? $row['fa_certificate'] : 'N/A' ?></div>
            </div>
        </div>
    <?php } ?>
</body>
</html>
