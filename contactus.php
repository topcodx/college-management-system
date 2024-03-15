<?php
include('common/header.php');
require_once "connection/connection.php";

if(isset($_POST['btn_save3'])) {

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $message = $_POST["message"];

    $query = "INSERT INTO contact (first_name, last_name, email, phone_number, message)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$message')";

    $run = mysqli_query($con, $query);

    if ($run) {
        // Redirect to thank_you.php after successful form submission
        header("Location: thank_you.php");
        exit(); // Stop further execution
    } else {
        echo '<script>alert("Failed to send your details.");</script>';
    }
}
?>

<!DOCTYPE html>
<html >

<head>
<title>Contact us</title>
<style>
/* Style for contact details box */
.contact-details {
    background-color: #5e0209;
    padding: 50px;
    border-radius: 5px;
    margin-top: 20px;
}

.contact-form-row {
    width: 100%;
}

.contact-details p {
    margin-bottom: 5px;
}

.contact-form {
    padding-top: 2rem;
    margin-left: 50px; 
}

h5 {
    text-align: center;
    background: #5e0209;
    padding: 1rem;
    color:white;
}

.contact-details h5 {
    display: flex;
    justify-content: center;
    color: white;
    background: #5e0209; /* Corrected background color */
    border-bottom: 2px solid #007bff; /* Match the header color */
    padding-bottom: 10px;
    margin-bottom: 15px;
}
  
.submit-btn-container {
        display: flex;
        justify-content: center;
    }
</style>
</head>

<body>

    <!-- Contact Details Box -->
    <form method="POST" class="contact-form">

            <div class="row contact-form-row">
                <div class="form-group col-md-8">
                    <h5 ><strong>Contact Form</strong></h5>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Phone Number:</label>
                            <input type="number" class="form-control" name="phone_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group submit-btn-container " >
                        <input type="submit" class="btn btn-primary px-5" name="btn_save3" value="Submit">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="d-flex justify-content-center">
                        <img src="./images/contact.jpg" alt="Image" class="img-fluid">  
                    </div>
                </div>
            </div>
    </form>
</body>

</html>