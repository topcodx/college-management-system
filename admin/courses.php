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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Courses</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Include any other CSS files here -->
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>  

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Course Management System</h4>
            </div>
            <?php
    // Code to handle insertion
    if (isset($_POST['sub'])) {
        // Retrieve form data
        $course_code = $_POST['course_code'];
        $course_name = $_POST['course_name'];
        $semester_or_year = $_POST['semester_or_year'];
        $no_of_year = $_POST['no_of_year'];

        // Perform insertion into the database
		$query = "INSERT INTO courses (course_code, course_name, semester_or_year, no_of_year) VALUES ('$course_code', '$course_name', '$semester_or_year', '$no_of_year') 
		ON DUPLICATE KEY UPDATE course_name = VALUES(course_name), semester_or_year = VALUES(semester_or_year), no_of_year = VALUES(no_of_year)";
	  $run = mysqli_query($con, $query);
      
        
    }

    // Code to handle updating
    if (isset($_POST['update'])) {
        // Retrieve form data
        $course_code = $_POST['course_code'];
        $course_name = $_POST['course_name'];
        $semester_or_year = $_POST['semester_or_year'];
        $no_of_year = $_POST['no_of_year'];

        // Perform update in the database
        $query = "UPDATE courses SET course_name='$course_name', semester_or_year='$semester_or_year', no_of_year='$no_of_year' WHERE course_code='$course_code'";
        $run = mysqli_query($con, $query);
    }
?>
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
                                <input type="submit" name="sub" value="Submit" class="btn btn-primary ml-auto">
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
                                <th>Course Name</th>
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
                                                <button type='button' class='btn btn-success update-btn' data-course-code='".$row['course_code']."'>Update</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.update-btn').click(function() {
                var courseCode = $(this).closest('tr').find('td:eq(1)').text();
                var courseName = $(this).closest('tr').find('td:eq(2)').text();
                var semesterOrYear = $(this).closest('tr').find('td:eq(3)').text();
                var noOfYear = $(this).closest('tr').find('td:eq(4)').text();

                $('input[name="course_code"]').val(courseCode);
                $('input[name="course_name"]').val(courseName);
                $('input[name="semester_or_year"]').val(semesterOrYear);
                $('input[name="no_of_year"]').val(noOfYear);
            });
        });
    </script>
</body>
</html>
