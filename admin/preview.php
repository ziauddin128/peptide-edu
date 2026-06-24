<?php
require "top.php";
$row = $_SESSION['preview'];
?>

<link rel="stylesheet" href="asset/dist/css/detailsPage.css">
<!-- Owl Carousel & Jquery-->
<link rel="stylesheet" href="<?= DOMAIN_NAME ?>assets/css/owl.carousel.css" />
<link rel="stylesheet" href="<?= DOMAIN_NAME ?>assets/css/owl.theme.default.css" />
<link rel="stylesheet" href="<?= DOMAIN_NAME ?>assets/css/owl.theme.green.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="<?= DOMAIN_NAME ?>assets/js/owl.carousel.js"></script>


<!-- Product details -->
<section class="product-details">
    <div class="container">
        <div class="section-header">
            <h2>Product details</h2>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 col-lg-5">
                <div class="product-det-left">
                    <?php
                    if (!empty($row['media_files'])) {
                        $media_files = $row['media_files'] ?? [];
                    ?>
                        <div class="owl-carousel owl-theme">
                            <?php foreach ($media_files as $file):
                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                $is_video = in_array($ext, ['mp4', 'webm', 'ogg', 'mov']);
                            ?>
                                <div class="item">
                                    <div class="product-det-item">
                                        <?php if ($is_video): ?>
                                            <video src="storage/temp/<?= $file ?>" controls muted></video>
                                        <?php else: ?>
                                            <img src="storage/temp/<?= $file ?>" alt="" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="product-det-right mt-md-5 px-lg-3">
                    <div class="product-category-white"><?= $row['category1'] ?></div>
                    <h1><?= $row['name1'] ?></h1>
                    <?php
                    if ($row['cas_number'] != "") {
                    ?>
                        <div>
                            <h4>CAS: <?= $row['cas_number'] ?></h4>
                        </div>
                    <?php
                    }
                    ?>
                    <p><?= $row['short_desc1'] ?></p>

                    <div class="product-point">
                        <?php
                        if ($row['purity'] != "") {
                        ?>
                            <div class="product-point-item">
                                <div class="icon">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <div>
                                    <p>
                                        <b>Purity:</b>
                                        <i
                                            class="fa-solid fa-greater-than-equal"
                                            style="font-size: 12px"></i>
                                        <?= $row['purity'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['appearance1'] != "") {
                        ?>
                            <!-- <div class="product-point-item">
                  <div class="icon">
                    <i class="fa-solid fa-eye"></i>
                  </div>
                  <div>
                    <p><b>Appearance:</b> <?= $row['appearance1'] ?></p>
                  </div>
                </div> -->
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['storage1'] != "") {
                        ?>
                            <div class="product-point-item">
                                <div class="icon">
                                    <i class="fa-solid fa-temperature-full"></i>
                                </div>
                                <div>
                                    <p><b>Storage:</b> <?= $row['storage1'] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <?php
                    if ($row['appearance1'] != "") {
                    ?>
                        <div class="product-formate-item">
                            <div>
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <div>
                                <p><b>Note:</b> <?= $row['appearance1'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <a href="storage/temp/<?= $row['coa'] ?>" target="_blank" class="coa-btn">
                        <span></span>
                        <span>View CoA</span>
                        <i class="fa-regular fa-file-lines"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
        },
    });
</script>

<!-- Lab Report -->
<section class="lab-report">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lab-report-left">
                    <h2 class="lab-report-title">
                        <i class="fa-solid fa-flask-vial"></i>
                        <span>Chemical Information</span>
                    </h2>

                    <div class="row mt-3 chemical-report-wrapper">
                        <?php
                        if ($row['sequence'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                    <div>
                                        <h4>Sequence</h4>
                                        <p><?= $row['sequence'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['formula'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-solid fa-vial"></i>
                                    </div>
                                    <div>
                                        <h4>Formula</h4>
                                        <p><?= $row['formula'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['mole_wight'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-solid fa-scale-balanced"></i>
                                    </div>
                                    <div>
                                        <h4>Mol. Weight</h4>
                                        <p><?= $row['mole_wight'] ?> g/mol</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['pubchem_id'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-solid fa-database"></i>
                                    </div>
                                    <div>
                                        <h4>Pubchem Id</h4>
                                        <p><?= $row['pubchem_id'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['cas_number'] != "") {
                        ?>
                            <!-- <div class="col-sm-6">
                  <div class="chemical-report-box">
                    <div class="icon">
                      <i class="fa-solid fa-hashtag"></i>
                    </div>
                    <div>
                      <h4>Cas Number</h4>
                      <p><?= $row['cas_number'] ?></p>
                    </div>
                  </div>
                </div> -->
                        <?php
                        }
                        ?>


                    </div>

                    <?php

                    if ($row['chemical_structure'] != "") {
                    ?>
                        <div class="mt-3 chemical-structure-img-wrapper">
                            <img
                                src="storage/temp/<?= $row['chemical_structure'] ?>"
                                alt="" />

                            <h3>Chemical Structure</h3>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="lab-report-right">
                    <h2 class="lab-report-title">
                        <i class="fa-solid fa-microscope"></i>
                        <span>Lab testing result & CoA</span>
                    </h2>

                    <div class="row mt-3 chemical-report-wrapper">
                        <?php
                        if ($row['current_batch'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-solid fa-box-open"></i>
                                    </div>
                                    <div>
                                        <h4>Current Batch</h4>
                                        <p><?= $row['current_batch'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['test_date'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="chemical-report-box">
                                    <div class="icon">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                    <div>
                                        <h4>Test Date</h4>
                                        <p><?= $row['test_date'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['purity'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="lab-report-purity">
                                    <h3>
                                        <i class="fa-solid fa-chart-simple"></i>
                                        <span>Avg. Purity</span>
                                    </h3>
                                    <h2><?= $row['purity'] ?>%</h2>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($row['avg_weight'] != "") {
                        ?>
                            <div class="col-sm-6">
                                <div class="lab-report-purity">
                                    <h3>
                                        <i class="fa-solid fa-scale-balanced"></i>
                                        <span>Avg. Weight</span>
                                    </h3>
                                    <h2><?= $row['avg_weight'] ?>mg</h2>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <?php
                    if ($row['endotoxins'] != "") {
                    ?>
                        <div class="endoxin-report mt-3">
                            <div>
                                <h3>Endotoxins (Usp85)</h3>
                                <h2>
                                    <i class="fa-solid fa-square-check"></i>
                                    <span>Passed</span>
                                </h2>
                            </div>
                            <div>
                                <a
                                    href="storage/temp/<?= $row['endotoxins'] ?>" target="_blank">
                                    <img
                                        src="storage/temp/<?= $row['endotoxins'] ?>"
                                        alt="" />
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($row['sterility'] != "") {
                    ?>
                        <div class="endoxin-report mt-3">
                            <div>
                                <h3>Sterility (Usp61)</h3>
                                <h2>
                                    <i class="fa-solid fa-square-check"></i>
                                    <span>Passed</span>
                                </h2>
                            </div>
                            <div>
                                <a
                                    href="storage/temp/<?= $row['sterility'] ?>" target="_blank">
                                    <img
                                        src="storage/temp/<?= $row['sterility'] ?>"
                                        alt="" />
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <a href="storage/temp/<?= $row['coa'] ?>" target="_blank" class="coa-btn">
                        <span></span>
                        <span>View CoA</span>
                        <i class="fa-regular fa-file-lines"></i>
                    </a>

                    <div class="previous-batch mt-4">
                        <h1>Previous Batches</h1>

                        <?php if (!empty($row['prev_batch'])):
                            $prev_batches = $row['prev_batch'];
                        ?>
                            <?php foreach ($prev_batches as $batch): ?>
                                <div class="prev-batch-list">
                                    <h2><?= htmlspecialchars($batch['batch']) ?></h2>
                                    <p><?= htmlspecialchars($batch['date']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Safety Data Sheet -->
<section class="safety-data-sheet">
    <div class="container">
        <h2>Description</h2>
        <p><?= $row['long_desc1'] ?></p>
    </div>
</section>


<?php
require "footer.php";
?>