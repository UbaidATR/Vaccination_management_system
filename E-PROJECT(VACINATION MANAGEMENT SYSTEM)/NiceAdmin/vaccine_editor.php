<?php
$id_e = $_GET['id'];
include("config2.php");
include("header.php");
$queryrtv = mysqli_query($connection, "select * from vaccination where vaccination_id = '$id_e'");
$ltedata = mysqli_fetch_assoc($queryrtv);

if (isset($_POST['update'])) {
    $name = $_POST['vaccine'];
    $query2 = mysqli_query($connection, "UPDATE `vaccinations_system`.`vaccination` SET `vaccination_name` = '$name' WHERE
     (`vaccination_id` = '$id_e');");
    if ($query2) {
        echo "<script>
        if (confirm('Update completed successfully. Do you want to go to Vaccine_list.php?')) {
            window.location.href = 'Vaccine_list.php';
        }
        </script>";
    }

}
?>
<main style="height:80vh;" id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vaccine_list.php">Vaccine List</a></li>
                <li class="breadcrumb-item active">Update Vaccine  <i><?php echo $ltedata['vaccination_name'] ?></i></li>
            </ol>
        </nav>
    </div>
    <form class="form-control pb-5 p-3 w-50 mx-auto" action="" method="post">
        <h1 class="text-center">Update vaccination</h1><br><br><br>
        <input type="text" name="vaccine" value="<?php echo $ltedata['vaccination_name'] ?>">
        <input type="submit" value="Update" name="update">

    </form>
</main>
<?php
include("footer.php");
?>