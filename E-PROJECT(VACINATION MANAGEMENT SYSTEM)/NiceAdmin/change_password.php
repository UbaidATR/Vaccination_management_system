<?php
include('config2.php');
session_start();
$id = $_SESSION['Admin_ID'];
$pass = $_POST['password'];
$newpass = $_POST['newpassword'];
$renewpass = $_POST['renewpassword'];

$query = mysqli_query($connection, "select * from admin where id = '$id' and password = '$pass'");
if (mysqli_num_rows($query) > 0) {
    $_SESSION['error'] = '';
    if ($newpass == $renewpass) {
        $query2 = mysqli_query($connection, "UPDATE `vaccinations_system`.`admin` SET
     `password` = '$newpass' WHERE (`id` = '$id');");
        header("location:user_profile.php");
    } else {
        header("location:user_profile.php");
        // header("location:user_profile.php");
    }  
} else {
    $_SESSION['error'] = 'your current password is not match';
    header("location:user_profile.php");
}
;
?>