<?php
session_start();
require_once "../connection/connection.php";

// Include helper.php file
require_once "../common/helper.php";
$universityLogo = getUniversityLogo('University_logo');

// Initialize $CourseDetails variable
$CourseDetails = array();

// Function to get course details by course_code
function getCoursesDetails($con, $course_code) {
    $query = "SELECT * FROM courses WHERE course_code=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $course_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Check if course_code is set in the URL
if (isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];
    // Fetch course details by course_code
    $CourseDetails = getCoursesDetails($con, $course_code);
}

// Check if form is submitted for updating course
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_sub'])) {
        $course_code = $_POST['course_code'];
        $course_name = $_POST['course_name'];
        $semester_or_year = $_POST['semester_or_year'];
        $no_of_year = $_POST['no_of_year'];

        // Update course details in database using prepared statement
        $query = "UPDATE courses SET course_name=?, semester_or_year=?, no_of_year=? WHERE course_code=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssis", $course_name, $semester_or_year, $no_of_year, $course_code);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Course updated successfully.";
            // Update CourseDetails array after successful update
            $CourseDetails['course_name'] = $course_name;
            $CourseDetails['semester_or_year'] = $semester_or_year;
            $CourseDetails['no_of_year'] = $no_of_year;
        } else {
            // Print MySQL error message if update fails
            echo "Failed to update course. Error: " . mysqli_error($con);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

    <title>Update Course</title>
</head>
<body>
    <!-- Include common header -->
    <?php include('../common/common-header.php') ?>

    <main role="main">
        <div class="container">
            <h2>Update Course</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
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
