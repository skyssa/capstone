<?php
session_start();
include "includes/config.php";

if(!$_SESSION['fullname']){
     echo'<script>window.location.href="sign-in.php";</script>';
     exit();
}

$id=$_SESSION['user_id'];
$query="SELECT * FROM tbl_user WHERE user_id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
do{
     if($row['dep_type']=="BSIT"){
          echo '<script>window.location.href = "bsit.php";</script>';  
     }else if($row['dep_type']=="BSHM"){
          echo '<script>window.location.href = "bshm.php";</script>';
     
     }else if($row['dep_type']=="BEED"){
          echo '<script>window.location.href = "beed.php";</script>';
     
     }else if($row['dep_type']=="BSED"){
          echo '<script>window.location.href = "bsed.php";</script>';
     
     }

     $row=mysqli_fetch_assoc($result);
}while($row);



 ?>