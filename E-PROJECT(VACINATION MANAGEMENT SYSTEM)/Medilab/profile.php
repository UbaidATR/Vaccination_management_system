<?php
include("header.php");
$id = $_SESSION['parent'];
$query = mysqli_query($connection, "select * from parents where parent_id = '$id'");
$data = mysqli_fetch_assoc($query);
$g_id = $data['parent_id'];
$query_hos = mysqli_query($connection, "
SELECT 
    p.hospital_id,
    p.status_id,
    p.vaccination_id,
    h.user_name,
    v.vaccination_name,
    s.status_name
FROM parents p
JOIN hospital h ON p.hospital_id = h.hospital_id
JOIN vaccination v ON p.vaccination_id = v.vaccination_id 
JOIN vaccine_status s ON p.status_id = s.status_id
where parent_id='$g_id'
");
$data_hos = mysqli_fetch_assoc($query_hos);
?>
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Your Profile</h2>

                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <form action="#" class="form-control p-3 mx-auto w-75">
            <a class="mt-3" style="text-decoration:underline;" href="edit.php?id=<?php echo $g_id?>">Edit Profile</a><br>
                <label class="text-info  w-50" for="Name">
                    kid name
                    <input readonly class="form-control" type="text" name="kid" value="<?php echo $data['kid_name'] ?>"
                        id="">
                </label>
                <label class="text-info  w-50" for="Name">
                    father_name
                    <input readonly class="form-control" type="text" name="kid"
                        value="<?php echo $data['father_name'] ?>" id="">
                </label>
                <br>
                <label class="text-info w-50" for="Name">
                    D_O_B
                    <input readonly class="form-control " type="text" name="kid"
                        value="<?php echo $data['date_of_birth'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    gender
                    <input readonly class="form-control " type="text" name="kid" value="<?php echo $data['gender'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    cnic_no
                    <input readonly class="form-control " type="text" name="kid" value="<?php echo $data['cnic_no'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    email
                    <input readonly class="form-control " type="text" name="kid" value="<?php echo $data['email'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    hospital
                    <input readonly class="form-control " type="text" name="kid"
                        value="<?php echo $data_hos['user_name'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    vaccination For
                    <input readonly class="form-control " type="text" name="kid"
                        value="<?php echo $data_hos['vaccination_name'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    vaccine status
                    <input readonly class="form-control " type="text" name="kid"
                        value="<?php echo $data_hos['status_name'] ?>">
                </label>
                <label class="text-info w-50" for="Name">
                    
                    
                </label>

            </form>
        </div>
    </section>

</main><!-- End #main -->
<?php
include("footer.php");
?>