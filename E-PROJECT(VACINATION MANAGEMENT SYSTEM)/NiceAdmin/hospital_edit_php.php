<?php 
include('config2.php');
$id=$_POST['id'];
$name=$_POST['user_name'];
$user_password=$_POST['user_password'];
$h_l=$_POST['hospital_location'];
$h_n=$_POST['hospital_number'];
$n_o_f=$_POST['number_of_departments'];
$user_image=$_POST['user_image'];
$user_email=$_POST['user_email'];
$query=mysqli_query($connection,"UPDATE `vaccinations_system`.`hospital` SET `user_name` = '$name', `user_password` = '$user_password',
`hospital_location` = '$h_l', `hospital_number` = '$h_n', `number_of_departments` = 'n_o_f', `user_image` = '$user_image',
`user_email` = '$user_email' WHERE (`hospital_id` = '$id');");
if ($query) {
    header("location:hospitals.php");
}
?>