
<?php
    require_once "../connection/connection.php";
    session_start();

    if (!$_SESSION["LoginAdmin"]) {
        header('location:../login/login.php');
        exit; // Add exit after redirection to prevent further execution
    }

    if (!isset($_GET['roll_no']) || empty($_GET['roll_no'])) {
        echo "Roll number not provided!";
        exit;
    }

    $roll_no = $_GET['roll_no'];

    // Fetch student data based on roll number
    $query = "SELECT * FROM student_info WHERE roll_no = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $roll_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Student not found!";
        exit;
    }

    if (isset($_POST['btn_update'])) {
        // Collect updated data from form
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile_no = $_POST["mobile_no"];
        $course_code = $_POST["course_code"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $current_address = $_POST["current_address"];

        // Perform update query using prepared statement
        $update_query = "UPDATE student_info SET first_name=?, middle_name=?, last_name=?, email=?, mobile_no=?, course_code=?, dob=?, gender=?, current_address=? WHERE roll_no=?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $first_name, $middle_name, $last_name, $email, $mobile_no, $course_code, $dob, $gender, $current_address, $roll_no);
        $update_result = mysqli_stmt_execute($stmt);

        // Check if update was successful
        if ($update_result) {
            echo "<div class='alert alert-success' role='alert'>Student data updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Failed to update student data.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 8px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Student Information</h2>
        <?php if(isset($update_message)): ?>
            <div class="alert <?php echo $update_message['type']; ?>"><?php echo $update_message['text']; ?></div>
        <?php endif; ?>
        <form action="update-student.php?roll_no=<?php echo htmlspecialchars($roll_no); ?>" method="POST">
            <div class="form-group">
                <label for="first_name">Applicant First Name:*</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Applicant Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Applicant Last Name:*</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Applicant Email:*</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile Number:</label>
                <input type="text" name="mobile_no" id="mobile_no">
            </div>
            <div class="form-group">
                <label for="course_code">Course which you want?:</label>
                <select name="course_code" id="course_code">
                    <option value="">Select Course</option>
                    <?php while($row=mysqli_fetch_array($run)): ?>
                        <option value="<?php echo $row['course_code']; ?>"><?php echo $row['course_code']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="profile_image">Your Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="current_address">Current Address:</label>
                <input type="text" name="current_address" id="current_address">
            </div>
            <input type="submit" name="btn_update" value="Update">
        </form>
    </div>
</body>

</html>
