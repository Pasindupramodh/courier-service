<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit | View Couriers</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

    <link rel="stylesheet" type="text/css" href="./css/bootstrap-msg.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <link rel="icon" href="../images/icons/logo.png">
    <!-- Data Tables-->
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/buttons.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="./css/css/style.css"> -->
    <link rel="stylesheet" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" href="./private/img/logo.png">
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>View Couriers</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">View Couriers</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#general" data-toggle="tab">Pending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#secure" data-toggle="tab">In Transits</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#change" data-toggle="tab">Finished</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#return" data-toggle="tab">Returned</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="general">

                                            <div class="table-responsive">
                                                <table id="example1"
                                                    class="table table-bordered table-striped table-text table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Bar code</th>
                                                            <th>Sender Details</th>
                                                            <th>Receiver Details</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Package Price</th>
                                                            <th>Package Desc</th>
                                                            <th>Package Weight</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>----</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $employee = new Courier();
                                                        $result = $employee->getPendingCouriers();
                                                        if ($result) {
                                                            foreach ($result as $row) {
                                                                $tracking = $employee->getTracking(clear($row['courier_id']));
                                                                $lastStatus = end($tracking);

                                                                if ($lastStatus["status"] == "Pending") {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo clear($row["barcode_no"]); ?>
                                                                        </td>
                                                                        <td><button type="button" class='btn  bg-primary btn-sm '
                                                                                data-toggle="modal" data-target="#senderDetails"
                                                                                data-whatever="<?= clear($row['sender_id']) ?>">
                                                                                View Sender Details</button>
                                                                        </td>
                                                                        <td><button type="button" class='btn  bg-success btn-sm  '
                                                                                data-toggle="modal" data-target="#receiverDetails"
                                                                                data-whatever="<?= clear($row['receiver_id']) ?>">
                                                                                view Receiver Details</button></td>
                                                                        <td>
                                                                            <?php echo clear($row["charge"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_price"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_desc"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_weight"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["courier_type"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["status"]); ?>
                                                                        </td>
                                                                        <td><a class='btn  bg-success btn-sm  '
                                                                                href="print?p_id= <?= $row['courier_id'] ?> ">
                                                                                <i class="fas far fa-print"></i></a></td>

                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="secure">
                                            <!-- The timeline -->
                                            <div class="table-responsive">
                                                <table id="example2"
                                                    class="table table-bordered table-striped table-text table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Sender Details</th>
                                                            <th>Receiver Details</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Package Price</th>
                                                            <th>Package Desc</th>
                                                            <th>Package Weight</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>Track Order</th>
                                                            <th>----</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $employee = new Courier();
                                                        $result = $employee->getInTransitsCouriers();
                                                        if ($result) {
                                                            foreach ($result as $row) {
                                                                $tracking = $employee->getTracking(clear($row['courier_id']));
                                                                $lastStatus = end($tracking);

                                                                if ($lastStatus["status"] != "Pending" && $lastStatus["status"] != "Finished") {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo clear($row["barcode_no"]); ?>
                                                                        </td>
                                                                        <td><button type="button" class='btn  bg-primary btn-sm '
                                                                                data-toggle="modal" data-target="#senderDetails"
                                                                                data-whatever="<?= clear($row['sender_id']) ?>">
                                                                                View Sender Details</button>
                                                                        </td>
                                                                        <td><button type="button" class='btn  bg-success btn-sm  '
                                                                                data-toggle="modal" data-target="#receiverDetails"
                                                                                data-whatever="<?= clear($row['receiver_id']) ?>">
                                                                                view Receiver Details</button></td>
                                                                        <td>
                                                                            <?php echo clear($row["charge"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_price"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_desc"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["package_weight"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($row["courier_type"]); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo clear($lastStatus["status"]); ?>
                                                                        </td>
                                                                        <td><button type="button" class='btn  bg-success btn-sm  '
                                                                                data-toggle="modal" data-target="#trackingDetails"
                                                                                data-whatever="<?= clear($row['courier_id']) ?>">
                                                                                Track</button></td>

                                                                        <td><a class='btn  bg-success btn-sm  '
                                                                                href="print?p_id= <?= $row['courier_id'] ?> ">
                                                                                <i class="fas far fa-print"></i></a></td>

                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="change">

                                            <div class="table-responsive">
                                                <table id="example3"
                                                    class="table table-bordered table-striped table-text table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Sender Details</th>
                                                            <th>Receiver Details</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Package Price</th>
                                                            <th>Package Desc</th>
                                                            <th>Package Weight</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>---</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $employee = new Courier();
                                                        $result = $employee->getFinishedCouriers();
                                                        if ($result) {
                                                            foreach ($result as $row) {
                                                                ?>
                                                                <tr>

                                                                    <td>
                                                                        <?php echo clear($row["barcode_no"]); ?>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-primary btn-sm '
                                                                            data-toggle="modal" data-target="#senderDetails"
                                                                            data-whatever="<?= clear($row['sender_id']) ?>">
                                                                            View Sender Details</button>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-success btn-sm  '
                                                                            data-toggle="modal" data-target="#receiverDetails"
                                                                            data-whatever="<?= clear($row['receiver_id']) ?>">
                                                                            view Receiver Details</button></td>
                                                                    <td>
                                                                        <?php echo clear($row["charge"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_price"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_desc"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_weight"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["courier_type"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["status"]); ?>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-success btn-sm  '
                                                                                data-toggle="modal" data-target="#trackingDetails"
                                                                                data-whatever="<?= clear($row['courier_id']) ?>">
                                                                                Track</button></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="change">

                                            <div class="table-responsive">
                                                <table id="example3"
                                                    class="table table-bordered table-striped table-text table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Sender Details</th>
                                                            <th>Receiver Details</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Package Price</th>
                                                            <th>Package Desc</th>
                                                            <th>Package Weight</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>---</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $employee = new Courier();
                                                        $result = $employee->getReturnedCouriers();
                                                        if ($result) {
                                                            foreach ($result as $row) {
                                                                ?>
                                                                <tr>

                                                                    <td>
                                                                        <?php echo clear($row["barcode_no"]); ?>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-primary btn-sm '
                                                                            data-toggle="modal" data-target="#senderDetails"
                                                                            data-whatever="<?= clear($row['sender_id']) ?>">
                                                                            View Sender Details</button>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-success btn-sm  '
                                                                            data-toggle="modal" data-target="#receiverDetails"
                                                                            data-whatever="<?= clear($row['receiver_id']) ?>">
                                                                            view Receiver Details</button></td>
                                                                    <td>
                                                                        <?php echo clear($row["charge"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_price"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_desc"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["package_weight"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["courier_type"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo clear($row["status"]); ?>
                                                                    </td>
                                                                    <td><button type="button" class='btn  bg-success btn-sm  '
                                                                                data-toggle="modal" data-target="#trackingDetails"
                                                                                data-whatever="<?= clear($row['courier_id']) ?>">
                                                                                Track</button></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
            <div class="modal fade" id="senderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sender Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Sender Name :</label>
                                <p class="col-form-label" id="sender_name">Sender Name</p>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sender Mobile Number :</label>
                                <p class="col-form-label" id="sender_mobile">Sender Mobile Number</p>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sender Address :</label>
                                <p class="col-form-label" id="sender_address">Sender Address</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="receiverDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Receiver Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Receiver Name :</label>
                                <p class="col-form-label" id="receiver_name">Receiver Name</p>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Receiver Mobile Number :</label>
                                <p class="col-form-label" id="receiver_mobile">Receiver Mobile Number</p>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Receiver Address :</label>
                                <p class="col-form-label" id="receiver_address">Receiver Address</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="trackingDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tracking Package</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="timeline timeline-inverse" id="tracking">
                                

                            </div>


                        </div>
                    </div>
                </div>
            </div>
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
    <script type="text/javascript" src="./bootstrap-msg.js"></script>
    <!-- jquery-validation -->
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/additional-methods.min.js"></script>
    <script src="./js/message.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/dataTables.responsive.min.js"></script>
    <script src="./js/responsive.bootstrap4.min.js"></script>
    <script src="./js/dataTables.buttons.min.js"></script>
    <script src="./js/buttons.bootstrap4.min.js"></script>
    <script src="./js/jszip.min.js"></script>
    <script src="./js/pdfmake.min.js"></script>
    <script src="./js/vfs_fonts.js"></script>
    <script src="./js/buttons.html5.min.js"></script>
    <script src="./js/buttons.print.min.js"></script>
    <script src="./js/buttons.colVis.min.js"></script>
    <script>

        function track(courier) {
            window.open("track", "_blank", "toolbar=no, location=no, directories=no,status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=600, height=600");
            // window.open('track','popUpWindow','height=500,width=500,left=1400,top=300,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        }

        $(function () {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
        $(function () {

            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        });
        $('#senderDetails').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var f = new FormData();
            f.append("sender_id", recipient);
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    var data = JSON.parse(decodeURIComponent(t));
                    modal.find('.modal-body #sender_name').text(data['sender_fname'] + ' ' + data['sender_lname']);
                    modal.find('.modal-body #sender_mobile').text(data['sender_mobile']);
                    modal.find('.modal-body #sender_address').text(data['sender_address_line_1'] + ', ' + data['sender_address_line_2'] + ', ' + data['district_name']);
                }
            }
            r.open("POST", "getSender", true);
            r.send(f);

        });

        $('#receiverDetails').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var f = new FormData();
            f.append("receiver_id", recipient);
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    var data = JSON.parse(decodeURIComponent(t));
                    modal.find('.modal-body #receiver_name').text(data['receiver_fname'] + ' ' + data['receiver_lname']);
                    modal.find('.modal-body #receiver_mobile').text(data['receiver_mobile']);
                    modal.find('.modal-body #receiver_address').text(data['receiver_address_line_1'] + ', ' + data['receiver_address_line_2'] + ', ' + data['district_name']);
                }
            }
            r.open("POST", "getReceiver", true);
            r.send(f);

        })

        $('#trackingDetails').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var f = new FormData();
            f.append("courier_id", recipient);
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    console.log(t);
                    modal.find('.modal-body #tracking').empty()
                    modal.find('.modal-body #tracking').append(t);

                }
            }
            r.open("POST", "getTracking", true);
            r.send(f);

        })
    </script>
</body>

</html>