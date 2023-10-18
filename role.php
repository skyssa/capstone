<?php
session_start();
include "includes/config.php";
if(!$_SESSION['fullname']){
     echo'<script>window.location.href="sign-in.php";</script>';
     exit();
}else if($_SESSION['user_type']=='Student'){
     echo '<script>window.location.href = "studenthome.php";</script>';

}else if($_SESSION['user_type']=='Teacher'){
     echo '<script>window.location.href = "teacherhome.php";</script>';
}
else if($_SESSION['user_type']=='admin'){
     echo '<script>window.location.href = "admin/dashboard.php";</script>';
}

 ?>