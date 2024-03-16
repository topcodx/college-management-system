<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
    header('location:../login/login.php');
}
require_once "../connection/connection.php";
require_once "../common/helper.php";

 // Include helper.php file
 require_once "../common/helper.php";
 $universityLogo = getUniversityLogo('University_logo');
$message = "";
$bg_color = "";

if (isset($_POST['submit'])) {
    $uni_name = $_POST['uni_name'];

    // File Upload
    $img = $_FILES['img']['name'];
    $temp_file = $_FILES['img']['tmp_name'];

    $upload_path = $_SERVER['DOCUMENT_ROOT'].'/college-management-system/images/' . $img;
	$uploadImage = '/college-management-system/images/' . $img;

    // Move uploaded file to the destination
    move_uploaded_file($temp_file, $upload_path);

    // Check if the setting already exists for University Name
    $check_query_name = "SELECT `value` FROM `setting` WHERE `key` = 'University_name'";
    $check_stmt_name = mysqli_query($con, $check_query_name);


    // Check if the setting already exists for University Logo
	$check_query_logo = "SELECT `value` FROM `setting` WHERE `key` = 'University_name'";
    $check_stmt_logo = mysqli_query($con, $check_query_logo);


    if (mysqli_num_rows($check_stmt_name) > 0 && mysqli_num_rows($check_stmt_logo) > 0) {

        // Update the existing settings for University Name
        $update_query_name = "UPDATE `setting` SET `value` = ? WHERE `key` = 'University_name'";
        $update_stmt_name = $con->prepare($update_query_name);
        $update_stmt_name->bind_param("s", $uni_name);
        $update_stmt_name->execute();

		
		if(empty($img)){
			$uploadImage = getUniversityLogo('University_logo');
		}
		
        // Update the existing settings for University Logo
        $update_query_logo = "UPDATE `setting` SET `value` = ? WHERE `key` = 'University_logo'";
        $update_stmt_logo = $con->prepare($update_query_logo);
        $update_stmt_logo->bind_param("s", $uploadImage); // Use the image path here
        $update_stmt_logo->execute();

        if ($update_stmt_name->affected_rows > 0 && $update_stmt_logo->affected_rows > 0) {
            $message = "Settings updated successfully";
        }
    } else {
		
        // Insert new settings for University Name
        $insert_query_name = "INSERT INTO `setting` (`key`, `value`) VALUES ('University_name', ?)";
        $insert_stmt_name = $con->prepare($insert_query_name);
        $insert_stmt_name->bind_param("s", $uni_name);
        $insert_stmt_name->execute();

        // Insert new settings for University Logo
        $insert_query_logo = "INSERT INTO `setting` (`key`, `value`) VALUES ('University_logo', ?)";
        $insert_stmt_logo = $con->prepare($insert_query_logo);
        $insert_stmt_logo->bind_param("s", $uploadImage); // Use the image path here
        $insert_stmt_logo->execute();

        if ($insert_stmt_name->affected_rows > 0 && $insert_stmt_logo->affected_rows > 0) {
            $message = "Settings inserted successfully";
			header("Location: settig.php");
			exit();
		} else {
			echo "Failed to update ";
		 }
        }
    }

?>
<!doctype html>
<html lang="en">

<head>
<link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>" type="image/x-icon">

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
				<h4>Setting</h4>
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
					<div class="container pt-5">
					<div class="row">
						<div class="col-md-12">
							<form action="setting.php" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="uni_name">University Name</label>
											<input type="text" name="uni_name" id="uni_name" class="form-control"
												required placeholder="University Name"
												value="<?php echo getUniversityName('University_name')?>">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="img">Logo</label><br>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="img" name="img"
														<?php echo getUniversityLogo('University_logo') != null ? '' : 'required'; ?>
														>
													<label class="custom-file-label" for="img">Choose file</label>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="submit" name="submit" value="Update"
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
		<div class="container my-3">
			<?php
           $logoPath = getUniversityLogo('University_logo');
           if ($logoPath !== "Error executing query") {
               echo '<img src="' . $logoPath . '" style="width:100px; height:100px;">';
           } else {
               echo "Error: Unable to retrieve logo";
           }
           ?>
		</div>
	</main>

	<!-- jQuery script to hide the alert after 5 seconds -->
	<script>
	$(document).ready(function() {

		$('#img').change(function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
	});
	</script>
	

</body>

</html>