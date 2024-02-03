<?php
include('config2.php');
include('header.php');
$search_query = $_GET['search_query'];
$query = mysqli_query($connection, "
SELECT father_name as name, email,parent_id as id, gender as status, 'parents' AS source
FROM parents
WHERE father_name LIKE '%$search_query%' or kid_name like '%$search_query%'
UNION
SELECT user_name as name, user_email  AS email,hospital_id as id,status,  'hospital' AS source
FROM hospital
WHERE user_name LIKE '%$search_query%'

");
?>
<main class="main" id="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Seacrh page</li>
            </ol>
        </nav>
    </div>
    <?php
    if (mysqli_num_rows($query) > 0) {
        ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>user_name</th>
                    <th>Email</th>
                    <th>Source</th>
                    <th>
                        Edit data
                    </th>
                    <th>Check record</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $data['name'] ?>
                        </td>
                        <td>
                            <?php echo $data['email'] ?>
                        </td>
                        <td>
                            <?php echo $data['source'] ?>
                        </td>
                        <td>
                            <a href="<?php
                            if ($data['source'] == 'parents') {
                                echo "edit_record.php";
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'pending') {
                                echo "notification.php";
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'active') {
                                echo "edit_hospitals.php";
                            }
                            ?>?id=<?php
                            if ($data['source'] == 'parents') {
                                echo $data['id'];
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'active') {
                                echo $data['id'];
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'pending') {
                                echo 'khair_nal_aa_ty_khair_nal_ja';
                            }
                            ?>">
                                <?php
                                if ($data['source'] == 'parents') {
                                    echo "Edit_Parent";
                                } elseif ($data['source'] == 'hospital' and $data['status'] == 'pending') {
                                    echo "more_info";
                                } elseif ($data['source'] == 'hospital' and $data['status'] == 'active') {
                                    echo "edit Hosiptal";
                                }
                                ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php
                            if ($data['source'] == 'parents') {
                                echo "child.php";
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'pending') {
                                echo "notification.php";
                            } elseif ($data['source'] == 'hospital' and $data['status'] == 'active') {
                                echo "hospitals.php";
                            }
                            ?>">
                                Check record
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
        <?php
    } else {
        ?>
        <p>no data found</p>
        <?php
    }
    ?>
</main>
<?php
include('footer.php');
?>