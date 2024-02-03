<?php
include("config.php");
session_start();
if(isset($_SESSION['parent'])){
    header("location:index.php");
}
$query_v = mysqli_query($connection, "select * from vaccination");
$query_s = mysqli_query($connection, "select * from vaccine_status");
$query_h = mysqli_query($connection, "select * from hospital");


if (isset($_POST['signup'])) {
    $kid = $_POST['kid'];
    $father = $_POST['father'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $d_o_b = $_POST['d_o_b'];
    $pass = $_POST['password'];
    $cnic = $_POST['cnic'];
    $hospital = $_POST['hospital'];
    $vaccine = $_POST['vaccine'];
    $status = $_POST['status'];
    $chk = mysqli_query($connection, "select email from parents where email = '$email'");
    $data_chk = mysqli_fetch_assoc($chk);
    if (mysqli_num_rows($chk) > 0) {
        echo "<script>alert('email has been already taken')</script>";
    } else {
        $query_insert = mysqli_query($connection, "INSERT INTO `vaccinations_system`.`parents` (`hospital_id`,`kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`, `status_id`,`password`) 
    VALUES ('$hospital','$kid', '$father', '$d_o_b', '$gender', '$cnic', '$email', '$vaccine', '$status','$pass');");
    $query_get_id=mysqli_query($connection,"select parent_id from parents where email = '$email'");
    $query_get_id_data=mysqli_fetch_assoc($query_get_id);
    $_SESSION['parent']=$query_get_id_data['parent_id'];
        header("location:index.php");
    }
    ;
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">
    <form class="form-control bg-transparent w-50 mx-auto" action="#" method="post" enctype=" multipart/form-data">
        <h1 class="text-center text-white">Sign UP your self</h1>
        <input type="text" name="kid" placeholder="enter kid name" required class="form-control mt-3">
        <input type="text" name="father" placeholder="enter father name" required class="form-control mt-3">
        <input type="emial" name="email" placeholder="enter your email" required class="form-control mt-3">
        <input type="text" name="d_o_b" placeholder="enter your d_o_b" required class="form-control mt-3">
        <input type="text" name="gender" placeholder="enter your gender" required class="form-control mt-3">
        <input type="password" min="8" name="password" placeholder="enter your password" required
            class="form-control mt-3">
        <input type="number" name="cnic" placeholder="enter your cnic" required class="form-control mt-3">
        <select name="hospital" class="form-select mt-3" required>

            <?php
            while ($data_h = mysqli_fetch_assoc($query_h)) {
                ?>
                <option value="<?php echo $data_h['hospital_id'] ?>">
                    <?php echo $data_h['user_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <select name="vaccine" class="form-select mt-3" required>

            <?php
            while ($data_v = mysqli_fetch_assoc($query_v)) {
                ?>
                <option value="<?php echo $data_v['vaccination_id'] ?>">
                    <?php echo $data_v['vaccination_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <select name="status" class="form-select mt-3" required>

            <?php
            while ($data_s = mysqli_fetch_assoc($query_s)) {
                ?>
                <option value="<?php echo $data_s['status_id'] ?>">
                    <?php echo $data_s['status_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="signup" name="signup" class="mt-3 btn btn-success">
        <a href="login.php">have an account!</a>
    </form>

</body>

</html>