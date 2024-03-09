<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style for contact details box */
        .contact-details {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            
        }

        .contact-details p {
            margin-bottom: 5px;
        }

        /* Style to match the header color */
        .contact-details h5 {
            display: flex;
            justify-content:center;
            color: white; /* Adjust the color as needed */
            background: #5e0209;
            border-bottom: 2px solid #007bff; /* Match the header color */
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<?php include('common/header.php') ?>
<div class="container-fluid">
    <div class="row mb-5">
        <div class="academic-area-headings">
            <h4 class="py-4" style="color: #007bff;">Contact us</h4> <!-- Match the header color -->
        </div>
    </div>
    <!-- Contact Details Box -->
    <form>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="contact-details">
                <h5><strong> V Wing (For Collge Cources)</strong></h5>
                <p><i class="fas fa-map-marker-alt"></i> Near Sitanagar Chowk, Ramnagar Road</p>
                <p><i class="fas fa-phone"></i> <strong>Reception:</strong> 0261 - 3530300</p>
                <p><i class="fas fa-phone"></i> <strong>Accounts office:</strong> 0261 - 3530304</p>
                <p><i class="far fa-envelope"></i> <strong>Email:</strong> admissions@VMJ.edu</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="contact-details">
                <h5><strong> M Wing (For Master Cources)</strong></h5>
                <p><i class="fas fa-map-marker-alt"></i> Near Sitanagar Chowk, Ramnagar Road</p>
                <p><i class="fas fa-phone"></i> <strong>Reception:</strong> 0261 - 3530327</p>
                <p><i class="far fa-envelope"></i> <strong>Email:</strong> admissions@VMJ.edu</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="contact-details">
                <h5><strong> J Wing (For Information)</strong></h5>
                <p><i class="fas fa-map-marker-alt"></i> Near Sitanagar Chowk, Ramnagar Road</p>
                <p><i class="fas fa-phone"></i> <strong>Reception:</strong> 0261 - 3530316</p>
                <p><i class="fas fa-phone"></i> <strong>Accounts office:</strong> 0261 - 3530317</p>
                <p><i class="far fa-envelope"></i> <strong>Email:</strong> admissions@VMJ.edu</p>
            </div>
        </div>
    </div>
    </form>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row location">
            <div class="col-md-6 offset-md-3">
                <h5>Location
                <!-- Embed Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.305159901966!2d72.8310608!3d21.1702401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c3f4785f964cd%3A0x10b20ff99adbc675!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1646823256189!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Link to Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
