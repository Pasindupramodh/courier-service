<?php
include("header.php");

?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit Express</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-msg/bootstrap-msg.css" />
    <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="../images/icons/logo.png">
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?PHP
        include 'adminsidebar.php';
        $Error = "";

        if (count($_POST) > 0) {

            $user = new Employee();
            $Error = $user->getCourierBarcode($_POST['barcode_no']);
        }
        ?><?PHP
        include 'headerbar.php';
        ?>
        

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Tracking</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Update Tracking</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <form method="post">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">
                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Barcode No</h3>
                                            </div>
                                            <div class="row pt-3">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="barcode_no">Barcode No</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend ">
                                                                <span class="input-group-text "><i class="fas fa-search"></i></span>
                                                            </div>
                                                            <input type="text" id="barcode_no" name='barcode_no' class="form-control" placeholder="Barcode No  " autofocus>

                                                        </div>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="input-group mb-3 bg-secondary">

                                                        <input type="submit" class="form-control btn btn-secondary" value="Search" />
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6">


                                                    <!-- /.form-group -->

                                                </div>
                                                <!-- /.col -->

                                            </div>
                                        </div>
                                        <?php

                                        if ($Error != "") {
                                            $row = ($Error[0]);
                                            $tracking =  $user->getTracking($row['courier_id']);
                                            $lastStatus = end($tracking);
                                        ?>
                                            <input type="hidden" id="c_id" value="<?= clear($row['courier_id']) ?>" />
                                            <div class="card card-primary  card-outline">
                                                <div class="card-header">
                                                    <h3 class="card-title ">Courier Details</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped table-text table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Delivery Charge</th>
                                                                    <th>Package Price</th>
                                                                    <th>Package Desc</th>
                                                                    <th>Package Weight</th>
                                                                    <th>Type</th>
                                                                    <th>Status</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo clear($row["barcode_no"]); ?></td>
                                                                    <td><?php echo clear($row["charge"]); ?></td>
                                                                    <td><?php echo clear($row["package_price"]); ?></td>
                                                                    <td><?php echo clear($row["package_desc"]); ?></td>
                                                                    <td><?php echo clear($row["package_weight"]); ?></td>
                                                                    <td><?php echo clear($row["courier_type"]); ?>
                                                                    </td>
                                                                    <td><?php echo clear($lastStatus["status"]); ?></td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card card-primary card-outline">
                                                        <div class="card-header">
                                                            <h3 class="card-title ">Sender Details</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example1" class="table table-bordered table-striped table-text table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sender Name</th>
                                                                            <th>Sender Address</th>
                                                                            <th>Sender mobile</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td><?php echo clear($row["sender_fname"] . ' ' . $row["sender_lname"]); ?></td>
                                                                            <td><?= clear($row['sender_address_line_1'] . ', ' . $row['sender_address_line_2'] . ', ' . $user->getDistrictName($row['sender_address_line_3'])) ?></td>
                                                                            <td><?php echo clear($row["sender_mobile"]); ?></td>
                                                                        </tr>

                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card card-primary card-outline">
                                                        <div class="card-header">
                                                            <h3 class="card-title ">Receiver Details</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example1" class="table table-bordered table-striped table-text table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Receiver Name</th>
                                                                            <th>Receiver Address</th>
                                                                            <th>Receiver mobile</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td><?php echo clear($row["receiver_fname"] . ' ' . $row["receiver_lname"]); ?></td>
                                                                            <td><?= clear($row['receiver_address_line_1'] . ', ' . $row['receiver_address_line_2'] . ', ' . $user->getDistrictName($row['receiver_address_line_3'])) ?></td>
                                                                            <td><?php echo clear($row["receiver_mobile"]); ?></td>
                                                                        </tr>

                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card card-primary card-outline ">
                                                        <div class="card-body">
                                                            <?php
                                                            if ($lastStatus["status"] == "Pending" || (strtok(($lastStatus["status"]), " ") == "Out" && $lastStatus["status"] != "Out For Delivery")) {

                                                            ?>
                                                                <button class='btn  bg-success m-2' id="receive" value="Received">Received To The branch</button>
                                                            <?php
                                                            } else if ($row["status"] == "Finished") {
                                                            } else if (strtok(($lastStatus["status"]), " ") == "Received" || strtok(($lastStatus["status"]), " ") == "Return") { ?>
                                                                <div class="btn-group me-2" role="group" aria-label="First group">
                                                                    <button class='btn  bg-success m-2' value="Out For Delivery" id="out_for">Out For Delivery</button>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group row">
                                                                        <label for="admin_type" class="col-sm-2 col-form-label">Out For </label>
                                                                        <div class="col-sm-8">
                                                                            <select class="custom-select rounded-0" id="branch_name">

                                                                                <?php
                                                                                $result = $user->getBranches();
                                                                                if ($result) {
                                                                                    foreach ($result as $row) {
                                                                                        echo '<option value="'. clear($row["branch_name"]) .'" >' . clear($row["branch_name"]) . '</option>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <button class='btn bg-success' id="save-branch" value="Out For">Save</button>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            <?php
                                                            } else if ($lastStatus['status'] == "Out For Delivery") { ?>
                                                                <button class='btn  bg-success m-2' id="finish" value="Finished">Finished</button>
                                                                <button class='btn  bg-success m-2' id="returned" value="Returned">Returned</button>
                                                                <button type="button" class="btn bg-danger float-right  m-2" data-toggle="modal" data-target="#exampleModal" data-whatever="Return">Schedule Return</button>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                        <?php
                                        }
                                        ?>

                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>

                </form>

            </section>

        </div>
        <?php include "footer.php" ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reason to return</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="reason" class="col-form-label">Reason:</label>
                                <input type="text" name="reason" class="form-control" id="reason">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- date-range-picker -->
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="../plugins/dropzone/min/dropzone.min.js"></script>
    <script src="../plugins/joi/joi-browser.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap-msg/bootstrap-msg.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="message.js"></script>

    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    var id = $('#c_id').val();
                    var f = new FormData();
                    f.append("value", "Return");
                    f.append("cou", id);
                    f.append("reason",$('#reason').val());
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
                    r.open("POST", "updateTrackingProcess.php", true);
                    r.send(f);
                }
            });
            $('#form').validate({
                rules: {
                    reason: {
                        required: true,
                        minlength: 5,
                    },
                },
                messages: {
                    newUName: {
                        required: "Please Provide a reason",
                        minlength: "Your Reason must be at least 5 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
        })

        $('#finish').on('click', function(event) {
            event.preventDefault();
            var id = $('#c_id').val();
            var f = new FormData();
            f.append("value", $('#finish').val());
            f.append("cou", id);

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
            r.open("POST", "updateTrackingProcess.php", true);
            r.send(f);
        });


        $('#returned').on('click', function(event) {
            event.preventDefault();
            var id = $('#c_id').val();
            var f = new FormData();
            f.append("value", $('#returned').val());
            f.append("cou", id);

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
            r.open("POST", "updateTrackingProcess.php", true);
            r.send(f);
        });
        

        $('#save-branch').on('click', function(event) {
            event.preventDefault();
            var id = $('#c_id').val();
            var f = new FormData();
            f.append("value", $('#save-branch').val());
            f.append("cou", id);
            f.append("branch",$('#branch_name').val())
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
            r.open("POST", "updateTrackingProcess.php", true);
            r.send(f);

        });
        $('#out_for').on('click', function(event) {
            event.preventDefault();
            var id = $('#c_id').val();
            var f = new FormData();
            f.append("value", $('#out_for').val());
            f.append("cou", id);

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
            r.open("POST", "updateTrackingProcess.php", true);
            r.send(f);
        });

        $('#receive').on('click', function(event) {
            event.preventDefault();
            var id = $('#c_id').val();
            var f = new FormData();
            f.append("value", $('#receive').val());
            f.append("cou", id);

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
            r.open("POST", "updateTrackingProcess.php", true);
            r.send(f);
        });
    </script>
    <?php

    if ($Error == "") {
        echo '<script type = "text/javascript">msg("danger", "Cannot Found")</script>';
    }
    ?>
</body>
</hml>