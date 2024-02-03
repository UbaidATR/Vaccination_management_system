<?php
include('config2.php');
include('header.php');
$query = mysqli_query($connection, "select * from vaccination");
?>
<main style="height:80vh" id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Vaccine List</li>
            </ol>
        </nav>
    </div>
    <div style="height:60vh;overflow:scroll;">

    <table class="table table-striped table-bordered w-75 mx-auto">
        <h1 class="text-center"><u>List of vaccines</u></h1>

        <tr>
            <th>#S_no</th>
            <th>List Of vaccines</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                    <td>
                        <?php echo $data['vaccination_id'] ?>
                    </td>
                    <td>
                        <?php echo $data['vaccination_name'] ?>
                    </td>
                    <td>
                        <a href="vaccine_editor.php?id=<?php echo $data['vaccination_id'] ?>" class="text-success">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="vaccine_del.php?id=<?php echo $data['vaccination_id'] ?>" class="text-success">
                            Delete
                        </a>


                    </td>
                </tr>

                <?php
            }
            ?>
            <a href="add_vaccine.php">Add Vaccines
            </a>
        </tbody>
    </table></div>
    <script>

    </script>
</main>
<?php
include('footer.php');
?>