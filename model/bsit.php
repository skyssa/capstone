<?php 
session_start();
include "../includes/config.php"; 

$method = $_POST['method'];

if(function_exists($method)){ //fnSave
    call_user_func($method);
}
else{
    echo "Function not exists";
}

function fnAddComment(){
    global $conn;
    $id=$_SESSION['user_id'];
    $uname=$_SESSION['fullname'];
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment_text'];

    $sql = "INSERT INTO `bsitcomments`( `pos_id`, `user_id`, `uname`, `comment`, `date`, `isapprove`) VALUES (?,?,?, ?, NOW(),0)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iiss', $post_id,$id,$uname, $comment_text);

    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}


?>