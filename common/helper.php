<?php
require_once dirname(__FILE__) . "/../connection/connection.php";

function getUniversityName($key) {
    global $con; 
    
    $query = "SELECT `value` FROM `setting` WHERE `key` = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $key);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $value);
        mysqli_stmt_fetch($stmt);
     
        return ($value !== null) ? $value : "VMJ UNIVERSITY";
		mysqli_stmt_close($stmt);
    } else {
        return null;
    }
}

function getUniversityLogo($key) {
    global $con; 
    $query = "SELECT `value` FROM `setting` WHERE `key` = ?";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $key);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $value);
        mysqli_stmt_fetch($stmt); // Fetch only once as we expect one row
        
        mysqli_stmt_close($stmt);
        
        // Return the image path
        return $value;
    } else {
        // Return an error message if query fails
        return null;
    }
}
?>
