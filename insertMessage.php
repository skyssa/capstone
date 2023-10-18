<?php
session_start();
include "includes/config.php";

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$message = $_POST["message"];

$output = "";

$sql = $conn->prepare("INSERT INTO message(fromuser,touser,message) VALUES($fromUser,$toUser,$message)");
if($sql->execute()){
    $output.="";
}else{
    $output.="Error pls try again";
}
echo $output;
?>