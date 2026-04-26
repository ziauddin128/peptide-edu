<!-- Footer -->
<section class="footer border-top">
    <div class="container">
        <p>
            <i class="fa-regular fa-copyright"></i> 2026 peptideEdu all right
            reserved.
        </p>
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
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>