<?php
include('header.php');

?>
<style>
  #file-input {
    display: block;
    width: 100%;
    height: 30px;
    padding: 6px 12px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  #file-input::-webkit-file-upload-button {
    display: none;
  }

  #file-input label {
    font-size: 16px;
    font-weight: 600;
    color: #666;
    cursor: pointer;
  }

  #file-input label i {
    font-size: 24px;
    margin-right: 10px;
  }
</style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="image/<?php echo $data['profile_image'] ?>" style="height:150px;width:220px" alt="Profile"
              class="rounded-circle">
            <h2>
              <?php echo $data['name'] ?>
            </h2>
            <h3>
              <?php echo $data['job_title'] ?>
            </h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab"
                  data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">
                  <?php echo $data['About'] ?>
                </p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['name'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['Company'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['job_title'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['country'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['address'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['phone'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $data['email'] ?>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form accept=".png,.jpeg,.jpg" method="post" action="edit_profile.php" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img style="height: 130px; width:150px" src="image/<?php echo $data['profile_image'] ?>"
                        alt="Profile">
                      <div class="pt-2">
                        <label for="file-upload">
                          <i class="bi bi-arrow-up-short btn btn-danger btn-sm" title="Upload new Profle picture"></i>
                          <span class="text-info"></span>
                        </label>
                        <input type="file" value="<?php echo $data['profile_image'] ?>" id="file-upload" name="image"
                          style="display: none;" accept=".jpg,.jpeg,.png">

                        <script>
                          document.getElementById('file-upload').addEventListener('click', function openFileUploader() {
                            document.getElementById('file-upload').click();
                          });
                        </script>
                        <a data-bs-toggle="modal" id="<?php echo $data['id'] ?>" data-bs-target="#exampleModal"
                          class="btn btn-danger del_ btn-sm" title="Remove my profile image"><i
                            class="bi bi-trash"></i></a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Profile Image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Are you sure to want to delete the profile picture...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="delete.php?id=" id="del" class="btn btn-danger">Delete
                                  profile</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                          let del_btn = document.querySelector('.del_');
                          let del_btnn = document.querySelector('#del');
                          del_btn.addEventListener('click', function () {
                            del_btnn.href = 'delete_profile.php?id=' + this.id;
                          })
                        </script>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName"
                        value="<?php echo $data['name'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about"
                        style="height: 100px"><?php echo $data['About'] ?></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="company" type="text" class="form-control" id="company"
                        value="<?php echo $data['Company'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job"
                        value="<?php echo $data['job_title'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country"
                        value="<?php echo $data['country'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address"
                        value="<?php echo $data['address'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone"
                        value="<?php echo $data['phone'] ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email"
                        value="<?php echo $data['email'] ?>">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form  method="post" action="change_password.php" onsubmit="return valid()">
                  <script>
                    function valid(){
                      var passwo = document.getElementById('newPassword').value;
                      var conpass = document.getElementById('renewPassword').value;
                      if (passwo == '') {
                        document.getElementById('error_5').innerHTML = "please add the password.";
                        return false;
                      }
                      if (passwo.length < 8) {
                        document.getElementById("error_5").innerHTML = "please enter minimum 8 digit password."
                        return false;
                      }
                      if (conpass == "") {
                        document.getElementById('error_6').innerHTML = "please fill this field.";
                        return false;
                      }
                      if (conpass !== passwo) {
                        document.getElementById("error_6").innerHTML = "confirmation is not same.";
                        return false;
                      }
                    }
                  </script>
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>
                  <?php
                  if(isset($_SESSION['error'])){
                    ?>
                    <span style="color:red;position:absolute;font-size:0.8rem; left:11.7rem;top:7.4rem;">
                    <?php echo $_SESSION['error'] ?>
                  </span>
                    <?php
                  }
                  ?>
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <span id="error_5" style="color:red;position:absolute;font-size:0.8rem; left:11.7rem;top:10.6rem;">                   
                  </span>
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>
                  <span id="error_6" style="color:red;position:absolute;font-size:0.8rem; left:11.7rem;top:14.4rem;">                   
                  </span>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include('footer.php');
?>