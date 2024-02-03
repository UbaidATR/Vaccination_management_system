<?php
include('config2.php');
$id=$_GET['id'];
$query2=mysqli_query($connection,"select * from admin where id = '$id'");
$data=mysqli_fetch_assoc($query2);
$image=$data['profile_image'];
$folder='image/';
unlink($folder .$image);
$query=mysqli_query($connection,"UPDATE `vaccinations_system`.`admin` SET`profile_image` = '' where id ='$id'");
header("location:user_profile.php");

?>
