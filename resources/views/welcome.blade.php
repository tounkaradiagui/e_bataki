<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Bataki</title>

  <!-- Favicons -->
 <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!--Main CSS File -->
  <link href="assets/css/accueil.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">E-<span>Bataki</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto btn btn-primary text-white p-1" href="{{route('login')}}">Connexion</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner " style="height:550px ;">
          <div class="carousel-item active">
            <img src="{{asset('img/carou3.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('img/carou2.jpg')}}" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="{{asset('img/carou1.jpg')}}" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" >
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100"style="background-color: #0B6623;">
              <div class="icon text-center text-white"><i class='bx bx-user'></i></i></div>
              <h4 class="title text-center"><a href="">Gestion des utilisateurs</a></h4>
              <ul class="description text-white">
                <li>Ajouter</li>
                <li>Modifier</li>
                <li>Archiver</li>
              </ul>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200"style="background-color: #0B6623;">
              <div class="icon text-center"><i class='bx bxs-envelope'></i></div>
              <h4 class="title text-center"><a href="">Gestion des courriers</a></h4>
              <ul class="description text-white">
                <li>Ajouter</li>
                <li>Modifier</li>
                <li>Archiver</li>
              </ul>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300"style="background-color: #0B6623;">
              <div class="icon text-center"><i class='bx bxs-hourglass-top'></i></div>
              <h4 class="title text-center"><a href="">Gagner du temps</a></h4>
              <ul class="description text-white">
                <li>Simplicité</li>
                <li>Rapidité</li>
                <li>Fiabilité</li>
              </ul>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Featured Services Section -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>
