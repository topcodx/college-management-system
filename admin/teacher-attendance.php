<?php  
    session_start();
    if (!$_SESSION["LoginAdmin"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
?>

<?php
if (isset($_POST['sub'])) {
    $teacher_id=$_POST['teacher_id'];
    $attendance=$_POST['attendance'];
    $date=date("d-m-y");

    $que="insert into teacher_attendance(teacher_id,attendance,attendance_date)values('$teacher_id','$attendance','$date')";
    $run=mysqli_query($con,$que);
    if ($run) {?>
        <script type="text/javascript">
            alert("Insert Successfully");
        </script>
    <?php
    } else{
        echo " Insert Not Successfully";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Admin - Teacher Attendance</title>
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>  

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Teacher Attendance Management System </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="teacher-attendance.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Teacher Id:</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" name="teacher_id" placeholder="Enter Teacher I'd">
                                        <input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Search">
                                    </div>     
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-12 ml-2">
                    <section class="border mt-3">
                        <table class="w-100 table-elements table-three-tr" cellpadding="3">
                            <tr class="table-tr-head table-three text-white">
                                <!-- Default checked -->
                                <th>Sr.No</th>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Working Days</th>
                                <th>Attendance Per</th>
                                <th>Add Attendance</th>
                            </tr>
                            <?php  
                            $i=1;
                            if (isset($_POST['submit'])) {
                                $teacher_id=$_POST['teacher_id'];
                                $que="select teacher_id, first_name, middle_name, last_name from teacher_info where teacher_id='$teacher_id' ";
                                $run=mysqli_query($con,$que);
                                while ($row=mysqli_fetch_array($run)) {
                                    // Fetch present and absent counts from database
                                    $present_count_query = "SELECT COUNT(*) as present_count FROM teacher_attendance WHERE teacher_id = '$teacher_id' AND attendance = '1'";
                                    $absent_count_query = "SELECT COUNT(*) as absent_count FROM teacher_attendance WHERE teacher_id = '$teacher_id' AND attendance = '0'";
                                    $present_count_result = mysqli_query($con, $present_count_query);
                                    $absent_count_result = mysqli_query($con, $absent_count_query);
                                    $present_count = mysqli_fetch_assoc($present_count_result)['present_count'];
                                    $absent_count = mysqli_fetch_assoc($absent_count_result)['absent_count'];
                                    ?>
                                    <form action="teacher-attendance.php" method="post">
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row['teacher_id'] ?></td>
                                            <input type="hidden" name="teacher_id" value=<?php echo $row['teacher_id'] ?> >
                                            <td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
                                            <td><?php echo $present_count ?></td>
                                            <td><?php echo $absent_count ?></td>
                                            <td class="text-center"><?php echo ($present_count + $absent_count) ?></td>
            <td>
                <?php
                // Calculate attendance percentage
                $total_attendance = $present_count + $absent_count;
                $attendance_percentage = $total_attendance != 0 ? round(($present_count / $total_attendance) * 100, 2) : 0;
                echo $attendance_percentage . "%";
                ?>
            </td>
            <td>Present<input type="checkbox" name="attendance" value="1">Absent<input type="checkbox" name="attendance" value="0"></td>
                                        </tr>
                                    <?php
                                }
                            }
                            ?>
                            <input type="submit" name="sub">
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
