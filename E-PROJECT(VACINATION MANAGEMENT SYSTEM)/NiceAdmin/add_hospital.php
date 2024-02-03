<?php
include('config2.php');
$name=$_POST['hospital'];
$h_l=$_POST['h_l'];
$pass=$_POST['password'];
$N_O_F=$_POST['N_O_F'];
$Contact=$_POST['Contact'];
$email=$_POST['email'];
$query=mysqli_query($connection,"INSERT INTO `vaccinations_system`.`hospital` (`user_name`, `user_password`, `hospital_location`, `hospital_number`, `number_of_departments`, `user_email`) 
VALUES ('$name', '$pass', '$h_l', '$Contact', '$N_O_F','$email');");
if ($query) {
    $_SESSION['hospital_confrimation'];
}
header("Location:hospitals.php");
?>