<?php
require "../top.php";

if (isset($_GET['slug']) && $_GET['slug'] != "") {
    $slug = $_GET['slug'];

    $sql = "SELECT * FROM `case-studies` WHERE `slug` = ?";
    $res = $conn->prepare($sql);
    $res->bind_param('s', $slug);
    $res->execute();
    $result = $res->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>window.location.assign('../')</script>";
    }
} else {
    echo "<script>window.location.assign('../')</script>";
}


?>

<!-- Blog Section -->
<section class="blog-section">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumbs mt-2">
            <a href="/">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="javascript:void(0)">Blog</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="<?= $row['slug'] ?>"><span><?= $row['title'] ?></span></a>
        </div>

        <!-- Blog Header -->
        <div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="blog-header-left">
                        <h1><?= $row['title'] ?></h1>
                        <div>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                <span><?= date('H:i:s', strtotime($row['research-date'])) ?></span>
                            </p>
                            <p>
                                <i class="fa-regular fa-calendar"></i>
                                <span><?= date('M d, Y', strtotime($row['research-date'])) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="blog-header-right">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="blog-header-summary p-3">
                                    <h4>
                                        <i class="fa-solid fa-chart-column"></i>
                                        <span>Summary</span>
                                    </h4>
                                    <p><?= $row['summary'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="blog-header-thumbnail p-2">
                                    <img src="../admin/storage/<?= $row['thumbnail'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Details -->
        <section class="blog-details">
            <div class="row">
                <div class="col-md-3">
                    <div class="blog-details-left">
                        <h2>Procurement</h2>
                        <div class="blog-product-promotion">
                            <img src="https://www.peptidedeck.com/_next/image?url=https%3A%2F%2Ftryyucca.com%2Fsermorelin-peptide-injection-vial-muscle-recovery-yucca-health.avif&w=256&q=75" alt="">
                        </div>
                        <div class="blog-product-det">
                            <div class="stock">
                                <h3>
                                    <i class="fa-solid fa-circle"></i>
                                    <span>IN STOCK</span>
                                </h3>
                                <p>
                                    <i class="fa-regular fa-truck"></i>
                                    <span>Free $150+</span>
                                </p>
                            </div>
                            <div class="product-info">
                                <h3>Yucca Health Sermorelin</h3>
                                <p>Yucca Sermorelin via licensed US telehealth. $192/month. Provider consult + pharmacy-shipped vials included. 3-month protocol recommended.</p>
                                <a href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>START 3-MONTH SERMORELIN PROTOCOL</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="blog-details-right">
                        <div class="details-item">
                            <div class="title">
                                <h1>Introduction</h1>
                            </div>

                            <p>HGH 191AA (Human Growth Hormone 191 Amino Acid) is the bioidentical form of somatropin, the growth hormone naturally produced by your pituitary gland. Unlike older 192AA formulations that contained an extra methionine amino acid, HGH 191AA is structurally identical to what your body produces, making it the gold standard in growth hormone research and therapy.</p>

                            <p>This comprehensive guide covers everything you need to know about HGH 191AA: how it works, the difference between 191AA and 192AA, research-backed benefits, dosage protocols, side effects, proper storage, and frequently asked questions. Whether you're exploring HGH for medical purposes or research, this guide provides the scientific foundation you need.</p>
                        </div>
                        <div class="details-item">
                            <div class="title">
                                <h1>Introduction</h1>
                            </div>

                            <p>HGH 191AA (Human Growth Hormone 191 Amino Acid) is the bioidentical form of somatropin, the growth hormone naturally produced by your pituitary gland. Unlike older 192AA formulations that contained an extra methionine amino acid, HGH 191AA is structurally identical to what your body produces, making it the gold standard in growth hormone research and therapy.</p>

                            <p>This comprehensive guide covers everything you need to know about HGH 191AA: how it works, the difference between 191AA and 192AA, research-backed benefits, dosage protocols, side effects, proper storage, and frequently asked questions. Whether you're exploring HGH for medical purposes or research, this guide provides the scientific foundation you need.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<?php
require "../footer.php";
?>