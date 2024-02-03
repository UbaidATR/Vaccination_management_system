<?php
include("config2.php");
$id = $_GET['id'];
$name = $_POST['fullName'];
$fname = $_POST['fatherName'];
$status_id = $_POST['status_id'];
$D_o_b = $_POST['D_o_b'];
$gender = $_POST['gender'];
$cnic_no = $_POST['cnic_no'];
$email = $_POST['email'];
$vacc_id = $_POST['vacc_id'];
$hospital_id = $_POST['hospital_id'];
$create = $_POST['create'];
$Update_query = mysqli_query($connection, "UPDATE `vaccinations_system`.`parents` SET `hospital_id` = '$hospital_id', `kid_name` = '$name', `father_name` = '$fname',
 `date_of_birth` = '$D_o_b',`gender` = '$gender', `cnic_no` = '$cnic_no', `email` = '$email', `vaccination_id` = '$vacc_id', `status_id` = '$status_id',
  `created_at` = '$create'
  WHERE (`parent_id` = '$id');");
  header("location:Child.php");
?>