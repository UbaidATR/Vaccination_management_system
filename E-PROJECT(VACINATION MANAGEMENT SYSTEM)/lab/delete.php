<?php
include("connection.php");
$hospital_id = $_GET['hospital_id'];
    
    
$query = "SELECT * FROM hospital where hospital_id = '$hospital_id'";
$final = mysqli_query($connection, $query);
$result = mysqli_fetch_array($final);

$user_name = $result['user_name'];
$user_email =  $result['user_email'];
$user_password =  $result['user_password'];
$user_image = $result['user_image'];
$folder = "images/";
$files = $folder. $user_image;


$query = mysqli_query($connection,"DELETE FROM hospital where hospital_id = '$hospital_id'");
$imagedelete = unlink($files);

    header("Location:welcome.php");
?>