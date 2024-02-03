<?php
include('config2.php');
session_start();
$id = $_SESSION['Admin_ID'];
$query = mysqli_query($connection, "select * from admin where id = '$id'");
$data = mysqli_fetch_assoc($query);
$query_pending = mysqli_query($connection, "SELECT 
(SELECT COUNT(*) FROM appointments WHERE status = 'pending') +
(SELECT COUNT(*) FROM hospital WHERE status = 'pending') AS pending_users;
");
$data_pending = mysqli_fetch_assoc($query_pending);
$query_pending_2 = mysqli_query($connection, "
SELECT p.father_name, p.email, a.booked_at, 
h.user_name,
a.appointment_id
FROM appointments a
JOIN parents p ON p.parent_id = a.parent_id
JOIN hospital h ON h.hospital_id = a.hospital_id
WHERE a.status = 'pending';

");
$query_pending_h = mysqli_query($connection, "select * from hospital where status ='pending'");
if (isset($_SESSION['accept'])) {
  echo "<script>alert('the person has been accept')</script>";
}
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  audio {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    opacity: 0;
    /* Ensure it's above other content */
  }

  .green {
    color: green;
    font-weight: 600;
  }

  .orange {
    color: orange;
    font-weight: 600;
  }

  .red {
    color: red;
    font-weight: 600;
  }

  .c-border {
    border-bottom: 1px solid white;
  }

  #omg_i {
    width: 60px;
    height: 60px;
    border-radius: 50%;
  }
</style>

<body>
  <?php


  ?>
  <?php
  if (!isset($_SESSION['Admin_ID'])) {
    header("location:login.php");
  } else {


    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="search.php">
          <input type="text" name="search_query" id="search_box" autocomplete="off" placeholder="Search"
            title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" id="notification-dropdown" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">
                <?php echo $data_pending['pending_users'] ?>
              </span>
            </a><!-- End Notification Icon -->

            <ul style="height:20rem;overflow:scroll;"
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have
                <?php echo $data_pending['pending_users'] ?> new notifications
                <a href="notification.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <?php
              while ($data_pending2 = mysqli_fetch_assoc($query_pending_2)) {
                ?>
                <li class="notification-item">
                  <i class="bi bi-exclamation-circle text-warning"></i>
                  <div>
                    <h4>
                      <?php echo $data_pending2['father_name'] ?>
                    </h4>
                    <p>
                      <?php echo $data_pending2['email'] ?>
                    </p>
                    <span style="font-size:11px;">Appointment</span>
                    <span style="font-size:12px;">request for <b>
                        <?php echo $data_pending2['user_name'] ?>
                      </b></span> <br>
                    <span style="font-size:12px;">Hospital</span>
                    <div class="d-flex align-items-center">
                      <p>
                        <?php echo $data_pending2['booked_at'] ?>
                      </p>
                      <a href="accept.php?reject_id_p=<?php echo $data_pending2['appointment_id'] ?>"><i
                          class="bi bi-x-circle text-danger"></i></a>
                      <a href="accept.php?accept_id_p=<?php echo $data_pending2['appointment_id'] ?>"><i
                          class="fa fa-check-circle text-success"></i></a>
                    </div>
                  </div>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php
              }
              ?>
              <?php
              while ($data_pending_h = mysqli_fetch_assoc($query_pending_h)) {
                ?>
                <li class="notification-item">
                  <i class="bi bi-exclamation-circle text-warning"></i>
                  <div>
                    <h4>
                      <?php echo $data_pending_h['user_name'] ?>
                    </h4>
                    <p>
                      <?php echo $data_pending_h['user_email'] ?>
                    </p>

                    <p style="font-size:11px;">request for <b>Hospital_signup</b></p>
                    <div class="d-flex align-items-center">
                      <p>
                        <?php echo $data_pending_h['created_at'] ?>
                      </p>
                      <a href="accept.php?reject_id_h=<?php echo $data_pending_h['hospital_id'] ?>"><i
                          class="bi bi-x-circle text-danger"></i></a>
                      <a href="accept.php?accept_id_h=<?php echo $data_pending_h['hospital_id'] ?>"><i
                          class="fa fa-check-circle text-success"></i></a>
                    </div>
                  </div>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php
              }
              ?>
              <li class="dropdown-footer">
                <a href="notification.php">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li><!-- End Notification Nav -->
          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="image/<?php echo $data['profile_image'] ?>" style="width:35px" alt="Profile"
                class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo $data['name'] ?>
              </span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>
                  <?php echo $data['name'] ?>
                </h6>
                <span>
                  <?php echo $data['job_title'] ?>
                </span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="signout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-flag"></i><span>Parental Info</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="Child.php">
                <i class="bi bi-circle"></i><span>Child Reports</span>
              </a>
            </li>
            <li>
              <a href="Booking_details.php">
                <i class="bi bi-circle"></i><span>Booking Details</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-h-circle"></i><span>Hospitals Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="hospitals.php">
                <i class="bi bi-circle"></i><span>List Of Hospitals</span>
              </a>
            </li>
            <li>
              <a href="Vaccine_list.php">
                <i class="bi bi-circle"></i><span>List Of Vaccine</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#charts-nav_" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav_" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts.php">
                <i class="bi bi-circle"></i><span>Users_Chart</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->

        <!-- End Icons Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="user_profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="notification.php">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">
              <?php echo $data_pending['pending_users'] ?>
              <span>Notification</span>
            </span>
          </a>
        </li><!-- End Profile Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->
    <?php
  }
  ?>