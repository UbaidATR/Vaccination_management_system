<?php
   include("connection.php");
   if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hospital_location = $_POST['hospital_location'];
    $hospital_number = $_POST['hospital_number'];
    $number_of_departments = $_POST['number_of_departments'];
    $folder = "pictures/";
    $filename = basename($_FILES['user_image'] ['name']);
    $final = $folder .$filename;

     $select_query = mysqli_query($connection," select * from hospital where user_email = '$user_email'");
     if($select_query){
        move_uploaded_file($_FILES['user_image']['tmp_name'], $final);
     }
     if($select_query-> num_rows >0){
      echo "<script>alert('This email is already exist please try another one')</script>";
        
     }
 else{
    $query = "INSERT INTO hospital (hospital_id, user_name, user_email, user_password, hospital_location, hospital_number, number_of_departments, user_image) VALUES (NULL, '$user_name','$user_email', '$user_password', '$hospital_location', '$hospital_number', '$number_of_departments', '".$filename."')";


    $result = mysqli_query($connection, $query);
    header("location:hospital.php");
 }
   }
   
   ?>
   
   