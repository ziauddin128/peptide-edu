<?php
require "config.php";
require "api/function.php";

if (empty($_SESSION['USER_ID'])) {
    redirect('index');
}

//page_name
$page = basename($_SERVER['PHP_SELF']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>odbiolab | Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="asset/dist/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Top Bar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Main Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div>
                <a href="peptides" class="brand-link">
                    <img src="../assets/images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Admin Panel</span>
                </a>
            </div>
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="peptides" class="nav-link <?php if ($page == "peptides.php" || $page == "add-peptide.php" || $page == "edit-peptide.php" || $page == "sds.php") {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon fa-solid fa-flask-vial"></i>
                                <p>
                                    Peptides
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="case-studies" class="nav-link <?php if ($page == "case-studies.php" || $page == "add-case-studies.php" || $page == "edit-case-studies.php" || $page == "sds.php") {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fa-solid fa-microscope"></i>
                                <p>
                                    Case Studies
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="faq" class="nav-link <?php if ($page == "faq.php" || $page == "add-faq.php" || $page == "edit-faq.php") {
                                                                echo "active";
                                                            } ?>">
                                <i class="nav-icon fa-regular fa-circle-question"></i>
                                <p>
                                    FAQ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="profile" class="nav-link <?php if ($page == "profile.php") {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout" class="nav-link bg-danger">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>