<?php
// include 'header.php';
include 'header.php';
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Managers</title>

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
        ?><?PHP
        include 'headerbar.php';
        ?>
        

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Managers</h1>
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
                                        <h2 class="card-title">Manager Details</h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0 pl-3 pr-3 pb-3">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped table-text table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>NIC</th>
                                                        <th>Email</th>
                                                        <th>Mobile Number</th>
                                                        <th>Gender</th>
                                                        <th>Birth Day</th>
                                                        <th>Address</th>
                                                        <th>Branch</th>
                                                        <th>Status</th>

                                                        <th>---</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $employee = new Employee();
                                                    $result = $employee->getAllAdmins(2);
                                                    if ($result) {
                                                        foreach ($result as $row) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo clear($row["emp_id"]); ?></td>
                                                                <td><?php echo clear($row["fname"]) . " " . clear($row["lname"]); ?>
                                                                </td>
                                                                <td><?php echo clear($row["nic"]); ?></td>
                                                                <td><?php echo clear($row["email"]); ?></td>
                                                                <td><?php echo clear($row["mobile"]); ?></td>
                                                                <td><?php echo clear($row["gender"]); ?></td>
                                                                <td><?php echo clear($row["bday"]); ?></td>
                                                                <td><?php echo clear($row["address_line_1"]) . " " . clear($row["address_line_2"]) . " " . clear($row["address_line_3"]); ?>
                                                                </td>
                                                                <td><?php echo clear($row["branch_name"]); ?></td>
                                                                <td>
                                                                    <?php

                                                                    if ($row["active_status"] == 1) {
                                                                        echo "<span class='badge bg-success'> Active";
                                                                    } else {
                                                                        echo "<span class='badge bg-danger'> Inactive";
                                                                    }
                                                                    ?>
                                                                    </span></td>

                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                        <button type="button" class='btn  bg-primary btn-sm mr-2 ' data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo clear($row["emp_id"]) . '_' . clear($row["fname"]) . '_' . clear($row["lname"]) . '_' . clear($row["nic"])
                                                                                                                                                                                                . '_' . clear($row["email"]) . '_' . clear($row["mobile"]) . '_' . clear($row["gender"]) . '_'
                                                                                                                                                                                                . clear($row["bday"]) . '_' . clear($row["address_line_1"]) . "_" . clear($row["address_line_2"]) . "_"
                                                                                                                                                                                                . clear($row["address_line_3"]) . '_' . clear($row["branch_id"]) ?>"> Update</button>

                                                                        <button type="button" class="btn  <?php
                                                                            if ($row["active_status"] == 1) {
                                                                                echo "bg-danger";
                                                                            } else {
                                                                                echo "bg-warning";
                                                                            }
                                                                        ?> btn-sm" data-toggle="modal" data-target="#exampleModal1" data-whatever="<?php echo clear($row["emp_id"]) . '-' . clear($row["fname"]) . ' ' . clear($row["lname"]) ?>">
                                                                        <?php
                                                                            if ($row["active_status"] == 1) {
                                                                                echo "Make Inactive";
                                                                            } else {
                                                                                echo "Make Active";
                                                                            }
                                                                        ?>    
                                                                        
                                                                        </button>

                                                                    </div>
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
        <?php include "footer.php"?>

    </div>




    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Do you want to change status..</h5>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" class="form adminUpdate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id="id" name='id' class="form-control" placeholder="Manager ID ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="admin_type">Branch</label>
                            <select class="custom-select rounded-0" id="admin_type">

                                <?php
                                $employee = new Employee();
                                $result = $employee->getBranches();
                                if ($result) {
                                    foreach ($result as $row) {
                                        echo '<option value="' . clear($row["branch_id"]) . '">' . clear($row["branch_name"]) . '</option>';
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Manager First Name</label>
                            <input type="text" id="fname" name='fname' class="form-control" placeholder="Manager First Name ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Last Name</label>
                            <input type="text" name='lname' id="lname" class="form-control" placeholder="Manager Last Name ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Manager Email  ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager NIC</label>
                            <input type="text" name='nic' id="nic" class="form-control" placeholder="Manager NIC  ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Mobile Number</label>
                            <input type="tel" name='mobile' id="mobile" class="form-control" placeholder="Manager Mobile Number  ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Birth Day</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" id="bday" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>

                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Gender</label><br />
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
                            <label>Manager Address Line 1</label>
                            <input type="text" name='address1' id="address1" class="form-control" placeholder="Manager Address Line 1  ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Address Line 2</label>
                            <input type="text" name='address2' id="address2" class="form-control" placeholder="Manager Address Line 2  ">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Address Line 3</label>
                            <input type="text" name='address3' id="address3" class="form-control" placeholder="Manager Address Line 3  ">
                            <div class="invalid-feedback"></div>
                        </div>


                    </div>
                    <div class="modal-footer form-group">
                        <input type="submit" class="form-control btn btn-success" value="Update Manager" />
                    </div>

                </div>
            </form>
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
    <script src="script.js"></script>
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
    <script src="sc.js"></script>
    <script src="message.js"></script>

</body>
</html>