<?php
include('header.php');
include('config2.php');
if (isset($_POST['add'])) {
    $vaccine = $_POST['vaccine'];
    $query = mysqli_query($connection, "INSERT INTO `vaccinations_system`.`vaccination` (`vaccination_name`) VALUES ('$vaccine');");
    if ($query) {
        echo "<script>
        if (confirm('The vaccine has been added')) {
            window.location.href = 'vaccine_list.php';
        }
        </script>";
    }
}
?>
<main class="main" id="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vaccine_list.php">Vaccine List</a></li>
                <li class="breadcrumb-item active">Add Vaccine</li>
            </ol>
        </nav>
    </div>
    <form action="" method="post">
        <input type="text" name="vaccine" placeholder="Enter the vaccine name">
        <input type="submit" value="submit" name="add">
    </form>
</main>
<?php
include('footer.php');
?>