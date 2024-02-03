<?php

include('connection.php');
session_start();
$user = $_SESSION['name'];
$query_chk = mysqli_query($connection, "select status from hospital where user_email='$user'");
$data_chk = mysqli_fetch_assoc($query_chk);
if ($data_chk['status'] == 'pending') {
  header("location:pending.php");
} else {
  if (!isset($_SESSION['name'])) {
    header("location:login.php");
  };
  $query = "Select * from hospital ";
  $result = mysqli_query($connection, $query);

  $query1 = " select count(*) as total from parents p JOIN hospital h ON p.hospital_id = h.hospital_id  ";
  $result1 = mysqli_query($connection, $query1);

  $query2 = " select count(*) as total, user_name from parents p JOIN hospital h ON p.hospital_id = h.hospital_id WHERE h.user_email = '$user'";
  $result2 = mysqli_query($connection, $query2);

  $query3 = " select count(*) as total from parents p JOIN hospital h ON p.hospital_id = h.hospital_id where status_id= 2 and  h.user_email = '$user' ";
  $result3 = mysqli_query($connection, $query3);


  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>


    <?php



    if ($result1) {
      $row = mysqli_fetch_assoc($result1);
      $totalParents = $row['total'];
    } else {
      $totalParents = 0;
    }



    if ($result2) {
      $row2 = mysqli_fetch_assoc($result2);
      $hospitalParents = $row2['total'];
      $user = $row2['user_name'];
    } else {
      $hospitalParents = 0;
    }


    if ($result3) {
      $row3 = mysqli_fetch_assoc($result3);
      $vaccinatedParents = $row3['total'];
    } else {
      $vaccinatedParents = 0;
    }
    include("header.php");

    if (isset($_POST['logout'])) {
      session_destroy();
      header("location:login.php");


    }
    ?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to hospital portal</h1>
      <h2>We are team of talented doctors making patients satisfied</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>hospital</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h3 class="data">Vaccinated Patients: <?php echo $vaccinatedParents; ?></h3>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h3 class="data"><?php echo $user; ?> Patients: <?php echo $hospitalParents; ?></h3> 
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h3 class="data">Total Visitors: <?php echo $totalParents; ?></h3>

                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

<div class="hero-slider">
  <!-- Slider Item -->
  <div class="slider-item slide1" style="background-image:url(images/doctor.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Slide Content Start -->
          <div class="content style text-center">
            <h2 class="text-white text-bold mb-2" data-animation-in="slideInLeft">Welcome to Hospital Portal</h2>
            
          </div>
          <!-- Slide Content End -->
        </div>
      </div>
    </div>
  </div>
  <!-- Slider Item -->
  <div class="slider-item" style="background-image:url(images/slider/slidenew2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Slide Content Start-->
          <div class="content style text-center">
            <h2 class="text-white" data-animation-in="slideInRight">"Medicines cure diseases, but only doctors can cure patients."</h2>
          </div>
          <!-- Slide Content End-->
        </div>
      </div>
    </div>
  </div>
  <!-- Slider Item -->
  <div class="slider-item" style="background-image:url(images/slider/slidenew1.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Slide Content Start -->
          <div class="content text-center style">
            <h2 class="text-white text-bold mb-2" data-animation-in="slideInRight">Our Best Doctors</h2>
          </div>
          <!-- Slide Content End -->
        </div>
      </div>
    </div>
  </div>
</div>

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Dine Pad</a></h4>
              <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <p class="vaccine-paragraph text-center"><b>Vaccination plays a crucial role in preventing infectious diseases, protecting
      individuals and communities from severe illnesses, and contributing to public health. It helps build immunity,
      reducing the spread of harmful viruses and ensuring a healthier future for everyone.</b></p>
    <br><br>

  <br>
    <?php
    include("footer.php");
    ?>
  </body>

  </html>
  <?php
}
;
?>