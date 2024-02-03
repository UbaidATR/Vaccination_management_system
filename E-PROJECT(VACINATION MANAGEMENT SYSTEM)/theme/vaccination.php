<?php
include("connection.php");
$query = "SELECT * FROM vaccination";
$result = mysqli_query($connection,$query);
session_start();

if(!isset($_SESSION['name'])){
  header("location:login.php");
};
include("header.php");
 
if(isset($_POST['logout'])){
    session_destroy();
    header("location:login.php");
  
  
  }

?>
<!DOCTYPE html>
<html lang="zxx">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Medic | Medical HTML Template</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Medical HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Medical HTML Template v1.0">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animation/animate.min.css">
  <!-- jquery-ui -->
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css">
  <!-- timePicker -->
  <link rel="stylesheet" href="plugins/timePicker/timePicker.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>


<body>

  <div class="page-wrapper">


<!--Page Title-->
<br>
<section class="page-title text-center" style="background-image:url(images/background/gback\'.jpg);">
    <div class="container">
        <div class="title-text">
            <h1>vaccinations</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.html">home &nbsp;/</a>
                </li>
                <li><b>Vaccinations</b></li>
            </ul>
        </div>
    </div>
</section>
<br><br>
<h3 class="text-center">Vaccinations Available</h3>
<table class="table table-bordered w-50 mx-auto mt-5">
        <thead>
            <tr>
            <th class="text-center">S.no</th>
                <th class="text-center">NAME</th>
            </tr>
        </thead>
        <tbody>
           <?php
              while($data = mysqli_fetch_assoc($result)){

                $vaccination_id = $data['vaccination_id'];

            $vaccination_name = $data['vaccination_name'];
            echo '
         <tr>
            <td class="text-center">'.$vaccination_id.'</td>
            <td class="text-center">'.$vaccination_name.'</td>
           
         </tr>'
         ?>
        
        <?php
              }
           ?>    
        </tbody>
    </table>
<!--End Page Title-->


<section class="gallery bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center">
          <h3>Collected Shots
            <span>of Our vaccinations</span>
          </h3>
          <p>Leverage agile frameworks to provide a robust synopsis for high level overv-
            <br>iews. Iterative approaches to corporate strategy...</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/g1.webp" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/g1.webp"></a>
          <h3>Facility 01</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/flu vacc.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/flu vacc.jpg"></a>
          <h3>Facility 02</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/cough vacc.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/cough vacc.jpg"></a>
          <h3>Facility 03</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/falana vacc.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/falana vacc.jpg"></a>
          <h3>Facility 04</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/new1.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/new1.jpg"></a>
          <h3>Facility 05</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/new4.webp" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/new4.webp"></a>
          <h3>Facility 03</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/new 6.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/new 6.jpg"></a>
          <h3>Facility 04</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/namonia vacc.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/namonia vacc.jpg"></a>
          <h3>Facility 05</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item">
          <img loading="lazy" src="images/gallery/new 6.jpg" class="img-fluid" alt="gallery-image">
          <a data-fancybox="images" href="images/gallery/new 6.jpg"></a>
          <h3>Facility 03</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- scroll-to-top -->
<div id="back-to-top" class="back-to-top">
  <i class="fa fa-angle-up"></i>
</div>

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>

<?php
include("footer.php");
?>
<!-- jquery -->
<script src="plugins/jquery.min.js"></script>
<!-- bootstrap -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>
<!-- FancyBox -->
<script src="plugins/fancybox/jquery.fancybox.min.js" defer></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/gmap.js" defer></script>

<!-- jquery-ui -->
<script src="plugins/jquery-ui/jquery-ui.js" defer></script>
<!-- timePicker -->
<script src="plugins/timePicker/timePicker.js" defer></script>

<!-- script js -->
<script src="js/script.js"></script>
</body>

</html>