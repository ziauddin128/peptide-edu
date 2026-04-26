<?php
require "top.php";
?>

<div class="cmn-bg">
  <!-- Library Section -->
  <section class="library-section">
    <div class="container">
      <div class="section-header">
        <h2>Educational Resource</h2>
        <h1>Peptide education library</h1>
        <p>
          Explore our peptide education library for clear, reliable
          information and simple insights to help you understand peptides
          better.
        </p>
      </div>

      <?php
      $category_var = 'category1';
      $category_sql = "SELECT DISTINCT($category_var) as `category` FROM `peptides`";
      $category_res = mysqli_query($conn, $category_sql);
      if (mysqli_num_rows($category_res) > 0) {
      ?>
        <div class="library-category">
          <button class="category-btn active" onclick="get_peptides('All', '<?= $category_var ?>', this)">All</button>
          <?php
          while ($category_row = mysqli_fetch_assoc($category_res)) {
          ?>
            <button class="category-btn" onclick="get_peptides('<?= $category_row['category'] ?>', '<?= $category_var ?>', this)"><?= $category_row['category'] ?></button>
          <?php
          }
          ?>
        </div>

        <div class="products-wrapper">

          <!-- <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="#">
                    <img src="https://placehold.co/200x200" alt="Peptide" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">Regenerative</div>
                  <h1>BPC-157</h1>
                  <p>
                    BPC-157 is a synthetic peptide derived from a naturally
                    occurring protein found in gastric tissue.
                  </p>
                  <a href="#">View CoA</a>
                </div>
              </div>
            </div>
          </div> -->
        </div>

      <?php
      }
      ?>
    </div>
  </section>

  <!-- About Us -->
  <section class="about-us">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="about-us-left">

            <h2>About Us</h2>
            <h1>About Us</h1>
            <p>
              This page provides a neutral, educational overview of
              commonly discussed peptides. It is intended for
              informational purposes only and does not promote, sell, or
              recommend the use of any compound.This page provides a
              neutral, educational overview of commonly discussed
              peptides. It is intended for informational purposes only and
              does not promote, sell, or recommend the use of any
              compound.
            </p>

            <p>
              Peptides discussed here may be investigational, regulated,
              or not approved for general use depending on jurisdiction.
            </p>

          </div>
        </div>
        <div class="col-md-6">
          <div class="about-us-right">
            <img class="img-fluid rounded" src="assets/images/dna-strand.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Peptide -->
  <section class="about-us">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-md-6 order-2 order-md-1">
          <div class="about-us-right">
            <img class="img-fluid rounded" src="assets/images/1034769_6484.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6 order-1 order-md-2">
          <div class="about-us-left">

            <h2>What Are Peptides?</h2>
            <h1>What Are Peptides?</h1>
            <p>
              Peptides are short chains of amino acids that act as signaling molecules in the body. They can influence processes such as metabolism, tissue repair, hormone release, and inflammation.
            </p>

            <p>
              They generally fall into three broad categories:
            </p>

            <ul>
              <li><b>Metabolic peptides</b> (e.g., weight regulation, glucose control)</li>
              <li><b>Healing / regenerative peptides</b> (e.g., tissue repair)</li>
              <li><b>Hormone-modulating peptides</b> (e.g., growth hormone signaling)</li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Faq -->
  <?php
  require "inc/faq.php";
  ?>

  <!-- Contact -->
  <?php
  require "inc/contact.php";
  ?>
</div>

<script>
  function get_peptides(categoryVal, categoryType, el) {

    $(".category-btn").removeClass("active");
    $(el).addClass("active");


    $.ajax({
      url: "api/peptides.php",
      type: "POST",
      data: {
        action: "get-peptides",
        categoryVal,
        categoryType,
      },
      beforeSend: function() {
        $(".products-wrapper").html(`
        <div class="d-flex justify-content-center align-items-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>`);
      },
      success: function(res) {
        let data = JSON.parse(res);
        if (data.success) {
          $(".products-wrapper").html(data.data);
        } else {
          let msg = `<div class="alert alert-primary">${data.message}</div>`;
          $(".products-wrapper").html(msg);
        }
      }
    })
  }
  get_peptides('All', 'category1', document.querySelector('.category-btn.active'));
</script>

<?php
require "footer.php";
?>