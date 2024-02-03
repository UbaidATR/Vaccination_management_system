<?php
include('config2.php');
$id=$_GET['id'];
$query=mysqli_query($connection,"delete from parents where parent_id = '$id'");
header('location:Child.php');

?>