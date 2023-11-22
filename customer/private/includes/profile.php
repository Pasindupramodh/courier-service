<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit | User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="./css/adminlte.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="./css/select2.min.css">
    <link rel="stylesheet" href="./css/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

    <link rel="stylesheet" type="text/css" href="./css/bootstrap-msg.css" />
    <link rel="stylesheet" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" /> -->
    <link rel="icon" href="./private/img/logo.png">
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
        ?>
        <?PHP
        include 'headerbar.php';
        ?>

        <?php

        $db = new User();
        $result1 = $db->getCus();
        $row1 = $result1[0];
        
        $image = "s.png";
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
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
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
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="data:image/<?= "png;base64," . base64_encode(file_get_contents("./profile_img/" . $image)) ?>"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">
                                        <?php echo clear($_SESSION["name"]); ?>
                                    </h3>

                                    <p class="text-muted text-center">Customer</p>

                                    <!-- <input type="file" name="image" value="Choose Image"
                                        class="btn btn-primary col fileinput-button image"> -->
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
                                    <strong><i class="fas fa-light fa-phone fa-rotate-180 mr-1"></i> Contact
                                        Number</strong>

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
                                        <?php echo clear($row1["address_line_1"] . ', ' . $row1["address_line_2"] . ', ' . $row1["district_name"]) ?>
                                    </p>

                                    <hr>



                                    <strong><i class="fas fa-solid fa-id-card mr-1"></i> NIC</strong>

                                    <p class="text-muted">
                                        <?php echo clear($row1["nic"]) ?>
                                    </p>
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
                                            <a class="nav-link active" href="#general" data-toggle="tab">General
                                                Setting</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#change" data-toggle="tab">Change Username /
                                                Password</a>
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
                                                    <label for="fname" class="col-sm-2 col-form-label">First
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="fname" class="form-control" id="fname"
                                                            placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="lname" class="form-control" id="lname"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile
                                                        Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="tel" class="form-control" name="mobile" id="mobile"
                                                            placeholder="Mobile Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nic" class="col-sm-2 col-form-label">NIC</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nic" id="nic"
                                                            placeholder="NIC">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address1" class="col-sm-2 col-form-label">Address Line
                                                        1</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address1"
                                                            id="address1" placeholder="Address Line 1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address2" class="col-sm-2 col-form-label">Address Line
                                                        2</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address2"
                                                            id="address2" placeholder="Address Line 2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address3" class="col-sm-2 col-form-label">Address Line
                                                        3</label>
                                                    <div class="col-sm-10">
                                                    <select class="form-control select2"
                                                             id="address3"
                                                            name="address3" style="width: 100%;" aria-placeholder="Select District" >
                                                            <?php
                                                            $district = new District();
                                                            $result = $district->getCities();
                                                            if ($result) {
                                                                foreach ($result as $row) {
                                                                    echo '<option value="' . clear($row["district_id"]) . '">' . clear($row["district_name"]) . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="change">
                                            <form class="form-horizontal" id="unameForm" autocomplete="off">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label text-primary ml-4">Change
                                                        Username</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newUName" class="col-sm-2 col-form-label">New User
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="newUName"
                                                            id="newUName" autocomplete="off"
                                                            placeholder="New User Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cPassword" class="col-sm-2 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="cPassword" class="form-control"
                                                            autocomplete="off" id="cPassword"
                                                            placeholder="Current Password">
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
                                                    <label class="col-sm-3 col-form-label text-primary ml-4">Change
                                                        Password</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="uPassword" class="col-sm-3 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control"
                                                            name="uPassword" id="uPassword"
                                                            placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nPassword" class="col-sm-3 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control"
                                                            name="nPassword" id="nPassword" placeholder="New Password">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="rPassword" class="col-sm-3 col-form-label">Confirm
                                                        Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" autocomplete="off" class="form-control"
                                                            name="rPassword" id="rPassword"
                                                            placeholder="Confirm New Password">
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
        <?php include "footer.php" ?>

        <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
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
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/additional-methods.min.js"></script>
    <script src="./js/message.js"></script>
    <script src="./js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
        $(function () {
            $.validator.setDefaults({
                submitHandler: function (form) {
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

                    r.open("POST", "updateProfileProcess", true);

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
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-10').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
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

                    r.open("POST", "updatePassword", true);

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
                },
                messages: {
                    uPassword: {
                        required: "Please enter Current Password",
                        minlength: "Your password must be at least 8 characters long"
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
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-9').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
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

                    r.open("POST", "updateUserName", true);

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
                        minlength: 8,
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
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-10').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });




        var bs_modal = $('#modal');
        var image = document.getElementById('image');
        var cropper, reader, file;


        $("body").on("change", ".image", function (e) {
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                bs_modal.modal('show');
            };
            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        bs_modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "crop_image_upload",
                        data: {
                            image: base64data
                        },
                        success: function (data) {
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