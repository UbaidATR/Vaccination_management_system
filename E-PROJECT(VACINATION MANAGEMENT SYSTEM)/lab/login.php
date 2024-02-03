<?php 
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background-color: rgb(228, 247, 248);">

<!-- form -->
<div class="hero" style="height:505px; width:515px;position: fixed;top: 8%; left: 480px;box-shadow:3px 3px 13px black;">
<div class="login-box" style="width: 350px;position: fixed;top: 30%; left: 41%;height: 500px;" >

    <form action="" method="post">
    <h3 style="position: fixed;top:20%; left: 42%;"> LOG-IN YOURSELF !</h3>
        <input type="text" class="form-control mt-1" name="user" placeholder="user email" required >
      
        <input type="password"class="form-control mt-1" name ="pass" placeholder="password" required >
        <br><br>
        <button type= "submit" name="login" class="form-control mt-1 btn-warning"> log-in</button>
    </form>
    <p style="font-size: 16px; margin-top: 20px;">Don't Have An Account?<a href="index.php"> SIGN-UP</a> Now..</p>
    <br>
</div>
</div>
    <?php
    session_start();
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = mysqli_query ($connection , "select * from hospital where user_email = '$user' AND user_password = '$pass'");

     if($query-> num_rows >0){
        echo "hello";
        $_SESSION['name'] = $user;
        header("Location:hospital.php");

     }  
     else{
        echo "<script>alert('LOGIN FAILED')</script>";
     } 
    }
 
    
    ?>
    
</body>
</html>