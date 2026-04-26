<?php
require "admin/config.php";

//language session
if (isset($_SESSION['lang'])) {
  $s_lang = $_SESSION['lang'];
} else {
  $s_lang = "spa";
}

//  $topmenu[$s_lang][0]
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
  <div class="nav-bar border-bottom">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand logo-text" href="/">Peptide<span>Edu</span></a>
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
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul
              class="navbar-nav mt-2 text-end pe-1 pe-md-0 ms-auto gap-1 gap-lg-4">
              <!-- <li class="nav-item">
                <a class="nav-link" href="faq">FAQ</a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle shadow-none outline-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo ($s_lang == "en") ? "English" : "Spanish"  ?>
                </a>
                <ul class="dropdown-menu">
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