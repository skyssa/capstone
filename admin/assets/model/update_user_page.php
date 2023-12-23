<?php
// update_user_page.php

// Include your database connection logic
include "../config/config.php"; 

// Check if the user_id is provided
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch user data
    $sql = "SELECT * FROM tbl_user WHERE user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Redirect to the main page if user not found
        header("Location: index.php");
        exit();
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Redirect to the main page if user_id is not provided
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- Add your CSS stylesheets and other head elements as needed -->
    
</head>
<body>
    <h2>Update User</h2>
    <!-- Update Form -->
    <form method="POST" action="./update_user.php"> <!-- Assuming update_user.php is your update logic file -->
        <!-- Hidden input for user_id -->
        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
        
        <!-- Input fields for other attributes -->
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        
        <label for="user_type">User Type:</label>
        <input type="text" class="form-control" name="user_type" value="<?php echo $row['user_type']; ?>">

        <label for="name">isdeleted</label>
        <input type="text" class="form-control" name="isdeleted" value="<?php echo $row['isdeleted']; ?>">
        <label for="name">status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
        
        <!-- Add other input fields as needed -->
        
        <button type="submit">Save changes</button>
    </form>
</body>
</html>