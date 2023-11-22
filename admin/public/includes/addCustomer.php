<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit | Add Courier</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-msg/bootstrap-msg.css" />
    <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="../images/icons/logo.png">
    <link rel="stylesheet" href="../css/style.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

</head>

<body class="hold-transition sidebar-mini">
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
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add New Courier</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Add New Courier</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <form action="#" class="form formStaff">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">

                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Sender Details</h3>
                                            </div>

                                            <div class="form-row pt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sender_fname">Sender First Name</label>
                                                        <input type="text" id="sender_fname" name='sender_fname' class="form-control" placeholder="Sender First Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sender_lname">Sender Last Name</label>
                                                        <input type="text" name='sender_lname' id="sender_lname" class="form-control" placeholder="Sender Last Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sender_mobile">Sender Mobile Number</label>
                                                        <input type="tel" name='sender_mobile' id="sender_mobile" class="form-control" placeholder="Sender Mobile Number  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="sender_address1">Sender Address Line 1</label>
                                                        <input type="text" name='sender_address1' id="sender_address1" class="form-control" placeholder="Sender Address Line 1  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sender_address2">Sender Address Line 2</label>
                                                        <input type="text" name='sender_address2' id="sender_address2" class="form-control" placeholder="Sender Address Line 2  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <!-- /.col -->





                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sender_address3">Sender Address Line 3</label>
                                                        <select class="form-control select2" id="sender_address3" name="sender_address3" style="width: 100%;">
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
                                                </div>
                                            </div>




                                            <!-- /.form-group -->


                                            <!-- /.col -->


                                        </div>

                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Receiver Details</h3>
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="receiver_fname">Receiver First Name</label>
                                                        <input type="text" id="receiver_fname" name='receiver_fname' class="form-control" placeholder="Receiver First Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="receiver_lname">Receiver Last Name</label>
                                                        <input type="text" name='receiver_lname' id="receiver_lname" class="form-control" placeholder="Receiver Last Name  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="receiver_mobile">Receiver Mobile Number</label>
                                                        <input type="tel" name='receiver_mobile' id="receiver_mobile" class="form-control" placeholder="Receiver Mobile Number  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="receiver_address1">Receiver Address Line 1</label>
                                                        <input type="text" name='receiver_address1' id="receiver_address1" class="form-control" placeholder="Receiver Address Line 1  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="receiver_address2">Receiver Address Line 2</label>
                                                        <input type="text" name='receiver_address2' id="receiver_address2" class="form-control" placeholder="Receiver Address Line 2  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <!-- /.col -->





                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="receiver_address3">Receiver Address Line 3</label>
                                                        <select class="form-control select2" id="receiver_address3" name="receiver_address3" style="width: 100%;">
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
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card card-primary p-3">
                                            <div class="card-header">
                                                <h3 class="card-title text-light">Package Details</h3>
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Staff First Name</label>
                                                        <div class="form-control">
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="cod" value="1" name="r1" checked>
                                                                    <label for="cod">
                                                                        COD
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" value="3" id="cash" name="r1">
                                                                    <label for="cash">
                                                                        Cash
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" value="2" id="credit" name="r1" >
                                                                    <label for="credit">
                                                                        Credit
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="package_price" >Package Price</label>
                                                        <input type="number" name='package_price' id="package_price" class="form-control" placeholder="Package Price  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="package_weight" >Package Weight</label>
                                                        <input type="number" name='package_weight' id="package_weight" class="form-control" placeholder="Package Weight  ">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="delivery_charge" >Delivery Charge</label>
                                                        <input type="text" name='delivery_charge' id="delivery_charge" class="form-control" placeholder="Delivery Charge  " readonly>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="desc">Package Description</label>
                                                        <textarea class="form-control" placeholder="Package Description" name="desc" id="desc" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="submit" class="form-control btn btn-success" value="Save Staff" />
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>

                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->

                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>
        </div>

        </section>


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
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>