<?php
include('header.php');
include('config2.php');
$id = $_GET['id'];
$query = mysqli_query($connection, "select * from parents where parent_id = '$id'");
$data = mysqli_fetch_assoc($query);
$query2 = mysqli_query($connection, "select * from vaccine_status");
$query_h = mysqli_query($connection, "select * from hospital");
$queryv = mysqli_query($connection, "select * from vaccination");

// submit Query goes here in this page
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="Child.php">Child Info</a></li>
                <li class="breadcrumb-item active">Edit Record</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <form accept=".png,.jpeg,.jpg" method="post" action="update_record.php?id=<?php echo $id ?>"
        enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Kid Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="fullName" type="text" class="form-control" id="fullName"
                    value="<?php echo $data['kid_name'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Father Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="fatherName" type="text" class="form-control" value="<?php echo $data['father_name'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">vaccine status</label>
            <div class="col-md-8 col-lg-9">
                <select class="form-select mt-2 bi" name="status_id">
                    <?php
                    while ($data1 = mysqli_fetch_assoc($query2)) {
                        ?>
                        <option value="<?php echo $data1['status_id'] ?>" <?php echo $data['status_id'] == $data1['status_id'] ? "selected" : "" ?>>
                            <?php echo $data1['status_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">D-O-B</label>
            <div class="col-md-8 col-lg-9">
                <input name="D_o_b" type="text" class="form-control" value="<?php echo $data['date_of_birth'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender</label>
            <div class="col-md-8 col-lg-9">
                <input name="gender" type="text" class="form-control" value="<?php echo $data['gender'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">cnic_no</label>
            <div class="col-md-8 col-lg-9">
                <input name="cnic_no" type="text" class="form-control" value="<?php echo $data['cnic_no'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">email</label>
            <div class="col-md-8 col-lg-9">
                <input name="email" type="text" class="form-control" value="<?php echo $data['email'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">vaccination for</label>
            <div class="col-md-8 col-lg-9">
                <select class="form-select" name="vacc_id">
                    <?php
                    while ($data3 = mysqli_fetch_assoc($queryv)) {
                        ?>
                        <option value="<?php echo $data3['vaccination_id'] ?>" <?php echo $data['vaccination_id'] == $data3['vaccination_id'] ? "selected" : "" ?>>
                            <?php echo $data3['vaccination_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Hospital</label>
            <div class="col-md-8 col-lg-9">
                <select class="form-select" name="hospital_id">
                    <?php
                    while ($data2 = mysqli_fetch_assoc($query_h)) {
                        ?>
                        <option value="<?php echo $data2['hospital_id'] ?>" <?php echo $data['hospital_id'] == $data2['hospital_id'] ? "selected" : "" ?>>
                            <?php echo $data2['user_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">created_at</label>
            <div class="col-md-8 col-lg-9">
                <input name="create" type="text" class="form-control" readonly
                    value="<?php echo $data['created_at'] ?>">
            </div>
        </div>


        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</main>
<?php
include('footer.php');

?>