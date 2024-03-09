<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
    require_once "../connection/connection.php";

    $alert_message = ""; // Initialize the alert message variable

    if(isset($_POST['delete_btn'])) {
        $id_to_delete = $_POST['id'];
        // Construct the SQL query to delete the row
        $delete_query = "DELETE FROM contact WHERE id = $id_to_delete";
        // Execute the delete query
        $delete_result = mysqli_query($con, $delete_query);
        // Check if the deletion was successful
        if($delete_result) {
            // Set the alert message
            $alert_message = "Record deleted successfully!";
            // Redirect to the same page to refresh the table
            header("Location: contact.php");
            exit();
        } else {
            // Handle deletion failure
            $alert_message = "Failed to delete contact form submission.";
        }
    }

    // Fetch contact form submissions from the database
    $query = "SELECT * FROM contact";
    $result = mysqli_query($con, $query);
?>

<style>
   table.table thead tr th {
    background: #5e0209;
    color:white;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submissions</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>  
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="container mt-5">
            <h2>Contact Form Submissions</h2>
            <!-- Display the alert message if set -->
            <?php if(!empty($alert_message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $alert_message; ?>
                </div>
            <?php endif; ?>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                        <th>Action</th> <!-- Added closing </th> tag -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['first_name']}</td>";
                        echo "<td>{$row['last_name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone_number']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td><form method='post'><input type='hidden' name='id' value='{$row['id']}'><button type='submit' name='delete_btn' class='btn btn-danger'>Delete</button></form></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Link to Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </main>
</body>
</html>
