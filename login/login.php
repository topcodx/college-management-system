<?php
session_start();
require_once "../connection/connection.php";
$message = ""; // Initialize the message variable
// Include helper.php file
require_once "../common/helper.php";
$universityLogo = getUniversityLogo('University_logo');

if(isset($_POST["btnlogin"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM login WHERE user_id='$username' AND Password='$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row["account"] == "Activate") { // Check if the account is activated
                if ($row["Role"] == "Admin") {
                    $_SESSION['LoginAdmin'] = $row["user_id"];
                    header('Location: ../admin/admin-index.php');
                } else if ($row["Role"] == "Teacher") {
                    $_SESSION['LoginTeacher'] = $row["user_id"];
                    header('Location: ../teacher/teacher-index.php');
                } else if ($row["Role"] == "Student") {
                    $_SESSION['LoginStudent'] = $row['user_id'];
                    header('Location: ../student/student-index.php');
                }
            } else {
                $message = "<span style='color: red;'>Your account is not activated. Please contact the administrator.</span>"; // Message for inactive account
            }
        }
    } else {
        $message = "<span style='color: red;'>Invalid user ID or password. Please try again.</span>"; // Message for invalid credentials
    }
}
?>
<style>
    

    </style>
<!doctype html>
<html lang="en">
<head>
<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

    <title>Login - VMJ</title>
</head>
<body class="login-background">
<?php include('../common/common-header.php') ?>
<div class="login-div mt-3 rounded">
    <div class="logo-div text-center">
        <img src="<?php echo $universityLogo; ?>" alt="" class="align-items-center" width="100" height="100">
    </div>
    <div class="login-padding">
        <h2 class="text-center text-white">LOGIN</h2>
        <form class="p-1" action="login.php" method="POST">
            <div class="form-group">
                <label><h6>Enter Your ID/Email:</h6></label>
                <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
            </div>
            <div class="form-group">
                <label><h6>Enter Password:</h6></label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                <p class="text-danger"><?php echo $message; ?></p> <!-- Display the message -->
            </div>
            <div class="form-group text-center mb-3 mt-4">
                <input type="submit" name="btnlogin" value="LOGIN" class="btn btn-white pl-5 pr-5 ">
            </div>
        </form>
    </div>
</div>
</body>
</html>
