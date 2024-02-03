<?php
include("header.php");
include("config2.php");
$query_B = mysqli_query($connection, "
    SELECT
    h.user_name AS main_hospital_name,
    p.email,  
    v.vaccination_name AS V_N,
    date,
    booked_by,
    booked_at
FROM appointments a
JOIN hospital h ON a.hospital_id = h.hospital_id
JOIN vaccination v ON a.vaccination_id = v.vaccination_id
JOIN parents p ON a.parent_id = p.parent_id
where a.status='active'
");
?>
<main style="height:80vh" id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Booking Details</li>
            </ol>
        </nav>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Hospital Name</th>
                <th>Parental Email</th>
                <th>vaccination for</th>
                <th>Booked Date</th>
                <th>Booked By</th>
                <th>Date / Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data_B = mysqli_fetch_assoc($query_B)) {
                ?>
                <tr>
                    <td>
                        <?php echo $data_B['main_hospital_name'] ?>
                    </td>
                    <td>
                        <?php echo $data_B['email'] ?>
                    </td>
                    <td>
                        <?php echo $data_B['V_N'] ?>
                    </td>
                    <td>
                        <?php echo $data_B['date'] ?>
                    </td>
                    <td>
                        <?php echo $data_B['booked_by'] ?>
                    </td>
                    <td>
                        <?php echo $data_B['booked_at'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>
<?php
include("footer.php")
    ?>