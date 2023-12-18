<?php 
session_start();
include "../includes/config.php"; 

if(isset($_POST['submit'])){
    $id=$_SESSION['user_id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 

    $imageCount =count($_FILES['image']['name']);
    for($i=0;$i<$imageCount;$i++){
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "../uploads/".$imageName;
        if(move_uploaded_file($imageTempName, $targetPath)){
            $sql = "INSERT INTO tbl_post(user_id,names,`description`,image,date_created,isdeleted) values('$id','$user','$description','$imageName',now(),1)";
            $result = mysqli_query($conn,$sql);
        }
    }
        if($result){
            header('location:../teacherhome.php?msg=ins');
        }
}


?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="../uploads/"></script>
</body>
</html> -->