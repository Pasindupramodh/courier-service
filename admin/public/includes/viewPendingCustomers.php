<?php
include 'header.php';
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Customers</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <!-- Data Tables-->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-msg/bootstrap-msg.css" />
    <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../dist/css/style.css"> -->

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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">View Pending Customers</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->


                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">Customer Details</h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0 pl-3 pr-3 pb-3">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>NIC</th>
                                                        <th>Email</th>
                                                        <th>Mobile Number</th>
                                                        <th>Address</th>
                                                        <th>Com Name</th>
                                                        <th>Acc Name</th>
                                                        <th>Acc Number</th>
                                                        <th>Bank</th>
                                                        <th>Branch</th>
                                                        <th>---</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $employee = new Employee();
                                                    $result = $employee->getPendingCustomers();
                                                    if ($result) {
                                                        foreach ($result as $row) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo clear($row["fname"]) . " " . clear($row["lname"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["nic"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["email"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["mobile"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["address_line_1"]) . " " . clear($row["address_line_2"]) . " " . clear($employee->getDistrictName($row["address_line_3"])); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["company_name"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["account_name"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($row["account_no"]); ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $re = $employee->getBank($row["bank_branch_id"]);
                                                                    $re = $re[0];
                                                                    echo clear($re['bank_name']);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo clear($re['branch_name']); ?>
                                                                </td>
                                                                <td>

                                                                    <button type="button" class="btn  btn-success btn-sm"
                                                                        data-toggle="modal" data-target="#exampleModal1"
                                                                        data-whatever="<?= clear($row['user_id']) ?>">
                                                                        Approve
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>




                                                </tbody>
                                            </table>
                                        </div>

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
                <!-- /.content -->

            </div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Do you want approve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 id='id_delete'></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="del">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
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
    <script src="message.js"></script>
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
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        var recipient;
        $('#exampleModal1').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            recipient = button.data('whatever');
            var modal = $(this);
            // modal.find('.modal-body #id_delete').text(recipient);
        });

        $("#exampleModal1").on("click", "#del", function () {
            const id = recipient;
            var f = new FormData();
            f.append("id", id);

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
            r.open("POST", "approve.php", true);
            r.send(f);
        });

    </script>

</body>
</hml>