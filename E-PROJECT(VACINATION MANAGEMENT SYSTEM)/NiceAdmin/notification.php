<?php
include("header.php");
$query = mysqli_query($connection, "
SELECT
  a.appointment_id AS a_id,
  a.booked_at,
  a.status,
  a.booked_at as created_at,
  p.email AS user_name,
  CASE WHEN a.appointment_id IS NOT NULL THEN 'appointments' ELSE 'hospital' END AS signup_source,
  p.father_name AS name
FROM appointments a
JOIN hospital h ON h.hospital_id = a.hospital_id
JOIN parents p ON p.parent_id = a.parent_id
WHERE a.status = 'pending';
");
$query_h_a = mysqli_query($connection, "
SELECT
  hospital.user_name,
  hospital.status,
  hospital.created_at,

  hospital.hospital_id AS id,
  'hospital' AS signup_source
FROM hospital
WHERE hospital.status = 'pending';
")
    ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Notification</li>
            </ol>
        </nav>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>User name</th>
                <th>Request For</th>
                <th>status</th>
                <th>Created_AT</th>
                <th>Accept</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['user_name'] ?>
                    </td>
                    <td>
                        <?php echo $row['signup_source'] ?>
                    </td>
                    <td>
                        <?php echo $row['status'] ?>
                    </td>
                    <td>
                        <?php echo $row['created_at'] ?>
                    </td>
                    <td>
                        <a href="accept.php?accept_id_p=<?php echo $row['a_id']; ?>">
                            <i class="fa fa-check-circle text-success"></i>
                        </a>

                    </td>

                    <td>
                        <a href="accept.php?reject_id_p=<?php echo $row['a_id'] ?>"><i
                                class="bi bi-x-circle text-danger"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <?php
            while ($data_p_2 = mysqli_fetch_assoc($query_h_a)) {
                ?>
                <tr>
                    <td>
                        <?php echo $data_p_2['user_name'] ?>
                    </td>
                    <td>
                        <?php echo $data_p_2['signup_source'] ?>
                    </td>
                    <td>
                        <?php echo $data_p_2['status'] ?>
                    </td>
                    <td>
                        <?php echo $data_p_2['created_at'] ?>
                    </td>
                    <td>
                        <a href="accept.php?accept_id_h=<?php echo $data_p_2['id']; ?>">
                            <i class="fa fa-check-circle text-success"></i>
                        </a>

                    </td>

                    <td>
                        <a href="accept.php?reject_id_h=<?php echo $data_p_2['id'] ?>"><i
                                class="bi bi-x-circle text-danger"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>
<?php
include("footer.php");
?>
<!-- 
    SELECT
  parents.father_name,
  parents.email,
  parents.
  CASE
    WHEN parents.parent_id IS NOT NULL THEN 'parents'
    ELSE 'hospital'
  END AS signup_source
FROM parents
WHERE parents.status = 'pending'
UNION
SELECT
  hospital.user_name,
  hospital.status,
  hospital.hospital_id AS id,
  'hospital' AS signup_source
FROM hospital
WHERE hospital.status = 'pending';
 -->