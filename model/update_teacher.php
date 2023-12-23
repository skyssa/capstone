<?php
session_start();
include "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    global $conn; 

    $id=$_SESSION['user_id'];
    $school_id= $_POST['school_id'];
    $fullname= $_POST['fullname'];
    $gender= $_POST['gender'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
   
    $role_in_school= $_POST['role_in_school'];
    $department= $_POST['department'];
    
    $pic = $_FILES['profile']['name'];
    $folder = '../uploads/';
    $destination = $folder . $pic;
    move_uploaded_file($_FILES['profile']['tmp_name'],$destination);

    $cover = $_FILES['cover']['name'];
    $folder = '../uploads/';
    $destination = $folder . $cover;
    move_uploaded_file($_FILES['cover']['tmp_name'],$destination);


    // $query = $conn->prepare('UPDATE `users` SET `school_id`=?,`fullname`=?,`email`=?,`address`=?,`number`=?,`acadyr`=?,`role_in_school`=?,`department`=?,`pic`=?,`cover`=?,`date_registered`=now(),`status`="active",`approval`="pending" WHERE `uid`=?');
    // $query->bind_param('issssisssss', $school_id, $fullname, $email, $address, $number, $acadyr, $role_in_school, $department, $pic, $cover,$user_id);
    $query = $conn->prepare('UPDATE users SET school_id=?,fullname=?,gender=?,email=?,`address`=?,`number`=?,role_in_school=?,department=?,pic=?,cover=?,date_registered=now(),`status`="approval",approval="pending" WHERE `uid`=?');
    $query->bind_param('issssissssi',$school_id,$fullname,$gender,$email,$address,$number,$role_in_school,$department,$pic,$cover,$id);   
    if ($query->execute()) {
        echo 'alert("Your request is being processed..");';
        header('Location: ../teacherprofile.php');
    } else {
        // Log the error to a file
        error_log("Database Error: " . $query->error, 3, "error.log");
        echo json_encode($query->error);
    }

    // Close the database connection
    $query->close();
    $conn->close();
} else {
    // Redirect to the main page if accessed without proper POST data
    header("Location: ../alumniprofile.php");
    exit();
}
?>
