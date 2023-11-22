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
        ?>
        <?PHP
        include 'headerbar.php';
        ?>
        
        

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Register New Admin</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Register New Admin</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <form action="#" class="form formAdmin">
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
                                                <h3 class="card-title text-light">Admin Details</h3>
                                            </div>
                                            <div class="row pt-3">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Admin ID</label>
                                                        <input type="text" id="admin_id" name='admin_id' class="form-control" placeholder="Admin Id  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin First Name</label>
                                                        <input type="text" id="fname" name='fname' class="form-control" placeholder="Admin First Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Email</label>
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Admin Email  ">
                                                        <div class="invalid-feedback"></div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Mobile Number</label>
                                                        <input type="number" name='mobile' id="mobile" class="form-control" placeholder="Admin Mobile Number  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Birth Day</label>
                                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                            <input type="text" id="bday" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Address Line 2</label>
                                                        <input type="text" name='address2' id="address2" class="form-control" placeholder="Admin Address Line 2  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="admin_type">Branch</label>
                                                        <select class="custom-select rounded-0" id="admin_type">

                                                            <?php
                                                            $employee = new Employee();
                                                            $result = $employee->getBranches();
                                                            if ($result) {
                                                                foreach ($result as $row) {
                                                                    echo '<option>' . clear($row["branch_name"]) . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Last Name</label>
                                                        <input type="text" name='lname' id="lname" class="form-control" placeholder="Admin Last Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin NIC</label>
                                                        <input type="text" name='nic' id="nic" class="form-control" placeholder="Admin NIC  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Gender</label><br />
                                                        <div class="form-control">
                                                            <div class="form-group form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="male" value="option2" checked>
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-group form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="female" value="option2">
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label>Admin Address Line 1</label>
                                                        <input type="text" name='address1' id="address1" class="form-control" placeholder="Admin Address Line 1  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admin Address Line 3</label>
                                                        <input type="text" name='address3' id="address3" class="form-control" placeholder="Admin Address Line 3  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <!-- /.form-group -->

                                                </div>
                                                <!-- /.col -->

                                            </div>
                                        </div>

                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Admin Login Details</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <label>Admin User Name</label>
                                                        <input type="text" name='userName' id="uname" class="form-control" placeholder="Admin User Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <label>Admin Password</label>
                                                        <input type="password" id="password" name='password' class="form-control" placeholder="Admin Password  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="submit" class="form-control btn btn-success" value="Save Admin" />
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>

                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                    
        </div>
        
        </section>
        </form>
        
    </div>
    <?php include "footer.php"?>
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
    <script src="validate_admin.js"></script>
    <script src="message.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#register').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
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
            bsCustomFileInput.init();
        });
    </script>
</body>
</hml>