<?php 
include('config2.php');
$id=$_GET['id'];
$query=mysqli_query($connection,"delete from vaccination where vaccination_id = '$id'");
if($query){
    header("location:vaccine_list.php");
}
?>