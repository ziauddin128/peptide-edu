<section class="faq">
    <div class="container">
        <div class="section-title-wrap align-items-center">
            <h2 class="title-tag">Got Questions?</h2>
            <h1>Frequently asked questions</h1>
            <div class="divider-line"></div>
        </div>

        <div class="faq-wrapper mt-4">
            <div class="accordion accordion-flush" id="faqAccordion">
                <?php
                $sql = "SELECT * FROM `faq` ORDER BY `id` ASC";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed shadow-none outline-none"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq-0<?= $row['id']  ?>">
                                    <?= $row['question']  ?>
                                </button>
                            </h2>
                            <div
                                id="faq-0<?= $row['id']  ?>"
                                class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        <?= $row['answer']  ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>