<?php
require "admin/config.php";

//language session
if (isset($_SESSION['lang'])) {
  $s_lang = $_SESSION['lang'];
} else {
  $s_lang = "spa";
}

//  $topmenu[$s_lang][0]

// Active Page Name
$activePage = basename($_SERVER['PHP_SELF']);


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PeptideEdu</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
  <!-- Owl Carousel & Jquery-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.green.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="assets/js/owl.carousel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- Navbar -->
  <div class="nav-bar">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="assets/images/logo.png" class="logo logo-light" alt="Logo">
            <img src="assets/images/logo-dark.png" class="logo logo-dark" alt="Logo">
          </a>
          <div class="d-flex align-items-center gap-3">
            <button class="theme-btn outline-none shadow-none d-lg-none">
              <i class="fa-solid fa-moon"></i>
            </button>
            <button
              class="navbar-toggler shadow-none outline-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul
              class="navbar-nav align-items-lg-center mt-2 text-end pe-1 pe-md-0 ms-auto gap-4 gap-lg-5">
              <li class="nav-item">
                <a class="nav-link <?= ($activePage == "index.php") ? "active" : "" ?>" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($activePage == "about.php") ? "active" : "" ?>" href="about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($activePage == "peptides.php") ? "active" : "" ?>" href="peptides">Peptides</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($activePage == "reconstitution-calculator.php") ? "active" : "" ?>" href="reconstitution-calculator">Reconstitution</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link explore-btn" href="peptides">Explore</a>
              </li> -->
              <li class="nav-item d-none d-lg-block">
                <button class="theme-btn outline-none shadow-none">
                  <i class="fa-solid fa-moon"></i>
                </button>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle shadow-none outline-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo ($s_lang == "en") ? "English" : "Spanish"  ?>
                </a>
                <ul class="dropdown-menu menu-dropdown">
                  <li><a class="dropdown-item <?= ($s_lang == "en") ? "active" : "" ?>" href="javascript:void(0)" onclick="change_lang('en')">English</a></li>
                  <li><a class="dropdown-item <?= ($s_lang == "spa") ? "active" : "" ?>" href="javascript:void(0)" onclick="change_lang('spa')">Spanish</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>