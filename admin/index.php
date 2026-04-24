<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PeptideEdu | Admin</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex flex-column justify-content-center align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="assets/images/logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form id="login-form" class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email">
                  <p class="error-msg" id="email-error"></p>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                  <p class="error-msg" id="password-error"></p>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#login-form").submit(function(e) {
        e.preventDefault();

        let is_valid = true;
        let email = $("#email").val();
        let password = $("#password").val();

        $(".error-msg").hide();

        if (email == "") {
          $("#email-error").show().html('Email is required');
          is_valid = false;
        }

        if (password == "") {
          $("#password-error").show().html('Password is required');
          is_valid = false;
        }

        if (is_valid) {
          $.ajax({
            url: "api/login.php",
            type: "POST",
            data: $("#login-form").serializeArray(),
            success: function(result) {
              let data = JSON.parse(result);

              if (data.success) {
                window.location.assign('peptides');
              } else {
                Swal.fire({
                  title: "Login Failed",
                  text: data.message,
                  icon: "error"
                });
              }
            }
          })
        }

      })
    })
  </script>

</body>

</html>