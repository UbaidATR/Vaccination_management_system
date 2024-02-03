<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $query = mysqli_query($connection, "select * from parents where email ='$email' and password =  '$pass'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['parent'] = $data['parent_id'];
        header("location:index.php");
    } else {
        echo "<script>alert('Email or password is incorrect')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
<div style="height:100vh;" class="container-fluid bg-dark d-flex justify-content-center align-items-center">
    <form action="#" class="form-control w-50" method="post">
        <b><i>Welcome to Parental Login</i></b><br>
        <span class="text-center">Verify your self to continue</span>
        <input type="emial" name="email" placeholder="enter your email" required class="form-control mt-3">
        <input type="password" min="8" name="pass" placeholder="enter your password" required
            class="form-control mt-3">
        <input type="submit" value="Login" name="login" class="btn btn-success mt-3">
<a href="signup.php">create an account!</a>
    </form>
</div>
</body>
</html>




