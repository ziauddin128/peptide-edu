<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>odbiolab | Admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="asset/dist/css/style.css">
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="../assets/images/logo.png" class="w-50" alt="logo">
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign In</p>

        <form id="login-form">
          <div class="mb-3">
            <div class="input-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <p class="error-msg" id="email-error"></p>
          </div>

          <div class="mb-3">
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <p class="error-msg" id="password-error"></p>

          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- <script src="asset/plugins/jquery/jquery.min.js"></script> -->
  <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/dist/js/adminlte.min.js"></script>

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