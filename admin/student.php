<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";

         // Include helper.php file
         require_once "../common/helper.php";
         $universityLogo = getUniversityLogo('University_logo');
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->

<!--*********************** PHP code end from here for data insertion into database ******************************* -->

<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href=" <?php echo $universityLogo != null ?  $universityLogo : './images/LOGO1.JPG' ?>"
        type="image/x-icon">
    <title>Admin - Register Student</title>
    <style>
    .error-message {
        color: red;
        display: none;
    }
    </style>

</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
        <div class="sub-main">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <div class="d-flex">
                    <h4 class="mr-5">Student Management System </h4>
                    <button type="button" class="btn btn-primary ml-5" data-toggle="modal"
                        data-target=".bd-example-modal-lg">Add Student</button>
                </div>
            </div>
            <?php  
function generateRollNumber() {
    // Generate a random 9-digit roll number
    return mt_rand(0, 999);
}
 	if (isset($_POST['btn_save'])) {

        $roll_no = generateRollNumber();

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];
 		
 		$last_name=$_POST["last_name"];
 	 		
 		$email=$_POST["email"];
 		
 		$mobile_no=$_POST["mobile_no"];

 		$course_code=$_POST['course_code'];

 		$session=$_POST['session'];

		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

 		$application_status=$_POST["application_status"];
 		
 		$cnic=$_POST["cnic"];
 		
 		$dob=$_POST["dob"];
 		 		
 		$gender=$_POST["gender"];
 		 		
 		$current_address=$_POST["current_address"];
 		 		
 		$matric_complition_date=$_POST["matric_complition_date"];

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);
 		 		
 		$fa_complition_date=$_POST["fa_complition_date"];

		$fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

 		$password=$_POST['password'];

 		$role=$_POST['role'];

 		






// *****************************************Images upload code end here********************************************************** 

$query = "INSERT INTO student_info (roll_no, first_name, middle_name, last_name, email, mobile_no, course_code, session, profile_image, application_status, cnic, dob, gender, current_address, matric_complition_date, matric_certificate, fa_complition_date, fa_certificate) 
VALUES ('$roll_no', '$first_name', '$middle_name', '$last_name', '$email', '$mobile_no', '$course_code', '$session', '$profile_image', '$application_status', '$cnic', '$dob', '$gender', '$current_address', '$matric_complition_date', '$matric_certificate', '$fa_complition_date', '$fa_certificate')";
$run=mysqli_query($con, $query);
         if ($run) {  
            echo "<div class='alert alert-success' role='alert'>Your Data has been submitted</div>";
        } else { 
            echo "<div class='alert alert-danger' role='alert'>Your Data has not been submitted</div>";
        }
        $query2="insert into login(user_id,Password,Role)values('$roll_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];

		$date=date("d-m-y");

		$query3="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
        if ($run3) {  
            echo "<div class='alert alert-success' role='alert'>Your Data has been submitted</div>";
        } else { 
            echo "<div class='alert alert-danger' role='alert'>Your Data has not been submitted</div>";
        }


	}
?>
            <div class="col-md-2 pt-3 w-100">
                <!-- Large modal -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h4 class="modal-title text-center">Add New Student</h4>
                            </div>
                            <div class="modal-body">
                                <form action="student.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">Applicant First Name:*</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    id="first_name" required>
                                                <div class="invalid-feedback error-message" id="first_name_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middle_name">Applicant Middle Name:</label>
                                                <input type="text" name="middle_name" class="form-control"
                                                    id="middle_name">
                                                <div class="invalid-feedback error-message" id="middle_name_error">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name">Applicant Last Name:*</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name"
                                                    required>
                                                <div class="invalid-feedback error-message" id="last_name_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Applicant Email:*</label>
                                                <input type="email" name="email" class="form-control"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mobile_no">Mobile Number</label>
                                                <input type="text" name="mobile_no" class="form-control" id="mobile_no"
                                                    required>
                                                <div class="invalid-feedback error-message" id="mobile_no_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course which you want?: </label>
                                                <select class="browser-default custom-select" name="course_code">
                                                    <option>Select Course</option>
                                                    <?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Select Session:</label>
                                            <select class="browser-default custom-select" name="session">
                                                <option>Select Session</option>
                                                <?php
															$query="select session from sessions";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['session'].">".$row['session']."</option>";
															}
														?>
                                            </select>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Your Profile Image:</label>
                                                <input type="file" name="profile_image" placeholder="Student Age"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Current Address:</label>
                                                <input type="text" name="current_address" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Application Status:</label>
                                                <select class="browser-default custom-select" name="application_status">
                                                    <option>Select Option</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Not Approved">Not Approved</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">CNIC No:</label>
                                                <input type="text" name="cnic"
                                                    data-inputmask="'mask': '99999-9999999-9'"
                                                    placeholder="XXXXX-XXXXXXX-X" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Date of Birth: </label>
                                                <input type="date" name="dob" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Gender:</label>
                                                <select class="browser-default custom-select" name="gender">
                                                    <option>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Matric/OLevel Complition Date: </label>
                                                <input type="date" name="matric_complition_date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Upload Matric/OLevel
                                                    Certificate:</label>
                                                <input type="file" name="matric_certificate" class="form-control"
                                                    value="there is no image">
                                            </div>
                                        </div>
                                    </div>

                                   
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">FA/ALevel Complition Date: </label>
                                                <input type="date" name="fa_complition_date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
                                                <input type="file" name="fa_certificate" class="form-control"
                                                    value="there is no image">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
                            <div>
                                <input type="hidden" name="password" value="VMJ">
                                <input type="hidden" name="role" value="Student">
                            </div>
                            <!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="btn_save">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="search_student.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">
                                        <h5>Search:</h5>
                                    </label>
                                    <div class="d-flex">
                                        <input type="text" name="search" id="search" class="form form-control"
                                            placeholder="Enter I'd">
                                        <input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch"
                                            value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 pt-5 mb-2">
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"
                                data-target=".bd-example-modal-lg1">Assign Subjects</button>
                            <a class="btn btn-success" href="asign-single-student-subjects.php"> Assign Single
                                Student Subject</a>
                            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h4 class="modal-title text-center">Assign Subjects To Student</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="student.php" method="POST" enctype="multipart/form-data">
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Course:*</label>
                                                            <select class="browser-default custom-select"
                                                                name="course_code" required="">
                                                                <option>Select Course</option>
                                                                <?php
																				$query="select course_code from courses";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																				}
																			?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1" required>Enter
                                                                Semester:*</label>
                                                            <input type="text" name="semester" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Enter Roll
                                                                No:*</label>
                                                            <input type="text" name="roll_no" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Select
                                                                Subject:*</label>
                                                            <select class="browser-default custom-select"
                                                                name="subject_code" required="">
                                                                <option>Select Subject</option>
                                                                <?php
																				$query="select subject_code from course_subjects";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																				}
																			?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="btn_save2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
                        <tr class="table-tr-head table-three text-white">
                            <th>Roll.No</th>
                            <th>Student Name</th>
                            <th>Current Address</th>
                            <th>Session</th>
                            <th>Course ID</th>
                            <th>Admission</th>
                            <th>Profile</th>
                            <th colspan="1">Operations</th>
                        </tr>
                        <?php 
								$query="select first_name,middle_name,admission_date,last_name,current_address,session,roll_no,profile_image,course_code from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
                        <tr>
                            <td><?php echo $row["roll_no"] ?></td>
                            <td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
                            <td><?php echo $row["current_address"] ?></td>
                            <td><?php echo $row["session"] ?></td>
                            <td><?php echo $row["course_code"] ?></td>
                            <!-- date_format($date,"Y/m/d H:i:s"); -->
                            <td><?php echo date("Y-M-d",strtotime($row["admission_date"])); ?></td>
                            <td><?php  $profile_image= $row["profile_image"] ?>
                                <img height='50px' width='50px' src=<?php echo "images/$profile_image"  ?>>
                            </td>
                            <td width='170'>
                            <?php 
    echo "<a class='btn btn-primary' href='display-student.php?roll_no=".$row['roll_no']."'>Profile</a> 
          <a class='btn btn-danger' href='delete-function.php?roll_no=".$row['roll_no']."'>Delete</a>";
?>

                            </td>
                        </tr>
                        <?php }
								?>
                    </table>
                </section>
            </div>
        </div>
        </div>
    </main>
    <script>
    function validateAlphabets(inputField, errorSpan) {
        var inputValue = inputField.value.trim();
        var letters = /^[A-Za-z]+$/;
        if (!inputValue.match(letters)) {
            errorSpan.innerHTML = "Please enter only alphabet characters.";
            errorSpan.style.display = "block";
            inputField.classList.add("is-invalid");
            return false;
        } else {
            errorSpan.innerHTML = "";
            errorSpan.style.display = "none";
            inputField.classList.remove("is-invalid");
            return true;
        }
    }

    document.getElementById("first_name").addEventListener("input", function() {
        validateAlphabets(this, document.getElementById("first_name_error"));
    });

    document.getElementById("middle_name").addEventListener("input", function() {
        validateAlphabets(this, document.getElementById("middle_name_error"));
    });

    document.getElementById("last_name").addEventListener("input", function() {
        validateAlphabets(this, document.getElementById("last_name_error"));
    });

    function validateMobileNumber(inputField, errorSpan) {
        var inputValue = inputField.value.trim();
        var numbers = /^[0-9]+$/;
        if (!inputValue.match(numbers)) {
            errorSpan.innerHTML = "Please enter only numeric characters.";
            errorSpan.style.display = "block";
            inputField.classList.add("is-invalid");
            return false;
        } else if (inputValue.length !== 10) {
            errorSpan.innerHTML = "Mobile number must have exactly 10 digits.";
            errorSpan.style.display = "block";
            inputField.classList.add("is-invalid");
            return false;
        } else {
            errorSpan.innerHTML = "";
            errorSpan.style.display = "none";
            inputField.classList.remove("is-invalid");
            return true;
        }
    }

    document.getElementById("mobile_no").addEventListener("input", function() {
        validateMobileNumber(this, document.getElementById("mobile_no_error"));
    });
    </script>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>