<?php
// update_user.php
include "../config/config.php"; 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection logic
    global $con; // Replace with your actual database connection file

    // Get the user_id and other form data
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $user_type = $_POST["user_type"];

    // Validate the data if needed

    // Prepare and execute the update query
    $sql = "UPDATE tbl_user SET name=?, user_type=? WHERE user_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $name, $user_type, $user_id);
    
    if ($stmt->execute()) {
        // Update successful
        header("Location: /users.php"); // Redirect to the page where the user list is displayed
        exit();
    } else {
        // Update failed
        echo "Error updating record: " . $con->error;
    }

    // Close the database connection
    $stmt->close();
    $con->close();
} else {
    // Redirect to the main page if accessed without proper POST data
    header("Location: index.php");
    exit();
}
?>