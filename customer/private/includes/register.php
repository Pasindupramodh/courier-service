<!DOCTYPE html>
<html lang="en">
<?php

$Error = "";

if (count($_POST) > 0) {
    $user = new User();
    $Error = $user->register($_POST);

    if ($Error == "") {
        
    }
}

?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hopit Express</title>
    <link rel="stylesheet" href="http://localhost/hopit_home/plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://localhost/hopit_home/css/newStyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-msg.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="icon" href="./private/img/logo.png">
</head>

<body style="overflow: hidden;">
    <section id="home" class="bg-cover text-white register-page" style="
        overflow: hidden;
        background-image: url(./private/img/bg.webp);
        height: 100%vh;
      ">
        <div class="glass-reg" >
            <div class="row gy-5" style="justify-content: center;">
                <div class="col-md-5 left-half"></div>
                <div class="col-md-1"></div>
                <div class="col-md-6 glass-form right-half"  >
                <div class="row">
                        <div class="col-12 section-intro text-center">
                            <img src="./private/img/logo.png" width="80px" height="80px" alt=""><br />
                        </div>
                    </div>
                    <h2 class="text-center purple-gradient-text">
                        <strong> Register </strong>
                    </h2>
                    <form class="mt-4" id="form-register" method="post" >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uname" class="ml-3">Username</label>
                                <input type="text" class="form-control n" name="uname" id="uname" placeholder="Username" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password" class="ml-3">Password</label>
                                <input type="password" class="form-control n" name="password" id="password" placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="ml-3">Email</label>
                                <input type="email" class="form-control n" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile" class="ml-3">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                    placeholder="Mobile Number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="com_name" class="ml-3">Company Name</label>
                            <input type="text" class="form-control" id="com_name" name="com_name" placeholder="Company Name" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname" class="ml-3">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname" class="ml-3">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                    placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nic" class="ml-3">NIC</label>
                            <input type="number" class="form-control n" id="nic" name="nic"
                                placeholder="NIC Number" />
                        </div>
                        <div class="form-group">
                            <label for="address_1" class="ml-3">Address line 1</label>
                            <input type="text" class="form-control" id="address_1" name="address_1"
                                placeholder="Eg: no-108 C/2" />
                        </div>
                        <div class="form-group">
                            <label for="address_2" class="ml-3">Address line 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2"
                                placeholder="Standley Thilakarathna Mw" />
                        </div>
                        <div class="form-group">
                            <label for="address_3" class="ml-3">Address line 3</label>
                            <select id="address_3" name="address_3" class="form-control">
                            <?php
                                    $district = new District();
                                    $result = $district->getDistrict();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                    <option value="<?= clear($row['district_id']) ?>" > <?= clear($row['district_name']) ?> </option>
                                    <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="acc_name" class="ml-3">Account Name</label>
                                <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="Account Name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="acc_number" class="ml-3">Account Number</label>
                                <input type="number" class="form-control" id="acc_number" name="acc_number"
                                    placeholder="Account Number" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bank" class="ml-3">Bank</label>
                                <select id="bank" name="bank" class="form-control">
                                    <?php
                                    $bank = new Bank();
                                    $result = $bank->getBanks();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                    <option value="<?= clear($row['bank_id']) ?>" > <?= clear($row['bank_name'].'-'.$row['bank_code']) ?> </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_branch" class="ml-3" >Bank Branch</label>
                                <select id="bank_branch" name="bank_branch" class="form-control">
                                    <option selected>Choose a bank first</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" id="register" class="btn btn-danger"
                            style="border-radius: 50px; background-color:#f52f40; display: flex; justify-content:center; padding-left: 20px;padding-right: 20px;"
                            value="Sign Up" />
                    </form>
                    <div class="mt-2">
                        <a href="login" class="botom-text mt-4" style="display: flex; justify-content:center;" > Already have an account ? </a>
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
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js"></script> -->
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
    <script src="./js/script.js"></script>
    <?php
    if($Error == "Success"){
        echo "<script type='text/javascript'>msg('success','Registration Success..! wait for approval.');</script>";
    }else if ($Error != "") {
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