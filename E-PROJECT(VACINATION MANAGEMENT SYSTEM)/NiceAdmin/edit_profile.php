<?php
include('config2.php');
session_start();
$id=$_SESSION['Admin_ID'];
$query=mysqli_query($connection,"select * from admin where id = '$id'");
$data=mysqli_fetch_assoc($query);
$media=$_FILES['image']['name'];
$folder='image/';
$final=$folder .$media;
if($media!=""){
    unlink($folder .$data['profile_image']);
    move_uploaded_file($_FILES['image']['tmp_name'],$final);
}else {
    $media=$data['profile_image'];
};
$name=$_POST['fullName'];
$about=$_POST['about'];
$company=$_POST['company'];
$job=$_POST['job'];
$country=$_POST['country'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$query=mysqli_query($connection,"UPDATE `vaccinations_system`.`admin` SET
 `name` = '$name',`profile_image` = '".$media."',
 `job_title` = '$job', `About` = '$about', 
`Company` = '$company', `country` = '$country', `address` = '$address',
 `phone` = '$phone', `email` = '$email' 
 WHERE (`id` = '$id');");
 if($query){
     header("location:user_profile.php");
 }


?>