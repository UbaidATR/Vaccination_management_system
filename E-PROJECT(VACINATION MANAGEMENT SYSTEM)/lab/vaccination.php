<?php
include("connection.php");
$query = "SELECT * FROM vaccination";
$result = mysqli_query($connection,$query);
session_start();

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
<html lang="zxx">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body>
<BR><br><BR><br><BR><BR>
<div class="section-title">
          <h2>VACCINATION AVAILABLE</h2>
        </div>
<table class="table table-bordered w-50 mx-auto mt-5">
        <thead>
            <tr>
            <th class="text-center">S.no</th>
                <th class="text-center">NAME</th>
            </tr>
        </thead>
        <tbody>
           <?php
              while($data = mysqli_fetch_assoc($result)){

                $vaccination_id = $data['vaccination_id'];

            $vaccination_name = $data['vaccination_name'];
            echo '
         <tr>
            <td class="text-center">'.$vaccination_id.'</td>
            <td class="text-center">'.$vaccination_name.'</td>
           
         </tr>'
         ?>
        
        <?php
              }
           ?>    
        </tbody>
    </table>
<!--End Page Title-->

<?php
include("footer.php");
?>

</body>

</html>