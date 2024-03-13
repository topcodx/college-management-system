<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
    header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>
<?php
$message = "";

if (isset($_POST['submit'])) {
    $uni_name = $_POST['uni_name'];
    $user_id = $_SESSION['LoginAdmin'];

    // Check if the user record already exists
    $check = "SELECT * FROM `change_name` WHERE `user_email` = '$user_id'";
    $checkresult = mysqli_query($con, $check);

    if (mysqli_num_rows($checkresult) > 0) {
        // Update the existing record
        $update = "UPDATE `change_name` SET `name` = '$uni_name' WHERE `user_email` = '$user_id'";
        $updateresult = mysqli_query($con, $update);

        if ($updateresult) {
            $message = "Update name Successfully";
        }
    } else {
        // Insert a new record if it doesn't exist
        $insert = "INSERT INTO `change_name` (`user_email`, `name`) VALUES ('$user_id', '$uni_name')";
        $insertresult = mysqli_query($con, $insert);

        if ($insertresult) {
            $message = "Update name Successfully";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin - Manage Accounts</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div
                class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Change University Name</h4>
            </div>
            <?php
            if ($message == true) {
                $bg_color = "alert-success";
                $message = $message;
            }
            ?>
            <h5 class="alert py-2 pl-3 mt-0 <?php echo $bg_color; ?>">
                <?php echo $message ?>
            </h5>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                            <form action="change_university.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Change University Name</label>
                                            <input type="text" name="uni_name" class="form-control" required
                                                placeholder="Change University Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Change"
                                                class="btn btn-primary px-5">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- jQuery script to hide the alert after 5 seconds -->
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').fadeOut();
            }, 5000);
        });
    </script>
</body>

</html>
