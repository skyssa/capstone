<?php 
session_start();
require("../includes/config.php"); 



session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['fullname']) || !isset($_SESSION['user_id'])) {
    header("Location: ../role.php");
    exit;
}

if (isset($_POST['insert_data']) && isset($_POST['user_inp']) && isset($_POST['incoming_id'])) {
    $email = $_SESSION['fullname'];
    $user_id = $_SESSION['user_id'];
    $outgoing_id = mysqli_real_escape_string($conn, $user_id);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $msg = mysqli_real_escape_string($conn, $_POST['user_inp']);
    $target_dir = "../uploads/";
    $filename=$_FILES['file']['name'];
    $target_file = $target_dir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

    $file_path = mysqli_real_escape_string($conn, $filename);
            $query_user = mysqli_query($conn, "INSERT INTO user_msg(incoming_id, outgoing_id, messages, files, date_send) VALUES ('$incoming_id', '$outgoing_id', '$msg', '$file_path', NOW())");
    // Check if a file is uploaded
        
        if (!$query_user) {
            echo "An error occurred while saving the message.";
        }
    
} else {
    echo "Invalid request.";
}
?>
