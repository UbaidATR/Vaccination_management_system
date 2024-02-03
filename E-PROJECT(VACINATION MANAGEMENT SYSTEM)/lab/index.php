<?php
    include("addUser.php");
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
        <br>
        <br>
   
        <div class="singup-box" style="width:400px; position: fixed; top: 15%; left: 38%; height: 400px;" >
        <h3 style="position: fixed;top:10%; left: 39%;"> SIGN-UP YOURSELF !</h3><br>
        <form method="post" enctype = "multipart/form-data" class="form" >
        <input class="form-control mt-3" placeholder="user_name" type="text" name="user_name"  required >
        <input class="form-control mt-3" placeholder="user_email" type="email" name="user_email"  required >
        <input class="form-control mt-3" placeholder="user_password" type="password" name="user_password" required >
        <input class="form-control mt-3" placeholder="location" type="text" name="hospital_location"  required >
        <input class="form-control mt-3" placeholder="number" type="number" name="hospital_number"  required >
        <input class="form-control mt-3" placeholder="departments" type="number" name="number_of_departments"  required >
        <input class="form-control mt-3" placeholder="user_image" type="file" name="user_image">
<br>
        <input class="btn btn-dark mt-2 w-100 " type="submit" name="submit" value="Submit">
        <a href="login.php">also have an account</a>
    </form>

    
</div>

</body>
</html>