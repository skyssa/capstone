<?php
session_start();
include "../includes/config.php"; 


if (isset($_POST['approve'])) {
    $userId = $_POST['user_id'];
    $query = $conn->prepare("UPDATE users SET approval ='approve' WHERE id = ?");
    $query->bind_param('i',$userId);
    var_dump($userId);
    if($query->execute()){
        echo'<script>
        alert("User approval updated successfully. ");
        window.location.href="../admin/pending.php";
        
        </script>';
    }
    else{
        echo json_encode(mysqli_error($conn));
    }
}else if(isset($_POST['delete'])) {
    $userId = $_POST['user_id'];

    // Use a prepared statement to delete the user
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>