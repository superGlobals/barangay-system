<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIS - RESIDENT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="admin/<?= $brgy_info['brgy_logo'] ?>" rel="icon">
  <link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="public/assets/fontawesome.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

  <style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
  cursor: pointer;
}
  .maangas {
    border-radius: 0!important;
    border: 0.5rem solid rgba(255,255,255,.3);
    background-clip: padding-box;
    background-color: #fff;
    }

    .h5-title {
      padding: 20px 0 15px 0;
      font-size: 18px;
      font-weight: 500;
      color: #2c4964;
      font-family: "Poppins", sans-serif;
    }

    .swiper {
  width: 100%;
  height: 100vh;

}

.slider {
  background-size: cover;
}

/*
@media screen and (max-width: 600px) {
  .carousel-item img{
    width: 100%;
    height: 300px;    
  }

  .carousel-caption h3, p{
    font-size: 8px;
  } 
}*/

.notification {
  color: white;
  text-decoration: none;
  padding: 10px;
  margin-top: 5px;
  position: relative;
  display: inline-block;
}


.notification .badge {
  position: absolute;
  top: -5px;
  right: -2px;
  border-radius: 50%;
  background-color: red;
  color: white;
}

</style>

<body>


 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="home"><img src="admin/<?= $brgy_info['brgy_logo'] ?>" alt=""> BIS PORTAL</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a href="home">Home</a></li>
          <li><a href="about">About</a></li>
           <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="services">View All</a></li>
              <li><a href="brgy_clearance_request">Barangay Clearance</a></li>
              <li><a href="brgy_indigency_request">Barangay Indigency</a></li>
              <li><a href="brgy_certificate_request">Barangay Certificate</a></li>
              <li><a href="brgy_residency_request">Barangay Residency</a></li>
              <li><a href="building_clearance_request">Building Clearance</a></li>
              <li><a href="brgy_clearanceNat_request">Clearance NAT'L ID</a></li>
              <li><a href="business_clearance_request">Business Clearance</a></li>
              <!-- <li><a href="certificate_demolished_request">Certificate of Demolished</a></li> -->
              <li><a href="certificate_goodmoral_request">Certificate of Good Moral</a></li>
            </ul>
          </li>
          <?php
          if (isset($_SESSION['unique_id'])):?>
            <li><a class="nav-link scrollto" href="my_request">My Request</a></li>
            <li class="dropdown"><a href="#">Profile <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="my_profile">My Profile</a></li>
              <li><a href="update_my_info">Update Profile</a></li>
              <li><a href="blotter">Blotter Records</a></li>
            </ul>
          </li>
         <?php endif; ?>
           <?php
          if (!isset($_SESSION['unique_id'])):?>
            <li><a class="nav-link scrollto" href="login">Login</a></li>
            <li><a class="nav-link scrollto" href="register">Register</a></li>
          <?php else: ?>
            <li><a href="logout">Logout</a>   </li>
          <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['unique_id'])): ?>
        <a href="notification" class="notification" id="notifications">
          <span class="qwe"><i style="font-size: 25px;" class="fa-solid fa-bell"></i></span>
          <!-- <span><i style="font-size: 25px;" class="fa-solid fa-bell d-lg-none d-md-none text-danger"></i></span> -->
          <?php if ($count_notif > 0): ?>
          <span class="badge"><?= $count_notif ?></span>
        <?php else: ?>
          <span class="badge"></span>
        <?php endif; ?>
        </a>
      <?php endif ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
         <!-- <?php
      if (isset($_SESSION['unique_id'])): ?>

      <a style="background-color: #1977cc; padding: 8px 25px; border-radius: 50px; font-size: 14px;" href="#services" class="btn btn-primary btn-sm text-uppercase"><i class="fa-solid fa-user"></i> <?= $_SESSION['resident_username'] ?> </a>

      <?php endif; ?> -->
        
    </div>

  </header><!-- End Header -->

