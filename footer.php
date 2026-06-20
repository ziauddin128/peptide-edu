<!-- Footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-item">
                    <a href="#">
                        <img src="<?= DOMAIN_NAME ?>assets/images/logo.png" class="logo logo-light" alt="Logo">
                        <img src="<?= DOMAIN_NAME ?>assets/images/logo-dark.png" class="logo logo-dark" alt="Logo">
                    </a>
                    <p>Independent. Educational. Evidence Based</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-item">
                    <h1>Quick Links</h1>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="peptides">Peptides</a></li>
                        <li><a href="reconstitution-calculator">Reconstitution Calculator</a></li>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="footer-item">
                    <h1>Follow Us</h1>
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- Copyright -->
<section class="copyright-footer">
    <div class="container">
        <p><i class="fa-regular fa-copyright"></i> <?= date('Y') ?> All right reserved Kronos Formulationss</p>

        <h2>YOU MUST BE OVER 21 YEARS OLD TO USE THIS WEBSITE.</h2>
        <p>The statements made on this website have not been evaluated by the U.S. Food and Drug Administration. Research compounds and peptides offered by Kronos Formulations are intended solely for laboratory, analytical, and scientific research purposes and are not for human or animal use. These materials should be handled only by qualified professionals with the appropriate training and facilities. Unless specifically identified otherwise, products offered by Kronos Formulations are not drugs, foods, dietary supplements, or cosmetic products and should not be represented or used as such. Kronos Formulations is not a compounding pharmacy as defined under Section 503A of the Federal Food, Drug, and Cosmetic Act, nor is it an outsourcing facility as defined under Section 503B of the Federal Food, Drug, and Cosmetic Act.</p>

    </div>
</section>

<!-- To Top -->
<button class="to-top" id="to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<script>
    let domain_name = "<?= DOMAIN_NAME ?>";

    $(document).ready(function() {
        // To Top
        $("#to-top").click(function() {
            window.scrollTo(0, 0);
        });

        // Background Color Change for top menu on scroll
        function toggleNavbar() {
            let scrollY = window.scrollY;
            if (scrollY > 0) {
                $(".nav-bar").addClass("active");
            } else {
                $(".nav-bar").removeClass("active");
            }
        }

        // On scroll
        $(window).on("scroll", toggleNavbar);

        // On page load
        $(window).on("load", toggleNavbar);
    });

    //language session set
    /* function change_lang(lang) {
        $.ajax({
            url: `${domain_name}api/changeLanguage.php`,
            type: "POST",
            data: {
                lang
            },
            success: function(result) {
                window.location.reload();
            }
        })
    } */




    // Light & Dark Mode
    const html = document.documentElement;
    const buttons = document.querySelectorAll('.theme-btn');

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('odbiolabs-theme', theme);

        buttons.forEach(btn => {
            const icon = btn.querySelector('i');
            if (icon) {
                icon.className = theme === 'dark' ?
                    'fa-solid fa-moon' :
                    'fa-solid fa-sun';
            }
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            const current = html.getAttribute('data-theme');
            applyTheme(current === 'dark' ? 'light' : 'dark');
        });
    });

    const saved = localStorage.getItem('odbiolabs-theme');
    if (saved) applyTheme(saved);
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: "en"
        }, 'google_translate_element');
    }

    function change_lang(lang) {

        var language = lang;
        var selectField = document.querySelector("#google_translate_element select");
        for (var i = 0; i < selectField.children.length; i++) {
            var option = selectField.children[i];
            if (option.value == language) {
                selectField.selectedIndex = i;
                selectField.dispatchEvent(new Event('change'));
                break;
            }
        }

        document.querySelectorAll('.menu-dropdown.dropdown-menu .dropdown-item').forEach(item => {
            item.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
    }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>