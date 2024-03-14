<?php  
session_start();
if (!isset($_SESSION["LoginAdmin"])) {
    header('location:../login/login.php');
    exit; // Make sure to exit after redirection
}
require_once "../connection/connection.php";

// Initialize $CourseDetails variable
// $CourseDetails = array();

// Function to get subject details by course_code
function getCourseDetails($con, $course_code) {
    // $course_code = mysqli_real_escape_string($con, $course_code);
    $query = "SELECT * FROM courses WHERE course_code='$course_code'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}

// Check if course_code is set in the URL
if(isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];
    // Fetch subject details by course_code
    $CourseDetails = getCourseDetails($con, $course_code);
}

// Check if form is submitted for updating subject
if(isset($_POST['update_sub'])) {
   $course_code =$_POST['course_code'];
   $course_name = $_POST['course_name'];
   $semester_or_year = $_POST['semester_or_year'];
   $no_of_year = $_POST['no_of_year'];


    // Update subject details in database
    $query = "UPDATE courses SET course_name='$course_name', semester_or_year='$semester_or_year', no_of_year=$no_of_year WHERE course_code='$course_code'";
    $run = mysqli_query($con, $query);

    if($run) {
        echo "Course updated successfully.";
        // Redirect back to courses.php after update
        header("Location: courses.php");
        exit; // Make sure to exit after redirection
    } else {
        // Print MySQL error message if update fails
        echo "Failed to update course. Error: " . mysqli_error($con);
    }
   
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Update Course</title>
</head>
<body>
    <!-- Include common header -->
    <?php include('../common/common-header.php') ?>

    <main role="main">
        <div class="container">
            <h2>Update Course</h2>
            <form action="update-course.php" method="post">
                
                <input type="hidden" name="course_code" value="<?php echo isset($CourseDetails['course_code']) ? htmlspecialchars($CourseDetails['course_code']) : ''; ?>">
                
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo isset($CourseDetails['course_name']) ? htmlspecialchars($CourseDetails['course_name']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="semester_or_year">Semester or Year:</label>
                    <input type="text" class="form-control" id="semester_or_year" name="semester_or_year" value="<?php echo isset($CourseDetails['semester_or_year']) ? htmlspecialchars($CourseDetails['semester_or_year']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_of_year">Number of Years:</label>
                    <input type="number" class="form-control" id="no_of_year" name="no_of_year" value="<?php echo isset($CourseDetails['no_of_year']) ? intval($CourseDetails['no_of_year']) : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update_sub">Update</button>
            </form>
        </div>
    </main>

</body>
</html>
