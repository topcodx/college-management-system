<?php  
    session_start();
    if (!$_SESSION["LoginTeacher"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";

    // Include helper.php file
		require_once "../common/helper.php";
		$universityLogo = getUniversityLogo('University_logo');
?>

<?php
$_SESSION["LoginAdmin"] = "";
$teacher_id = "";
$teacher_email = $_SESSION['LoginTeacher'];
$query1 = "SELECT * FROM teacher_info WHERE email='$teacher_email'";
$run1 = $run = mysqli_query($con, $query1);
while ($row = mysqli_fetch_array($run1)) {
    $teacher_id = $row["teacher_id"];
}
$_SESSION['teacher_id'] = $teacher_id;
?>

<html lang="en">
<head>
<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

    <title>Teacher - Dashboard</title>
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/teacher-sidebar.php') ?>  

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
        <div class="sub-main">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4 class="">Welcome To <?php
                    $roll_no = $_SESSION['LoginTeacher'];
                    $query = "select * from teacher_info where email='$teacher_email'";
                    $run = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($run)) {
                        echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
                    }
                    ?> Dashboard </h4> </h4>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div>
                        <section class="mt-3">
                            <div class="btn btn-block table-three text-light d-flex">
                                <span class="font-weight-bold"><i class="fa fa-money mr-3" aria-hidden="true"></i> Salary Report</span>
                                <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

                            </div>
                            <div class="collapse show mt-2" id="collapsetwo">
                                <table class="w-100 table-elements table-three-tr"cellpadding="2">
                                    <tr class="pt-5 table-three text-white" style="height: 32px;">
                                        <th>Salary Voucher</th>
                                        <th>Basic Salary</th>
                                        <th>Medical Allowance</th>
                                        <th>HR Allowance</th>
                                        <th>Pay Scale</th>
                                        <th>Paid Date</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    <?php  
                                    $teacher_id=$_SESSION['teacher_id'];
                                    $query="select salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from teacher_salary_allowances inner join teacher_salary_report on teacher_salary_allowances.teacher_id=teacher_salary_report.teacher_id where teacher_salary_allowances.teacher_id='$teacher_id'";
                                    $run=mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_array($run)) { ?>
                                        <tr>
                                            <td><?php echo $row['salary_id'] ?></td>
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
                        </section>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div>
                        <section class="mt-3">
                            <div class="btn btn-block table-one text-light d-flex">
                                <span class="font-weight-bold"><i class="fa fa-bell-o mr-3" aria-hidden="true"></i> Notifications</span>
                                <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
                            </div>
                            <div class="collapse show mt-2" id="collapsethree">
                                <table class="w-100 table-elements table-one-tr"cellpadding="2">
                                    <tr>
                                        <td>Notification for teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Notification for teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Notification for teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Notification for teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Notification for teacher</td>
                                    </tr>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                    <table class="w-100 table-striped table-hover table-dark"cellpadding="2" >
                        <tr>
                            <td colspan="12" class="text-center text-white"><h5>Attendance Report</h5></td>
                        </tr>
                        <tr>
                            <th>Month</th>
                            <th>Working Days</th>
                            <th>Presents</th>
                            <th>Absents</th>
                            <th>Attendance Percentage</th>
                        </tr>

                        <?php
                        $query = "SELECT MONTH(attendance_date) AS attendance_month, COUNT(*) AS working_days, SUM(attendance) AS present FROM teacher_attendance WHERE teacher_id='$teacher_id' GROUP BY MONTH(attendance_date)";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) {
                            $attendance_month = $row['attendance_month'];
                            $working_days = $row['working_days'];
                            $present = $row['present'];
                            $absents = $working_days - $present;
                            $attendance_percentage = ($present / $working_days) * 100;
                            ?>

                            <tr>
                                <td><?php echo $attendance_month; ?></td>
                                <td><?php echo $working_days; ?></td>
                                <td><?php echo $present; ?></td>
                                <td><?php echo $absents; ?></td>
                                <td><?php echo round($attendance_percentage, 2) . '%'; ?></td>
                            </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
