<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit | User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-msg/bootstrap-msg.css" />
    <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="../images/icons/logo.png">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini" onload="q1()">
    <div class="wrapper">
        <!-- Navbar -->


        <?php
        include("header.php");
        ?>
        <?PHP
        include 'adminsidebar.php';
        ?><?PHP
        include 'headerbar.php';
        ?>
        
        <?php

        $db = new Database();
        $arr = array();
        $arr['emp_id'] = $_SESSION["user_id"];

        $result1 = $db->db_read("select * from employee where user_id = :emp_id", $arr);
        $row1 = $result1[0];
        $adminId = $row1["emp_id"];

        $check = $db->db_check("select * from admin_img where user_id = :emp_id", $arr);
        if($check){
            $result = $db->db_read("select * from admin_img where user_id = :emp_id", $arr);
        $row = $result[0];
        $image = $row["img_path"];
        }else{
            $image ="s.png";
        }

        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--  default image where we will set the src via jquery-->
                                        <img id="image">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="data:image/<?= "png;base64,".base64_encode(file_get_contents("../../private/profile_images/".$image))?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo clear($_SESSION["name"]); ?></h3>

                                    <p class="text-muted text-center">
                                        <?php
                                        if (role() == 1) {
                                            echo "Admin";
                                        } else if (role() == 2) {
                                            echo "Manager";
                                        } else {
                                            echo "Staff";
                                        }
                                        ?></p>

                                    <!-- <input type="file" name="image" value="Choose Image" class="btn btn-primary col fileinput-button image"> -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-light fa-phone fa-rotate-180 mr-1"></i> Contact Number</strong>

                                    <p class="text-muted">
                                        <?php echo clear($row1["mobile"]) ?>
                                    </p>

                                    <hr>
                                    <strong><i class="fas fa-solid fa-envelope mr-1"></i> Email</strong>

                                    <p class="text-muted">
                                        <?php echo clear($row1["email"]) ?>
                                    </p>

                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">
                                        <?php echo clear($row1["address_line_1"] . ', ' . $row1["address_line_2"] . ', ' . $row1["address_line_3"]) ?>
                                    </p>

                                    <hr>



                                    <strong><i class="fas fa-solid fa-id-card mr-1"></i> NIC</strong>

                                    <p class="text-muted"><?php echo clear($row1["nic"]) ?></p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary card-outline">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#general" data-toggle="tab">General Setting</a>
                                        </li>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link" href="#secure" data-toggle="tab">Secure Password</a> -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#change" data-toggle="tab">Change Username / Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <input type="hidden" value="<?php echo clear($_SESSION["user_id"]); ?>" />
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="general">
                                            <form action="#" class="form-horizontal" id="update_profile">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nic" class="col-sm-2 col-form-label">NIC</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address1" class="col-sm-2 col-form-label">Address Line 1</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Line 1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address2" class="col-sm-2 col-form-label">Address Line 2</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line 2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address3" class="col-sm-2 col-form-label">Address Line 3</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address3" id="address3" placeholder="Address Line 3">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="secure">
                                            <!-- The timeline -->
                                            <form class="form-horizontal" id="sec_q">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Question</label>
                                                    <select id="sel1" class="form-control select2 col-sm-10 sel1" style="width: 100%;">
                                                        <option data-level="1" value="1" selected="selected">Alabama</option>
                                                        <option data-level="2" value="2">Alaska</option>
                                                        <option data-level="3" value="3">California</option>
                                                        <option data-level="4" value="4">Delaware</option>
                                                        <option data-level="5" value="5">Tennessee</option>
                                                        <option data-level="6" value="6">Texas</option>
                                                        <option data-level="7" value="7">Washington</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="a1" class="col-sm-2 col-form-label">Answer</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="a1" class="form-control" id="a1" placeholder="Answer">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Question</label>
                                                    <select id="sel2" class="form-control select2 col-sm-10 sel2" style="width: 100%;">
                                                        <option data-level="1" value="1" disabled="disabled">Alabama</option>
                                                        <option data-level="2" value="2" selected="selected">Alaska</option>
                                                        <option data-level="3" value="3">California</option>
                                                        <option data-level="4" value="4">Delaware</option>
                                                        <option data-level="5" value="5">Tennessee</option>
                                                        <option data-level="6" value="6">Texas</option>
                                                        <option data-level="7" value="7">Washington</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="a2" class="col-sm-2 col-form-label">Answer</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="a2" id="a2" placeholder="Answer">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="change">

                                            <div class="post">
                                                <div class="user-block">
                                                    <span class="username text-danger">
                                                        <!-- <a href="#" class="text-danger">Add Secure Questions For Secure Your Account</a> -->
                                                    </span>
                                                </div>
                                                <!-- /.user-block -->
                                            </div>
                                            <form class="form-horizontal" id="unameForm" autocomplete="off">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label text-primary ml-4">Change Username</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newUName" class="col-sm-2 col-form-label">New User Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="newUName" id="newUName" autocomplete="off" placeholder="New User Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cPassword" class="col-sm-2 col-form-label">Current Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="cPassword" class="form-control" autocomplete="off" id="cPassword" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr />
                                            <form class="form-horizontal" id="passwordForm" autocomplete="off">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label text-primary ml-4">Change Password</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="uPassword" class="col-sm-3 col-form-label">Current Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control" name="uPassword" id="uPassword" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nPassword" class="col-sm-3 col-form-label">New Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control" name="nPassword" id="nPassword" placeholder="New Password">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="rPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control" name="rPassword" id="rPassword" placeholder="Confirm New Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-3 col-sm-9">
                                                        <button type="submit" class="btn btn-primary">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>


                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include "footer.php"?>

        <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script src="../plugins/joi/joi-browser.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap-msg/bootstrap-msg.js"></script>
    <!-- jquery-validation -->
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="message.js"></script>
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {

                    var fname = document.getElementById("fname");
                    var lname = document.getElementById("lname");
                    var email = document.getElementById("email");
                    var mobile = document.getElementById("mobile");
                    var address1 = document.getElementById("address1");
                    var address2 = document.getElementById("address3");
                    var nic = document.getElementById("nic");
                    var address3 = document.getElementById("address3");

                    var f = new FormData();
                    f.append("fname", fname.value);
                    f.append("email", email.value);
                    f.append("mobile", mobile.value);
                    f.append("address1", address1.value);
                    f.append("address2", address2.value);
                    f.append("lname", lname.value);
                    f.append("nic", nic.value);
                    f.append("address3", address3.value);

                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            var t = r.responseText;
                            if (t.includes('successfully')) {
                                window.location.reload();
                            } else {
                                msg("danger", t);
                            }
                        }
                    }

                    r.open("POST", "updateProfileProcess.php", true);

                    r.send(f);

                }
            });
            $('#update_profile').validate({
                rules: {
                    fname: {
                        required: true,
                        minlength: 3,
                    },
                    lname: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                    },
                    nic: {
                        required: true,
                        minlength: 9,
                    },
                    address1: {
                        required: true,
                        minlength: 3,
                    },
                    address2: {
                        required: true,
                        minlength: 3,
                    },
                },
                messages: {

                    fname: {
                        required: "Please provide First Name",
                        minlength: "Your First Name must be at least 3 characters long",
                    },
                    lname: {
                        required: "Please provide Last Name",
                        minlength: "Your Last Name must be at least 3 characters long",
                    },
                    email: {
                        required: "Please provide a email",
                        email: "Please provide a valid Email",
                    },
                    mobile: {
                        required: "Please provide Mobile Number",
                        minlength: "Your Mobile Number must be at least 10 characters long",
                    },
                    nic: {
                        required: "Please provide NIC",
                        minlength: "Your NIC must be at least 9 characters long",
                    },
                    address1: {
                        required: "Please provide Address Line 1",
                        minlength: "Your Address Line 1 must be at least 3 characters long",
                    },
                    address2: {
                        required: "Please provide Address Line 2",
                        minlength: "Your Address Line 2 must be at least 3 characters long",
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-10').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    var uPassword = document.getElementById("uPassword");
                    var nPassword = document.getElementById("nPassword");
                    var rPassword = document.getElementById("rPassword");
                    var f = new FormData();
                    f.append("uPassword", uPassword.value);
                    f.append("nPassword", nPassword.value);
                    f.append("rPassword", rPassword.value);
                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function () {
                        if (r.readyState == 4) {
                            var t = r.responseText;
                            if (t.includes('successfully')) {
                                window.location.reload();
                            } else {
                                msg("danger", t);
                            }
                        }
                    }

                    r.open("POST", "updatePassword.php", true);

                    r.send(f);
                }
            });
            $('#passwordForm').validate({
                rules: {
                    uPassword: {
                        required: true,
                        minlength: 3,
                    },
                    nPassword: {
                        required: true,
                        minlength: 8,
                    },
                    rPassword: {
                        required: true,
                        minlength: 8,
                    },
                    terms: "Please accept our terms"
                },
                messages: {
                    uPassword: {
                        required: "Please enter Current Password",
                        minlength: "Your password must be at least 3 characters long"
                    },
                    nPassword: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    rPassword: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-9').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    var fname = document.getElementById("newUName");
                    var lname = document.getElementById("cPassword");

                    var f = new FormData();
                    f.append("newUName", fname.value);
                    f.append("cPassword", lname.value);

                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function () {
                        if (r.readyState == 4) {
                            var t = r.responseText;
                            if (t.includes('successfully')) {
                                window.location.reload();
                            } else {
                                msg("danger", t);
                            }
                        }
                    }

                    r.open("POST", "updateUserName.php", true);

                    r.send(f);
                }
            });
            $('#unameForm').validate({
                rules: {
                    newUName: {
                        required: true,
                        minlength: 5,
                    },
                    cPassword: {
                        required: true,
                        minlength: 5,
                    },
                },
                messages: {
                    newUName: {
                        required: "Please enter a New Username",
                        minlength: "Your Username must be at least 5 characters long"
                    },
                    cPassword: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-10').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#sec_q').validate({
                rules: {
                    a1: {
                        required: true,
                    },
                    a2: {
                        required: true,
                    },
                },
                messages: {
                    newUName: {
                        required: "Please provide a Answer",
                    },
                    cPassword: {
                        required: "Please provide a Answer",
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-10').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        function q1() {
            let gradeSelect = document.querySelector('.sel2')
            let gradeSelect1 = document.querySelector('.sel1')
            document.getElementById('sel1').onchange = function() {
                let level = this.value;

                gradeSelect.querySelectorAll('option[value]').forEach(function(option) {
                    option.disabled = (level === option.dataset.level)
                });
                // Sets the first one (Choose Grade Level) selected
                gradeSelect.querySelector('option').selected = false
            };

            document.getElementById('sel2').onchange = function() {
                let level = this.value;

                gradeSelect1.querySelectorAll('option[value]').forEach(function(option) {
                    option.disabled = (level === option.dataset.level)
                });
                // Sets the first one (Choose Grade Level) selected
                gradeSelect1.querySelector('option').selected = false
            };
        }

        var bs_modal = $('#modal');
        var image = document.getElementById('image');
        var cropper, reader, file;


        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                bs_modal.modal('show');
            };


            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        bs_modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    //alert(base64data);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "crop_image_upload.php",
                        data: {
                            image: base64data
                        },
                        success: function(data) {
                            bs_modal.modal('hide');
                            alert("success upload image");

                        }
                    });
                };
            });
        });
    </script>
</body>

</html>