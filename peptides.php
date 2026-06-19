<?php
require "top.php";
?>


<!-- Library Section -->
<section class="library-section">
  <div class="container">
  <!--   <div class="section-header">
      <h2>Educational Resource</h2>
      <h1>Peptide education library</h1>
      <p>
        Explore our peptide education library for clear, reliable
        information and simple insights to help you understand peptides
        better.
      </p>
    </div> -->


    <div class="section-title-wrap align-items-center">
      <h1>Peptide Compounds Catalog</h1>
      <div class="divider-line"></div>
    </div>

    <?php
    $category_var = 'category1';
    $category_sql = "SELECT DISTINCT($category_var) as `category` FROM `peptides`";
    $category_res = mysqli_query($conn, $category_sql);
    if (mysqli_num_rows($category_res) > 0) {
    ?>
      <div class="library-category">
        <!-- <button class="category-btn active" onclick="get_peptides('All', '<?= $category_var ?>', this)">All</button> -->
        <?php
        while ($category_row = mysqli_fetch_assoc($category_res)) {
        ?>
          <button class="category-btn <?= ($category_row['category'] == "All" ? "active" : "") ?>" onclick="get_peptides('<?= $category_row['category'] ?>', '<?= $category_var ?>', this)"><?= $category_row['category'] ?></button>
        <?php
        }
        ?>
      </div>

      <div class="products-wrapper">

      </div>

    <?php
    }
    ?>
  </div>
</section>




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