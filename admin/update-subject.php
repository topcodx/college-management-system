<?php  
session_start();
if (!isset($_SESSION["LoginAdmin"])) {
    header('location:../login/login.php');
    exit; // Make sure to exit after redirection
}
require_once "../connection/connection.php";

// Function to get subject details by subject_code
function getSubjectDetails($con, $subject_code) {
    $query = "SELECT * FROM course_subjects WHERE subject_code='$subject_code'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}

// Check if subject_code is set in the URL
if(isset($_GET['subject_code'])) {
    $subject_code = $_GET['subject_code'];
    // Fetch subject details by subject_code
    $subjectDetails = getSubjectDetails($con, $subject_code);
}

// Check if form is submitted for updating subject
if(isset($_POST['update_sub'])) {
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $semester = $_POST['semester'];
    $course_code = $_POST['course_code'];
    $credit_hours = $_POST['credit_hours'];

    // Update subject details in database
    $query = "UPDATE course_subjects SET subject_name='$subject_name', semester='$semester', course_code='$course_code', credit_hours='$credit_hours' WHERE subject_code='$subject_code'";
    $run = mysqli_query($con, $query);
    if($run) {
        echo "Subject updated successfully.";
        // Redirect back to subjects.php after update
        header("Location: subjects.php");
        exit; // Make sure to exit after redirection
    } else {
        echo "Failed to update subject.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Update Subject</title>
</head>
<body>
    <!-- Include common header -->
    <?php include('../common/common-header.php') ?>

    <main role="main">
        <div class="container">
            <h2>Update Subject</h2>
            <form action="update-subject.php" method="post">
                <input type="hidden" name="subject_code" value="<?php echo $subjectDetails['subject_code']; ?>">
                
                <div class="form-group">
                    <label for="subject_name">Subject Name:</label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $subjectDetails['subject_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $subjectDetails['semester']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="course_code">Course Code:</label>
                    <select class="form-control" id="course_code" name="course_code">
                        <option>Select Course</option>
                        <?php
                        $query="select course_code from courses";
                        $run=mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($run)) {
                            $selected = ($row['course_code'] == $subjectDetails['course_code']) ? 'selected' : '';
                            echo "<option value='".$row['course_code']."' ".$selected.">".$row['course_code']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="credit_hours">Credit Hours:</label>
                    <input type="number" class="form-control" id="credit_hours" name="credit_hours" value="<?php echo $subjectDetails['credit_hours']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update_sub">Update</button>
            </form>
        </div>
    </main>

    <!-- Include common footer -->
</body>
</html>
