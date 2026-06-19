<?php
require "top.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM `peptides` WHERE `id` = '$id'";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
  } else {
    echo "<script>window.location.assign('/')</script>";
  }
} else {
  echo "<script>window.location.assign('/')</script>";
}


// Sds Data
$sql2 = "SELECT * FROM `sds` WHERE `peptide_id` = ?";
$res2 = $conn->prepare($sql2);
$res2->bind_param('i', $id);
$res2->execute();

$result2 = $res2->get_result();
$row2 = $result2->fetch_assoc() ?? [];
$sds = json_decode($row2['sds_data'] ?? '{}', true) ?: [];

?>


<!-- Product details -->
<section class="product-details">
  <div class="container">
    <div class="section-header">
      <h2>Product details</h2>
    </div>

    <div class="breadcrumbs mt-2">
      <a href="/">Home</a>
      <i class="fa-solid fa-chevron-right"></i>
      <a href="javascript:void(0)">Products</a>
      <i class="fa-solid fa-chevron-right"></i>
      <a href="details?id=<?= $id ?>"><span><?= ($s_lang == "en") ? $row['name1'] : $row['name2'] ?></span></a>
    </div>

    <div class="row mt-4">
      <div class="col-md-6 col-lg-5">
        <div class="product-det-left">
          <?php
          if (!empty($row['media_files'])) {
            $media_files = json_decode($row['media_files'], true);
          ?>
            <div class="owl-carousel owl-theme">
              <?php foreach ($media_files as $file):
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $is_video = in_array($ext, ['mp4', 'webm', 'ogg', 'mov']);
              ?>
                <div class="item">
                  <div class="product-det-item">
                    <?php if ($is_video): ?>
                      <video src="admin/storage/<?= $file ?>" controls muted></video>
                    <?php else: ?>
                      <img src="admin/storage/<?= $file ?>" alt="" />
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
          <div class="product-category-white"><?= ($s_lang == "en") ? $row['category1'] : $row['category2'] ?></div>
          <h1><?= ($s_lang == "en") ? $row['name1'] : $row['name2'] ?></h1>
          <?php
          if ($row['cas_number'] != "") {
          ?>
            <div>
              <h4>CAS: <?= $row['cas_number'] ?></h4>
            </div>
          <?php
          }
          ?>
          <p><?= ($s_lang == "en") ? $row['short_desc1'] : $row['short_desc2'] ?></p>

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
                    <p><b>Appearance:</b> <?= ($s_lang == "en") ? $row['appearance1'] : $row['appearance2'] ?></p>
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
                  <p><b>Storage:</b> <?= ($s_lang == "en") ? $row['storage1'] : $row['storage2'] ?></p>
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
                <p><b>Note:</b> <?= ($s_lang == "en") ? $row['appearance1'] : $row['appearance2'] ?></p>
              </div>
            </div>
          <?php
          }
          ?>


          <a href="admin/storage/<?= $row['coa'] ?>" target="_blank" class="coa-btn">
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
                src="admin/storage/<?= $row['chemical_structure'] ?>"
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
                  href="admin/storage/<?= $row['endotoxins'] ?>" target="_blank">
                  <img
                    src="admin/storage/<?= $row['endotoxins'] ?>"
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
                  href="admin/storage/<?= $row['sterility'] ?>" target="_blank">
                  <img
                    src="admin/storage/<?= $row['sterility'] ?>"
                    alt="" />
                </a>
              </div>
            </div>
          <?php
          }
          ?>

          <a href="admin/storage/<?= $row['coa'] ?>" target="_blank" class="coa-btn">
            <span></span>
            <span>View CoA</span>
            <i class="fa-regular fa-file-lines"></i>
          </a>

          <div class="previous-batch mt-4">
            <h1>Previous Batches</h1>

            <?php if (!empty($row['prev_batch'])):
              $prev_batches = json_decode($row['prev_batch'], true);
            ?>
              <?php foreach ($prev_batches as $batch): ?>
                <div class="prev-batch-list">
                  <h2><?= htmlspecialchars($batch['batch']) ?></h2>
                  <p><?= date('d/m/Y', strtotime($batch['date'])) ?></p>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Product Description -->
<!-- <section class="product-desc">
  <div class="container">
    <div class="product-desc-in">
      <h1>Description</h1>

      <?= ($s_lang == "en") ? $row['long_desc1'] : $row['long_desc2'] ?>
    </div>
  </div>
</section> -->

<!-- Safety Data Sheet -->
<section class="safety-data-sheet">
  <div class="container">
    <div class="accordion accordion-flush" id="detailsAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed shadow-none outline-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faq-01">
            Description
          </button>
        </h2>
        <div
          id="faq-01"
          class="accordion-collapse collapse"
          data-bs-parent="#detailsAccordion">
          <div class="accordion-body">
            <?= ($s_lang == "en") ? $row['long_desc1'] : $row['long_desc2'] ?>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed shadow-none outline-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faq-02">
            Safety Data Sheet (SDS)
          </button>
        </h2>
        <div
          id="faq-02"
          class="accordion-collapse collapse"
          data-bs-parent="#detailsAccordion">
          <div class="accordion-body sds-det">

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 1: Identification</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_1'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 2: Hazard Identification</p>
              </div>
              <div class="sds-content">
                <div class="sds-warning">
                  <?= $sds['section_2'] ?? '' ?>
                </div>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 3: Composition/ Information on Ingredients</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_3'] ?? '' ?>
                <!-- <div class="sds-formula">
                  <p><b>Molecular Formula:</b></p>
                  <p>1234</p>
                </div>-->
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 4: First-Aid Measures</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_4'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 5: Fire-Fighting Measures</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_5'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 6: Accidental Release Measures</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_6'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 7: Handling and Storage</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_7'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 8: Exposure Controls/Personal Protection</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_8'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 9: Physical and Chemical Properties</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_9'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 10: Stability and Reactivity</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_10'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 11: Toxicological Information</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_11'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 12-15: Ecological, Disposal Transport, Regulatory</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_12'] ?? '' ?>
              </div>
            </div>

            <div class="sds-item">
              <div class="sds-title">
                <p>Section 16: Other Information</p>
              </div>
              <div class="sds-content">
                <?= $sds['section_16'] ?? '' ?>
              </div>
            </div>


            <?php
            if (isset($row2['pdf']) && $row2['pdf'] != "") {
            ?>
              <div>
                <a href="admin/storage/<?= $row2['pdf'] ?>" target="_blank" class="print-pdf-btn">
                  <i class="fa-solid fa-file-pdf"></i>
                  <span>Print to PDF</span>
                </a>
              </div>
            <?php
            }
            ?>


          </div>
        </div>
      </div>

    </div>


  </div>
</section>

<!-- Research use only -->
<section class="research-use">
  <div class="container">
    <div class="research-use-in">
      <p>
        <b><i class="fa-solid fa-triangle-exclamation"></i> Research Chemical Use Only:</b> This product is intended strictly for in vitro laboratory research and analytical purposes. All content provided on this site is for education purposed only. This product should only be handled by licensed, qualified professionals in a controlled research setting. This product is not a drug, food, or cosmetic, and must not be misbranded, mislabeled or misused in violation or applicable laws.
      </p>
    </div>
  </div>
</section>

<!-- Disclaimer -->
<section class="disclaimer">
  <div class="container">
    <div class="disclaimer-in">
      <h1>
        <i class="fa-solid fa-triangle-exclamation"></i>
        <span>Disclaimer</span>
      </h1>
      <p>
        <b>Research Use Only Disclaimer:</b> Products from Kronos Formulations are strictly for laboratory and research use by qualified professionals. They are not pharmaceuticals, dietary supplements, agricultural products, or household items, and must not be mislabeled as such. These chemicals are not intended for human or veterinary use and are exempt from Title 21, Parts 100–740 of the CFR. The information provided is educational, not evaluated by the FDA, and is not intended to diagnose, treat, cure, or prevent any health condition.
      </p>

      <p>
        <b>Intellectual Property & Patent Use Disclaimer:</b> Kronos Formulations provides this product solely for uses that fall under exemptions to patent infringement as permitted by applicable law, including but not limited to 35 U.S.C. § 271(e)(1) in the United States. It is the sole responsibility of the purchaser or user to ensure that their use of this product complies with all applicable intellectual property laws and legal exemptions. By purchasing this product, the buyer agrees to use it only within the scope of those exemptions and to indemnify and hold harmless Kronos Formulations from any claims arising from its use, including any alleged intellectual property infringement.
      </p>
    </div>
  </div>
</section>


<?php
require "footer.php";
?>