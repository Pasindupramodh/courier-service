<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hopit | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">


  <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-msg/bootstrap-msg.css" />
  <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="icon" href="../images/icons/logo.png">
  <script src="https://www.google.com/recaptcha/api.js?render=6LdmAkYmAAAAAFh91V9gQLp6oR-XKP2PVnFtWmON"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
    function onClick(e) {
      e.preventDefault();
      grecaptcha.ready(function() {
        grecaptcha.execute('6LdmAkYmAAAAAFh91V9gQLp6oR-XKP2PVnFtWmON', {
          action: 'submit'
        }).then(function(token) {
          console.log(token);
        });
      });
    }
  </script>


</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <b>Hopit Express</b> Login
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="#" class="form">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="User Name" id="username" name="username">
            <div class="invalid-feedback"></div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-tie"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <div class="invalid-feedback"></div>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- <div class="input-group mb-3">
            <div class="g-recaptcha" data-sitekey="6LcBBkYmAAAAABNE_Qanpf47T6UbKerDya7KGT5C"></div>
            <div class="invalid-feedback"></div>
          </div> -->
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" class="form-control btn btn-primary" value="Sign In" />
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="">I forgot my password</a>
        </p>
        <p class="mb-0">
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </div>
  
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>

  <script src="../plugins/joi/joi-browser.min.js"></script>
  <script type="text/javascript" src="../plugins/bootstrap-msg/bootstrap-msg.js"></script>
  <script src="message.js"></script>
  <script src="validateLogin.js"></script>

  
</body>

</html>