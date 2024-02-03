<?php
include('header.php');
$id = $_GET['id'];
$query_v = mysqli_query($connection, "select * from vaccination");
$query_s = mysqli_query($connection, "select * from vaccine_status");
$query_h = mysqli_query($connection, "select * from hospital");

$query = mysqli_query($connection, "select * from parents where parent_id = '$id' ");
$data = mysqli_fetch_assoc($query);
if(isset($_POST['update_profile'])){
    $kid = $_POST['kid'];
    $father = $_POST['father'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $d_o_b = $_POST['d_o_b'];
    $pass = $_POST['password'];
    $cnic = $_POST['cnic'];
    $hospital = $_POST['hospital'];
    $vaccine = $_POST['vaccine'];
    $status = $_POST['status'];
    $query_chk = mysqli_query($connection, "SELECT * FROM parents WHERE email = '$email' AND parent_id != '$id'");
    $data_chk=mysqli_fetch_assoc($query_chk);
    if(mysqli_num_rows($query_chk)>0){
        echo "<script>alert('Email has been alredy taken')</script>";
    }else{
    $query=mysqli_query($connection,"UPDATE `vaccinations_system`.`parents` SET `hospital_id` = '$hospital', `kid_name` = '$kid', `father_name` = '$father', 
    `date_of_birth` = '$d_o_b', `gender` = '$gender', `cnic_no` = '$cnic', `email` = '$email', 
    `vaccination_id` = '$vaccine', `status_id` = '$status', `password` = '132' WHERE (`parent_id` = '$id');
    ");
    if ($query) {
        echo "<script>if(confirm('Your has been updated')){
            document.location.href='index.php';
        }</script>";
    }
    };
}
?>
<form style="margin-top:3rem;" class="form-control bg-transparent w-50 mt-5 mx-auto pt-5" action="#" method="post" enctype=" multipart/form-data">
    <h1 class="text-center text-white">Sign UP your self</h1>
    <label class="w-100 mt-2" for="name">
        Kid Name
        <input type="text" name="kid" placeholder="enter kid name" value="<?php echo $data['kid_name']?>" required class="form-control mt-1 ">
    </label>
    <label class="w-100 mt-2" for="name">
        Father / mother Name
        <input type="text" name="father" placeholder="enter father name" required value="<?php echo $data['father_name']?>" class="form-control mt-1">
    </label>
    <label class="w-100 mt-2" for="name">
        Email
        <input type="emial" name="email" placeholder="enter your email" required value="<?php echo $data['email']?>" class="form-control mt-1">
    </label>
    <label class="w-100 mt-2" for="name">
        D_O_B
        <input type="text" name="d_o_b" placeholder="enter your d_o_b" required value="<?php echo $data['date_of_birth']?>" class="form-control mt-1">
    </label>
    <label class="w-100 mt-2" for="name">
        gender
        <input type="text" name="gender" placeholder="enter your gender" required value="<?php echo $data['gender']?>" class="form-control mt-1">
    </label>
    <label class="w-100 mt-2" for="name">
        password
        <input type="text" min="8" name="password" placeholder="enter your password" required value="<?php echo $data['password']?>" class="form-control mt-1">
    </label>
    <label class="w-100 mt-2" for="name">
        CNIC_NO
        <input type="number" name="cnic" placeholder="enter your cnic" required value="<?php echo $data['cnic_no']?>" class="form-control mt-1">
    </label>
    
    <label class="w-100 mt-2" for="name">
        hospital
        <select name="hospital" class="form-select mt-1" required>

        <?php
        while ($data_h = mysqli_fetch_assoc($query_h)) {
            ?>
            <option value="<?php echo $data_h['hospital_id'] ?>" <?php echo $data_h['hospital_id'] == $data['hospital_id'] ? "selected" : "" ?>>
                <?php echo $data_h['user_name'] ?>
            </option>
            <?php
        }
        ?>
    </select>
    </label>
    <label class="w-100 mt-2" for="name">
       Vaccination
        <select name="vaccine" class="form-select mt-1" required>

        <?php
        while ($data_v = mysqli_fetch_assoc($query_v)) {
            ?>
            <option value="<?php echo $data_v['vaccination_id'] ?>" <?php echo $data_v['vaccination_id'] == $data['vaccination_id'] ? "selected" : "" ?>>
                <?php echo $data_v['vaccination_name'] ?>
            </option>
            <?php
        }
        ?>
    </select>
    </label>
    <label class="w-100 mt-2" for="name">
        Vaccine Status
        
        <select name="status" class="form-select mt-1" required>
    
            <?php
            while ($data_s = mysqli_fetch_assoc($query_s)) {
                ?>
                <option value="<?php echo $data_s['status_id'] ?>" <?php echo $data_s['status_id'] == $data['status_id'] ? "selected" : "" ?>>
                    <?php echo $data_s['status_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
    </label>
    <br>
    <input type="button" value="Update"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn text-dark btn-outline-warning mt-3">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you want to update the profile
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update_profile" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php 
include("footer.php")
?>