<?php
include ('connection.php');

session_start();
$new = $_SESSION['name'];
$query = "Select * from hospital where user_name = '$new' ";
$result = mysqli_query($connection, $query );


if(!isset($_SESSION['name'])){
  header("location:login.php");
};

include("header.php");
 
if(isset($_POST['logout'])){
  session_destroy();
  header("location:login.php");


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
if ($result) {
  $row = mysqli_fetch_assoc($result);
} else {
  $vaccinatedParents = 0; 
}
?>
   <div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class="col-lg-6">
      <div class="card text-white mb-3" style="max-width: 36rem; box-shadow: 5px 5px 10px black;">
        <div class="card-header" style="color: black; font-size: 19px;">Hospital Information</div>
        <div class="card-body">
          <h5 class="card-title" style="color: grey;">Hospital ID: <?php echo $row['hospital_id']; ?></h5><br>
          <h6 class="card-subtitle text-muted" style="font-size: 21px;"><b>Hospital Name:</b> <?php echo $row['user_name']; ?></h6><br>
          <p class="card-text" style="color: black;"><b>Location: </b><?php echo $row['hospital_location']; ?></p>
          <p class="card-text" style="color: black;"><b>Contact Number:</b> <?php echo $row['hospital_number']; ?></p>
          <p class="card-text" style="color: black;"><b>Number of Departments:</b> <?php echo $row['number_of_departments']; ?></p>
          <p class="card-text" style="color: black;"><b>Email Address:</b> <?php echo $row['user_email']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 mb-lg-0">
      <div class="appointment-image-holder ml-0 ml-lg-4">
        <figure>
          <img loading="lazy" class="w-100" src="images/background/appnew.jpg" alt="Appointment">
        </figure>
      </div>
    </div>
  </div>
</div>

    
<br><br><br>
<?php
include("footer.php");?>
</body>
</html>