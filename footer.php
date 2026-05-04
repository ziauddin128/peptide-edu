<!-- Footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="footer-item">
                    <a href="#">
                        <img src="assets/images/logo.png" class="logo logo-light" alt="Logo">
                        <img src="assets/images/logo-dark.png" class="logo logo-dark" alt="Logo">
                    </a>
                    <p>Independent. Educational. Evidence Based</p>
                    <p> The website is informational purpose only. We do not sell peptides, facilitate their acquisition or promote their use in human.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-item">
                    <h1>Quick Links</h1>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Peptides</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms Condition</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-item">
                    <h1>Follow Us</h1>
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Copyright -->
<section class="copyright-footer">
    <div class="container">
        <p><i class="fa-regular fa-copyright"></i> <?= date('Y') ?> All right reserved OD Bio Labs</p>
    </div>
</section>


<!-- To Top -->
<button class="to-top" id="to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<script>
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
    function change_lang(lang) {
        $.ajax({
            url: "api/changeLanguage.php",
            type: "POST",
            data: {
                lang
            },
            success: function(result) {
                window.location.reload();
            }
        })
    }

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
                    'fa-solid fa-sun' :
                    'fa-solid fa-moon';
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>