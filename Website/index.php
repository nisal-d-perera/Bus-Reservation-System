<?php
session_start();

require_once "../config/database.php";
//require_once "config/session.php";

$sql = "SELECT COUNT('schedule_id') FROM `schedule`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sch_c=$row["COUNT('schedule_id')"];

$sql = "SELECT COUNT('driver_no') FROM `driver`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$dri_c=$row["COUNT('driver_no')"];

$sql = "SELECT COUNT('plate_number') FROM `bus`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$bus_c=$row["COUNT('plate_number')"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bus Ticket Reservation System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flexor
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>

      <div class="cta d-none d-md-flex align-items-center">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">SLTB</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Help</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto " href="../Login/login.php">SIGN IN</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Bus Ticket Reservation System</h1>
      <h2>E - Ticketing for Highway buses</h2>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="../Login/login.php" class="btn-get-started scrollto">SIGN IN</a>
      </div>
    </div>
  </section>

  <main id="main">

    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h3>Welcome</h3>
              <p>
                Now finding bus tickets is easier, you can order online at BTRS. No need to bother going to the terminal or agent office, 
                now you can buy tickets easily. Fast and Easy Booking. Free to Choose Seats. Cheapest Every Day. 24/7 Customer Service. All Classes and Routes.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class='bx bxs-receipt'></i>
                    <h4>Get Bus Tickets from the comfort of your home</h4>
                    <p>Book bus tickets from anywhere using the robust ticketing platform exclusively built to provide the passengers with pleasant ticketing experience.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class='bx bxs-info-square'></i>
                    <h4>Bus & Ticketing related information at your fingertips</h4>
                    <p>Checkout available seats, route information, fare information on real time basis with Esheba Platform.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class='bx bxs-dollar-circle'></i>
                    <h4>Pay Securely</h4>
                    <p>Online payment. (NO REFUND!)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" data-aos="fade-right">
            
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            
            <h3 data-aos="fade-up">Help</h3>
            <p data-aos="fade-up">STEPS TO BOOK A BUS TICKET</p>

            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-receipt"></i></div>
              <h4 class="title"><a href="">Select trip details</a></h4>
              <p class="description">Enter the place of departure, destination, travel date and then click 'Search'</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-bus"></i></div>
              <h4 class="title"><a href="">Choose your bus and seat</a></h4>
              <p class="description">Select bus, seat, place of departure, destination, fill in passenger details and click 'Payment'</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-dollar-circle"></i></div>
              <h4 class="title"><a href="">Easy Payment Method</a></h4>
              <p class="description">Payment can be made via ATM transfer, Internet banking.</p>
            </div>

          </div>
        </div>

      </div>
    </section>


    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-receipt"></i></div>
              <h4 class="title"><a href="">Schedules</a></h4>
              <h4 class="title"><a href=""><?=$sch_c?></a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-bus-front-fill"></i></div>
              <h4 class="title"><a href="">Buses</a></h4>
              <h4 class="title"><a href=""><?=$bus_c?></a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-person"></i></div>
              <h4 class="title"><a href="">Drivers</a></h4>
              <h4 class="title"><a href=""><?=$dri_c?></a></h4>
            </div>
          </div>
        
        </div>

      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Contact</h2>
          
        </div>

        <div class="row justify-content-center">

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>No. 177/A/2, Kasagahawatte, Kotugoda.</p>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>nisal@gmail.com<br>sakuni@gmail.com</p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+94 77 12 34 569<br>+94 77 12 34 569</p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            <form action="" method="post" role="form" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <br>
              <div class="text-center">
                <input type="submit" id="send" name="send" value="Send Message ">
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>

  </main>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>BTRS</h3>
            <p>
              BUS Tickets is the largest online bus ticket booking service in the world. Trusted by more than 8 million customers globally. Bus Tickets offers booking bus tickets through the website
              
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Contact Details</h4>
            <ul>
              <strong>Phone:</strong> +94 78 98 74 532<br>
              <strong>Email:</strong> btr.system@gmail.com<br>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Help</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>You can trust us. we only send offers, not a single spam.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span>BTRS</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          
          Designed by <a href="#">Group 07 / BCI Campus</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>
<?php

  require_once "../config/database.php";

  if (isset($_POST['send'])) {

      $mso_name=$_POST['name'];
      $mso_email=$_POST['email'];
      $mso_subject=$_POST['subject'];
      $mso_body=$_POST['message'];

      $sql="INSERT INTO `message`(`msg_id`, `msg_name`, `msg_email`, `msg_sub`, `msg_body`) 
        VALUES ('','$mso_name','$mso_email','$mso_subject','$mso_body')";
      $conn->query($sql);
      echo "<script>window.location.href='index.php';</script>";
  }
?>