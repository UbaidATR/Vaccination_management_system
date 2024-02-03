<?php
include('connection.php');
session_start();

if (!isset($_SESSION['name'])) {
    header("location:login.php");
}
;
$user = $_SESSION['name'];
$query = "Select * from hospital";
$result = mysqli_query($connection, $query);

$query1 = "
SELECT
  h.user_name,
  p.parent_id,
  p.hospital_id,
  h.user_name,
  p.kid_name,
  p.father_name,
  p.date_of_birth,
  p.gender,
  p.cnic_no,
  p.email,
  v.vaccination_name,
  s.status_name
FROM parents p
JOIN hospital h ON p.hospital_id = h.hospital_id
JOIN vaccination v ON p.vaccination_id = v.vaccination_id
JOIN vaccine_status s ON p.status_id = s.status_id
WHERE
  h.user_email = '$user'
  AND s.status_id = 1

";
$result1 = mysqli_query($connection, $query1);

$query2 = "SELECT p.parent_id,h.hospital_id, p.kid_name,p.father_name,p.date_of_birth,p.gender,p.cnic_no,p.email,h.user_name,v.vaccination_name,s.status_name
FROM parents p JOIN hospital h ON p.hospital_id = h.hospital_id JOIN vaccination v ON p.vaccination_id = v.vaccination_id
LEFT JOIN vaccine_status s ON p.status_id = s.status_id WHERE h.user_email = '$user' ";
$result2 = mysqli_query($connection, $query2);
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>

<body>
    <?php

    $new = $_SESSION['name'];
    $newquery = mysqli_query($connection, "select * from hospital where user_email = '$new' ");
    $filter = mysqli_fetch_assoc($newquery);
    // echo $filter[''];


    if (isset($_POST['logout'])) {
        session_destroy();
        header("location:login.php");
    }

    ?>
    <br><br><br><br>
    <br><br>
   <div class="d-flex justify-content-center ">
        <img class="circle" alt=" LOGO " style="border-radius:50%; width:200px;height:200px;" src="pictures/<?php echo $filter['user_image'] ?>">
        <br>
    </div>

 
    <br>
    <div class="section-title">
          <h2>NOT VACCINATED</h2>
        </div>

    <div class="container" style="width:100vw">
        <table class="table table-bordered w-100 mx-auto mt-1">
            <thead>
                <tr>
                    <th>Recipt No.</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>D.O.B</th>
                    <th>Gender</th>
                    <th>Cnic No.</th>
                    <th>Email</th>
                    <th>Vaccination Name</th>
                    <th>Vaccination Status</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data2 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $data2['parent_id'] ?>
                        </td>
                        <td>
                            <?php echo $data2['kid_name'] ?>
                        </td>
                        <td>
                            <?php echo $data2['father_name'] ?>
                        </td>
                        <td>
                            <?php echo $data2['date_of_birth'] ?>
                        </td>
                        <td>
                            <?php echo $data2['gender'] ?>
                        </td>
                        <td>
                            <?php echo $data2['cnic_no'] ?>
                        </td>
                        <td>
                            <?php echo $data2['email'] ?>
                        </td>
                        <td>
                            <?php echo $data2['vaccination_name'] ?>
                        </td>
                        <td>
                            <?php echo $data2['status_name'] ?>
                        </td>
                        <td><a href="update.php?parent_id=<?php echo $data2['parent_id']; ?>">Edit</a></td>


                    </tr>
                    <?php
                }
                ?>
                </tr>


            </tbody>
        </table>



    </div>



<br><br>

    <!-- table -->
    <div class="section-title">
          <h2>ALL RECORD</h2>
        </div>
    <div class="container" style="width:100vw">
        <table class="table table-bordered w-77 mx-auto ">
            <thead>
                <tr>
                    <th>Recipt No.</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Cnic No.</th>
                    <th>Email</th>
                    <th>Vaccination Name</th>
                    <th>Vaccination Status</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result2)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $data['parent_id'] ?>
                        </td>
                        <td>
                            <?php echo $data['kid_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['father_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['date_of_birth'] ?>
                        </td>
                        <td>
                            <?php echo $data['gender'] ?>
                        </td>
                        <td>
                            <?php echo $data['cnic_no'] ?>
                        </td>
                        <td>
                            <?php echo $data['email'] ?>
                        </td>
                        <td>
                            <?php echo $data['vaccination_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['status_name'] ?>
                        </td>
                        <td><a href="update.php?parent_id=<?php echo $data['parent_id']; ?>">Edit</a></td>


                    </tr>
                    <?php
                }
                ?>
                </tr>


            </tbody>
        </table>
    </div>

    <br><br><br><br><br><br><br><br>
    <?php
    include("footer.php");
    ?>

</body>

</html>