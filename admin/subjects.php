<?php  
    session_start();
    if (!$_SESSION["LoginAdmin"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
    // Include helper.php file
    require_once "../common/helper.php";
    $universityLogo = getUniversityLogo('University_logo');

    // Initialize variables for prefilling form data
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="<?php echo $universityLogo != null ? $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">
    <title>Admin - Subjects</title>
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Subject Management System</h4>
            </div>
            <?php $prefill_subject_code = "";
    $prefill_subject_name = "";
    $prefill_semester = "";
    $prefill_course_code = "";
    $prefill_credit_hours = "";

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $course_code = $_POST['course_code'];
        $semester = $_POST['semester'];
        $credit_hours = $_POST['credit_hours'];

        // Check if the subject code already exists in the database for updating
        $check_query = "SELECT * FROM course_subjects WHERE subject_code='$subject_code'";
        $check_result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            // Perform update in the database
            $update_query = "UPDATE course_subjects SET subject_name='$subject_name', course_code='$course_code', semester='$semester', credit_hours='$credit_hours' WHERE subject_code='$subject_code'";
            $update_result = mysqli_query($con, $update_query);
            if ($update_result) {
                echo "<div class='alert alert-success' role='alert'>Subject updated successfully</div>";
            } else { 
                echo "<div class='alert alert-danger' role='alert'>Failed to update subject</div>";
            }
        } else {
            // Perform insertion in the database
            $insert_query = "INSERT INTO course_subjects (subject_code, subject_name, course_code, semester, credit_hours) VALUES ('$subject_code', '$subject_name', '$course_code', '$semester' ,'$credit_hours')";
            $insert_result = mysqli_query($con, $insert_query);
            if ($insert_result) {
                echo "<div class='alert alert-success' role='alert'>Subject added successfully</div>";
            } else { 
                echo "<div class='alert alert-danger' role='alert'>Failed to add subject</div>";
            }
        }
    }

    // Retrieve existing data for prefilling form fields if the form is submitted for updating
    if (isset($_POST['update'])) {
        // Retrieve subject code from the form
        $subject_code = $_POST['subject_code'];

        // Fetch existing data for the selected subject
        $query = "SELECT * FROM course_subjects WHERE subject_code='$subject_code'";
        $result = mysqli_query($con, $query);		

        if ($row = mysqli_fetch_assoc($result)) {
            // Assign fetched data to variables for prefilling form fields
            $prefill_subject_code = $row['subject_code'];
            $prefill_subject_name = $row['subject_name'];
            $prefill_semester = $row['semester'];
            $prefill_course_code = $row['course_code'];
            $prefill_credit_hours = $row['credit_hours'];
        }
    }
    ?>
            <div class="row">
                <div class="col-md-12">
                    <form action="subjects.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Code:</label>
                                    <input type="text" name="subject_code" class="form-control" required placeholder="Enter Subject Code" value="<?php echo $prefill_subject_code; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Subject Name:</label>
                                    <input type="text" name="subject_name" class="form-control" required placeholder="Enter Subject Name" value="<?php echo $prefill_subject_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Semester:</label>
                                    <input type="text" name="semester" class="form-control" required placeholder="Enter Semester" value="<?php echo $prefill_semester; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code:</label>
                                    <select class="browser-default custom-select" name="course_code">
                                        <option>Select Course</option>
                                        <?php
                                            $query="SELECT course_code FROM courses";
                                            $run=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                                $selected = ($row['course_code'] == $prefill_course_code) ? 'selected' : '';
                                                echo "<option value='".$row['course_code']."' $selected>".$row['course_code']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Credit Hours:</label>
                                    <input type="number" name="credit_hours" class="form-control" placeholder="Enter Subject Credit Hours" required value="<?php echo $prefill_credit_hours; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group pt-2">
                                    <input type='submit' name='submit' value='Submit' class='btn btn-primary'>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ml-2">
                    <section class="mt-3">
                        <table class="w-100 table-elements table-three-tr" cellpadding="3">
                            <tr class="table-tr-head table-three text-white">
                                <th>Sr.No</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Course Code</th>
                                <th>Semester</th>
                                <th>Credit Hours</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                                $sr=1;
                                $query="SELECT subject_code, subject_name, course_code, semester, credit_hours FROM course_subjects";
                                $run=mysqli_query($con,$query);
                                while($row=mysqli_fetch_array($run)) {
                                    echo "<tr>";
                                    echo "<td>".$sr++."</td>";
                                    echo "<td>".$row['subject_code']."</td>";
                                    echo "<td>".$row['subject_name']."</td>";
                                    echo "<td>".$row['course_code']."</td>";
                                    echo "<td>".$row['semester']."</td>";
                                    echo "<td>".$row['credit_hours']."</td>";
                                    echo "<td width='20'>
                                            <form method='post'>
                                                <input type='hidden' name='subject_code' value='".$row['subject_code']."'>
                                                <input type='hidden' name='subject_name' value='".$row['subject_name']."'>
                                                <input type='hidden' name='course_code' value='".$row['course_code']."'>
                                                <input type='hidden' name='semester' value='".$row['semester']."'>
                                                <input type='hidden' name='credit_hours' value='".$row['credit_hours']."'>";
                                    echo "<button type='submit' name='update' class='btn btn-success update-btn'>Update</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "<td width='20'><a class='btn btn-danger' href='delete-function.php?subject_code=".$row['subject_code']."'>Delete</a></td>";
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

