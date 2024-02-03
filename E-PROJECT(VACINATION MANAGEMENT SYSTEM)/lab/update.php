<?php
include("connection.php");
$parent_id = $_GET['parent_id'];
if(isset($_POST['update'])){
    $parent_id = $_GET['parent_id'];
    $status_id = $_POST['status_id'];
  
    $updatequery = mysqli_query($connection,"UPDATE parents SET `status_id`='$status_id' where parent_id = '$parent_id'");
    header("Location:welcome.php");
}

$query = "Select status_id from parents where parent_id = $parent_id";
$result = mysqli_query($connection, $query);
$all_data = mysqli_fetch_array($result);

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
    
<div class="singup-box" style="width:50%; position: fixed; top: 30%; left: 35%; height: 400px;" >
<h3 style=" position: fixed;left: 39.5%;top: 30%; "> Update The Status !</h3>
<form action="" method="post" style="position: fixed;top: 45%;width:30%; " > 

<select class="form-select form-control mt-1" name="status_id">
            <!-- <option value="">Select Status</option> -->
            <option value="1" <?php if($all_data['status_id'] == 1) echo 'selected="selected"'; ?>>Not Vaccinated</option>
            <option value="2" <?php if($all_data['status_id'] == 2) echo 'selected="selected"'; ?>>Vaccinated</option>
            <option value="3" <?php if($all_data['status_id'] == 3) echo 'selected="selected"'; ?>>Missed</option>
           </select>
      
        <button type= "submit" name="update" class="form-control mt-1 btn-warning"> upadate</button>
    </form>
</body>
</html>