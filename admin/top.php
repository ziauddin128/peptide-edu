<?php
require "config.php";
require "api/function.php";

if (empty($_SESSION['USER_ID'])) {
    redirect('index');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PeptideEdu | Admin</title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <!-- Top bar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>

        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a href="logout" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- Side bar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="peptides">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Peptides</span>
            </a>
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link" href="form.html">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Form</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="table.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Table</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Login</span>
            </a>
          </li> -->

        </ul>
      </nav>
      <!-- Main Part -->
      <div class="main-panel">
        <div class="content-wrapper">