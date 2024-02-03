<?php
include('config2.php');
include('header.php');
$id_h = $_GET['id'];
$query = mysqli_query($connection, "select * from hospital where hospital_id='$id_h'");
$data_hh = mysqli_fetch_assoc($query);
if (!isset($_SESSION['edit_token'])) {
  header("location:hospitals.php");
} else {
  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="hospitals.php">Hospital List</a></li>
          <li class="breadcrumb-item active">Edit Hospital <i>
              <?php echo $data_hh['user_name'] ?>
            </i></li>
        </ol>
      </nav>
    </div>
    <form action="hospital_edit_php.php" method="post">
      <input type="number" name="id" value="<?php echo $id_h ?>" style="display:none;">
      <div class="row mb-3">
        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
        <div class="col-md-8 col-lg-9">
          <input name="user_name" type="text" class="form-control" id="fullName"
            value="<?php echo $data_hh['user_name'] ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password</label>
        <div class="col-md-8 col-lg-9">
          <input name="user_password" type="text" class="form-control" id="fullName"
            value="<?php echo $data_hh['user_password'] ?>">
        </div>
      </div>



      <div class="row mb-3">
        <label for="company" class="col-md-4 col-lg-3 col-form-label">hospital_location</label>
        <div class="col-md-8 col-lg-9">
          <input name="hospital_location" type="text" class="form-control" id="hospital_location"
            value="<?php echo $data_hh['hospital_location'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">hospital_number</label>
        <div class="col-md-8 col-lg-9">
          <input name="hospital_number" type="text" class="form-control" id="hospital_number"
            value="<?php echo $data_hh['hospital_number'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Country" class="col-md-4 col-lg-3 col-form-label">number_of_departments</label>
        <div class="col-md-8 col-lg-9">
          <input name="number_of_departments" type="text" class="form-control" id="Country"
            value="<?php echo $data_hh['number_of_departments'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Address" class="col-md-4 col-lg-3 col-form-label">user_image</label>
        <div class="col-md-8 col-lg-9">
          <input name="user_image" type="text" class="form-control" id="user_image"
            value="<?php echo $data_hh['user_image'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">user_email</label>
        <div class="col-md-8 col-lg-9">
          <input name="user_email" type="email" class="form-control" id="user_email"
            value="<?php echo $data_hh['user_email'] ?>">
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </main>
  <?php
}
?>
<?php
include('footer.php');
?>