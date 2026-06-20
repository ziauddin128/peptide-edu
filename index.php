<?php
require "top.php";
?>


<!-- Home Popup -->
<?php
if (!isset($_SESSION['CONFIRM_TERMS']) || $_SESSION['CONFIRM_TERMS'] != "Yes") {
?>
  <section class="popup-info">
    <div class="popup-in">
      <i class="fa-solid fa-triangle-exclamation"></i>
      <h1>Usage Warning</h1>
      <p>All peptide products are in powder (lyophilized) form and require reconstitution with a suitable diluent for research purposes only. Research supplies (e.g., syringes, alcohol) are not included. We adhere to all local and state laws around research only chemical sales. We are not a pharmacy, nor do we promote or provide any advice for human or animal consumption. Please review our terms and conditions carefully.</p>
      <button class="info-agree-btn">Agree</button>
    </div>
  </section>
<?php
}
?>


<!-- Hero -->
<section class="hero">
  <div class="container">

    <h2>Science. Knowledge. Clarity</h2>
    <h1>Advanced Formulations, <br> <span>Precision Crafted</span></h1>

    <p>Kronos Formulations develops and manufactures high-quality formulations across the fields of nutritional supplements, research compounds, peptides, and specialty ingredients. Our focus is on precision, innovation, and uncompromising quality at every stage of development.</p>


    <div class="hero-btn">
      <a href="peptides" class="primary-btn">
        <span>Explore Peptides</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
      <a href="about" class="secondary-btn">
        <span>Learn More</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

  </div>
</section>

<!-- Featured Section -->
<section class="featured">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="featured-item">
          <i class="fa-solid fa-microscope"></i>
          <div>
            <h1>Evidence Based</h1>
            <p>Information from scientific literature and trusted source.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="featured-item">
          <i class="fa-solid fa-shield-halved"></i>
          <div>
            <h1>Independent</h1>
            <p>We do not sell peptides or promote their use.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="featured-item">
          <i class="fa-solid fa-flask"></i>
          <div>
            <h1>Educational</h1>
            <p>Content created for knowledge and awareness.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="featured-item">
          <i class="fa-regular fa-file-lines"></i>
          <div>
            <h1>Transparent</h1>
            <p>Clear, unbiased, and focused on scientific understanding.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- What are peptide -->
<section class="what-are-peptide">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="what-are-peptide-left">
          <img src="assets/images/what-are-peptide.png"
            class="img-light" alt="What are peptide">
          <img src="assets/images/what-are-peptide-black.png" class="img-dark" alt="What are peptide">
        </div>
      </div>
      <div class="col-md-6">
        <div class="what-are-peptide-right">
          <div class="section-title-wrap">
            <h2 class="title-tag">Foundation</h2>
            <h1>What are peptides?</h1>
            <div class="divider-line"></div>
          </div>

          <p>Peptides are short chains of amino acids, the fundamental building blocks of proteins. Ranging from 2 to roughly 50 amino acids long, they act as critical chemical messengers in the body, telling cells exactly what to do.</p>

          <a href="about#interested-to-know" class="primary-outline-btn mt-4">
            <span>Read More</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Explore Peptides -->
<section class="explore-peptides">
  <div class="container">
    <div class="section-title-wrap align-items-center">
      <h2 class="title-tag">Explore</h2>
      <h1>Peptide Categories</h1>
      <div class="divider-line"></div>
    </div>

    <div class="row mt-4">
      <div class="col-sm-6 col-xl-4">
        <div class="explore-peptide-item">
          <i class="fa-regular fa-futbol"></i>
          <div>
            <h1>Therapeutic Peptides</h1>
            <p>Studied for their potentials in hormone modulation, metabolic health, immune, support and more.</p>
            <a href="about">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="explore-peptide-item">
          <i class="fa-solid fa-eye-dropper"></i>
          <div>
            <h1>Cosmetic Peptides</h1>
            <p>Research for their role in skin health, collagen support, and anti-aging application.</p>
            <a href="about">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="explore-peptide-item">
          <i class="fa-solid fa-flask"></i>
          <div>
            <h1>Research Peptides</h1>
            <p>Compounds used in laboratory settings to study biological pathways, receptor activity, and disease models.</p>
            <a href="about">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Case Studies -->
<section class="case-studies">
  <div class="container">
    <div class="section-title-wrap align-items-center">
      <h2 class="title-tag">Case Studies</h2>
      <h1>Our Case Studies</h1>
      <div class="divider-line"></div>
    </div>

    <div class="row mt-4">
      <?php
      $caseStudySql = "SELECT * FROM `case-studies`";
      $caseStudyRes = mysqli_query($conn, $caseStudySql);
      if (mysqli_num_rows($caseStudyRes) > 0) {
        while ($caseStudyRow = mysqli_fetch_assoc($caseStudyRes)) {
      ?>
          <div class="col-sm-6">
            <a href="blog/<?= $caseStudyRow['slug'] ?>" class="case-studies-item">
              <div class="img-wrapper">
                <img src="admin/storage/<?= $caseStudyRow['thumbnail'] ?>" alt="Case Studies">
              </div>
              <div>
                <h1><?= $caseStudyRow['title'] ?></h1>
                <p>
                <p>
                  <?= (strlen($caseStudyRow['summary']) > 100)
                    ? substr($caseStudyRow['summary'], 0, 100) . '...'
                    : $caseStudyRow['summary']; ?>
                </p>
                </p>
              </div>
            </a>
          </div>
      <?php
        }
      }
      ?>

    </div>

  </div>
</section>

<!-- Awareness -->
<section class="awareness">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="awareness-item">
          <i class="fa-solid fa-shield-halved"></i>
          <div>
            <h1>Regulatory Awareness</h1>
            <p>Studied for their potential in hormone modulation metabolic health, immune support and more.</p>
            <a href="#">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="awareness-item">
          <i class="fa-solid fa-triangle-exclamation"></i>
          <div>
            <h1>Safety First</h1>
            <p>Peptides can have potent biological effects. Understand the potential risks, purity concerns, and the importance of responsible research.</p>
            <a href="#">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="awareness-item">
          <i class="fa-solid fa-book-open"></i>
          <div>
            <h1>Research & Ethics</h1>
            <p>We encourage ethical, legal, and responsible research practices within regulated laboratory environment.</p>
            <a href="#">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="awareness-item">
          <i class="fa-solid fa-wave-square"></i>
          <div>
            <h1>Stay Informed</h1>
            <p>Science is always evolving. We provide up-to-date information as new research and regulations emerge.</p>
            <a href="#">
              <span>Learn More</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Info popup open & close
  $(".info-agree-btn").click(function() {
    $(".popup-info").fadeOut();

    $.ajax({
      url: "api/confirm-terms.php",
      type: "POST",
      data: {
        terms: "Yes"
      },
      success: function(result) {
        // console.log(result);
      }
    })
  })
</script>

<?php
require "footer.php";
?>