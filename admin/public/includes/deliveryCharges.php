<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit | Delivery Charges</title>

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
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Data Tables-->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->


        <?php
        include("header.php");
        ?><?PHP
        include 'adminsidebar.php';
        ?>
        <?PHP
        include 'headerbar.php';
        ?>
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Delivery Charges</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Delivery Charges</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <form class="form formZone" id="formZone">
                        <div class="row">

                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">
                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Delivery Charges</h3>
                                            </div>
                                            <div class="row pt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="zone_name">Zone Name</label>
                                                        <input type="text" id="zone_name" name='zone_name' class="form-control" placeholder="Zone Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="zone_cities">Cities In Zone</label>
                                                        <select class="select2" multiple="multiple" id="zone_cities" name="zone_cities" data-placeholder="Cities In Zone" style="width: 100%;">
                                                            <?php
                                                            $employee = new Employee();
                                                            $result = $employee->getCities();
                                                            if ($result) {
                                                                foreach ($result as $row) {
                                                                    echo '<option value="' . clear($row["district_id"]) . '">' . clear($row["district_name"]) . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fee">Delivery Fee</label>
                                                        <input type="number" id="fee" name='fee' class="form-control" placeholder="Delivery Fee  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- /.col -->
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label>Extra Charge</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="from" class="text-center">From</label>
                                                                    <input type="number" id="from" name='from' class="form-control " placeholder="From (KG)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="to" class="text-center">To</label>
                                                                    <input type="number" id="to" name='to' class="form-control " placeholder="To (KG)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="charge" class="text-center">Charge</label>
                                                                    <input type="number" id="charge" name='charge' class="form-control " placeholder="Charge (Rs)">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="invalid-feedback"></div>
                                                    </div>


                                                </div>
                                                <!-- /.col -->

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-success" value="Save Delivery Charge" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                </div>
                <form class="form formExtra" id="formExtra">
                    <section class="content">
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
                                                    <h3 class="card-title text-light">Extra Charges</h3>
                                                </div>
                                                <div class="row pt-3">

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="zones">Cities In Zone</label>
                                                            <select class="select" id="zones" name="zones" data-placeholder="Select Zone" style="width: 100%;">
                                                                <?php
                                                                $employee = new Employee();
                                                                $result = $employee->getAllZones();
                                                                if ($result) {
                                                                    foreach ($result as $row) {
                                                                        echo '<option value="' . clear($row["zone_id"]) . '">' . clear($row["zone_name"]) . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Extra Charge</label>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="from_extra" class="text-center">From</label>
                                                                        <input type="number" id="from_extra" name='from_extra' class="form-control " placeholder="From (KG)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="to_extra" class="text-center">To</label>
                                                                        <input type="number" id="to_extra" name='to_extra' class="form-control " placeholder="To (KG)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="charge_extra" class="text-center">Charge</label>
                                                                        <input type="number" id="charge_extra" name='charge_extra' class="form-control " placeholder="Charge (Rs)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="invalid-feedback"></div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6"></div>


                                                    <!-- /.col -->

                                                    <!-- /.col -->

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="submit" class="form-control btn btn-success" value="Save Extra Charge" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </section>
                </form>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h2 class="card-title">Delivery Charges</h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0 pl-3 pr-3 pb-3">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Zone Name</th>
                                                    <th>Districts In Zone</th>
                                                    <th>Delivery Fee</th>
                                                    <th>------</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $employee = new Employee();
                                                $result = $employee->getAllZones();
                                                if ($result) {
                                                    foreach ($result as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?= clear($row["zone_name"]) ?></td>
                                                            <?php
                                                            $result2 = $employee->getAllZoneDistricts($row["zone_id"]);
                                                            if ($result2) {
                                                                $districts = "";
                                                                foreach ($result2 as $row2) {
                                                                    $districts .= $row2["district_name"] . " , ";
                                                                }
                                                            }
                                                            ?>

                                                            <td><?= clear($districts) ?></td>
                                                            <td><?= clear($row["zone_charge"]) ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo clear($row["zone_id"]); ?>">Update Delivery Charge</button>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h2 class="card-title">Extra Charges</h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0 pl-3 pr-3 pb-3">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Zone Name</th>
                                                    <th>From(KG)</th>
                                                    <th>TO(KG)</th>
                                                    <th>Charge(RS)</th>
                                                    <th>-----</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $employee = new Employee();
                                                $result = $employee->getAllZonesExtraCharges();
                                                if ($result) {
                                                    foreach ($result as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?= clear($row["zone_name"]) ?></td>
                                                            
                                                            <td><?= clear($row["extra_from"])?></td>
                                                            

                                                            <td><?= clear($row["extra_to"])?></td>
                                                            <td><?= clear($row["extra_charge"]) ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="<?php echo clear($row["extra_charge_id"]); ?>">Update Extra Charge</button>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
        </div>

        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form formUpdate" id="formUpdate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Delivery Charge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <!-- <label for="zone_id" class="col-form-label">Recipient:</label> -->
                                <input type="hidden" class="form-control" id="zone_id">
                            </div>
                            <div class="form-group">
                                <label for="new_fee" class="col-form-label">New Delivery Charge:</label>
                                <input type="number" name="new_fee" class="form-control" id="new_fee"></textarea>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form formUpdateExtra" id="formUpdateExtra">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Extra Charge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <!-- <label for="zone_id" class="col-form-label">Recipient:</label> -->
                                <input type="hidden" class="form-control" id="extra_charge_id">
                            </div>
                            <div class="form-group">
                                <label for="new_extra" class="col-form-label">New Extra Charge:</label>
                                <input type="number" name="new_extra" class="form-control" id="new_extra"></textarea>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php include "footer.php" ?>

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
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


        });




        $('#exampleModal1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('#extra_charge_id').val(recipient)
        })

        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {
                    var id = $('#extra_charge_id').val();
                    var fee = $('#new_extra').val();

                    var f = new FormData();
                    f.append("extra_charge_id", id);
                    f.append("extra", fee);
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
                    r.open("POST", "newExtraCharge.php", true);
                    r.send(f);

                }
            });
            $('#formUpdateExtra').validate({
                rules: {
                    new_extra: {
                        required: true,
                    },

                },
                messages: {

                    new_extra: {
                        required: "Can't Empty",
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
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('#zone_id').val(recipient)
        })

        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {
                    var id = $('#zone_id').val();
                    var fee = $('#new_fee').val();

                    var f = new FormData();
                    f.append("zone_id", id);
                    f.append("fee", fee);
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
                    r.open("POST", "updateZoneCharge.php", true);
                    r.send(f);

                }
            });
            $('#formUpdate').validate({
                rules: {
                    new_fee: {
                        required: true,
                    },

                },
                messages: {

                    zonew_fee: {
                        required: "Can't Empty",
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
        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {
                    var values = $('#zones').val();
                    var from = $('#from_extra').val();
                    var to = $('#to_extra').val();
                    var charge = $('#charge_extra').val();

                    var f = new FormData();
                    f.append("zone", values);
                    f.append("from", from);
                    f.append("to", to);
                    f.append("charge", charge);
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
                    r.open("POST", "updateExtraCharge.php", true);
                    r.send(f);

                }
            });
            $('#formExtra').validate({
                rules: {
                    zones: {
                        required: true,
                    },
                    from_extra: {
                        required: true,
                    },
                    to_extra: {
                        required: true,
                    },
                    charge_extra: {
                        required: true,
                    }

                },
                messages: {

                    zones: {
                        required: "Please select at least one city",
                    },
                    from_extra: {
                        required: "Can't Empty"
                    },
                    to_extra: {
                        required: "Can't Empty"
                    },
                    charge_extra: {
                        required: "Can't Empty"
                    }

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
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


        });
        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {
                    var values = $('#zone_cities').val();
                    var zone_name = $('#zone_name').val();
                    var from = $('#from').val();
                    var to = $('#to').val();
                    var charge = $('#charge').val();
                    var fee = $('#fee').val();

                    var f = new FormData();
                    f.append("cities", values);
                    f.append("zone_name", zone_name);
                    f.append("from", from);
                    f.append("to", to);
                    f.append("charge", charge);
                    f.append("fee", fee);
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
                    r.open("POST", "saveZoneProcess.php", true);
                    r.send(f);

                }
            });
            $('#formZone').validate({
                rules: {
                    zone_cities: {
                        required: true,
                    },
                    zone_name: {
                        required: true,
                        minlength: 3,
                    },
                    from: {
                        required: true,
                    },
                    to: {
                        required: true,
                    },
                    charge: {
                        required: true,
                    },
                    fee: {
                        required: true
                    }

                },
                messages: {

                    zone_cities: {
                        required: "Please select at least one city",
                    },
                    zone_name: {
                        required: "Please provide a Zone Name",
                        minlength: "Your Zone Name must be at least 3 characters long",
                    },
                    from: {
                        required: "Can't Empty"
                    },
                    to: {
                        required: "Can't Empty"
                    },
                    charge: {
                        required: "Can't Empty"
                    },
                    fee: {
                        required: "Can't Empty"
                    }


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
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>