<!DOCTYPE html>
<html lang="en">
<?php
$Error = "";

if (count($_POST) > 0) {
    $user = new User();
    $Error = $user->login($_POST);
    if ($Error == "") {
        header("Location: dashboard");
        die;
    }
}

?>
<?php


?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-msg.css" />
    <link rel="stylesheet" href="./plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/newStyle.css" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400"
      rel="stylesheet"
    />
    <link rel="icon" href="./private/img/logo.png">
    <link
      href="https://fonts.googleapis.com/css?family=Lato:900&amp;subset=latin-ext"
      rel="stylesheet"
    />
</head>

<body style="overflow: hidden;">
    <section id="home" class="bg-cover text-white register-page" style="
        overflow: hidden;
        background-image: url(./private/img/bg.webp);
        height: 100%vh;">
        <div class="glass-reg">
            <div class="row gy-5 " style="justify-content: center;">
                <div class="col-md-5 left-half"></div>
                <div class="col-md-1"></div>
                <div class="col-md-6 glass-form right-half text-center">
                    <div class="row">
                        <div class="col-12 section-intro text-center">
                            <img src="./private/img/logo.png" width="80px" height="80px" alt=""><br />
                        </div>
                    </div>
                    <h2 class="text-center purple-gradient-text mt-3">
                        <strong> Login</strong>

                    </h2>
                    <form class="mt-4 " method="post" id="loginForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uname" class="ml-3">Username</label>
                                <input type="text" class="form-control n" name="uname" id="uname"
                                    placeholder="Username" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password" class="ml-3">Password</label>
                                <input type="password" class="form-control n" name="password" id="password"
                                    placeholder="Password" />
                            </div>
                        </div>


                        <input type="submit" id="login" class="btn btn-danger"
                            style="border-radius: 50px; background-color:#f52f40; padding-left: 20px;padding-right: 20px;"
                            value="Sign In" />
                    </form>
                    <div class="mt-2">
                        <a href="register" class="botom-text mt-4"> Didn't have an account ? </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="intercom-lightweight-app-launcher intercom-launcher" aria-live="polite"
        aria-label="Open Intercom Messenger" tabindex="0" role="button">
        <div class="intercom-lightweight-app-launcher-icon intercom-lightweight-app-launcher-icon-open">
            <a href="index"><i class="fa-solid fa-house" style="color: #fff; font-size: 25px"></i></a>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./js/demo.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <!-- <script src="../plugins/joi/joi-browser.min.js"></script> -->
    <script type="text/javascript" src="./js/bootstrap-msg.js"></script>
    <!-- jquery-validation -->
    <script src="./js/jquery-validation/jquery.validate.min.js"></script>
    <script src="./js/jquery-validation/additional-methods.min.js"></script>
    <script src="./js/message.js"></script>
    <script src="./js/script.js">
    </script>
    <?php
    if ($Error != "") {
        echo "<script type='text/javascript'>msg('danger',' $Error');</script>";
    }
    ?>
    <script>
    // Disable right-click
    document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
    });

    // Disable text selection
    document.addEventListener('selectstart', function (event) {
        event.preventDefault();
    });
</script>

</body>

</html>