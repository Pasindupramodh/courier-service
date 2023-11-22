<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="./css/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="./css/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <!-- <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="./css/select2.min.css">
  <link rel="stylesheet" href="./css/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="./css/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="./css/bs-stepper.min.css">
  <!-- Data Tables-->
  <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./css/buttons.bootstrap4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="./css/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap-msg.css" />
  <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="stylesheet" href="./css/css/style.css"> -->
  <link rel="stylesheet" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">

  <link rel="icon" href="./private/img/logo.png">
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <?php
    include("header.php");
    ?>
    <?PHP
    include 'headerbar.php';
    ?>
    <?PHP
    include 'adminsidebar.php';
    ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <?php $courier = new Courier(); ?>
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3 class="text-white">
                      <?= clear($courier->getAllCouriersCount()) ?>
                    </h3>

                    <p>All Courier Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-truck-moving"></i>
                  </div>
                  <div class="small-box-footer">
                    <div style=" border-radius:20px; height: 5px; margin: 5px;  " class="bg-white"></div>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3 class="text-white">
                      <?= clear($courier->getInTransitsCouriersCount()) ?>
                    </h3>

                    <p>In Transits Courier Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-solid fa-plane"></i>
                  </div>
                  <div class="small-box-footer">
                    <div style=" border-radius:20px; height: 5px; margin: 5px;  " class="bg-white"></div>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3 class="text-white">
                      <?= clear($courier->getReturnedCouriersCount()) ?>
                    </h3>
                    <p class="text-white">Returned Courier Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-undo-alt"></i>
                  </div>
                  <div class="small-box-footer">
                    <div style=" border-radius:20px; height: 5px; margin: 5px;  " class="bg-white"></div>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 class="text-white">
                      <?= clear($courier->getFinishedCouriersCount()) ?>
                    </h3>
                    <p>Finished Courier Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-thumbs-up"></i>
                  </div>
                  <div class="small-box-footer">
                    <div style=" border-radius:20px; height: 5px; margin: 5px;  " class="bg-white"></div>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
          </div>
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- /.card -->
                <div class="card">
                  <div class="card-header">
                    <h2 class="card-title">Recent Courier Details</h2>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0 pl-3 pr-3 pb-3">
                    <table id="example1" class="table table-bordered table-striped">
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // $courier = new Courier();
                        $result = $courier->getInTransitsCouriers();
                        if ($result) {
                          foreach ($result as $row) {
                            echo clear($row["barcode_no"]);
                            $tracking = $courier->getTracking(clear($row['courier_id']));
                            $lastStatus = end($tracking);

                              ?>
                              <tr>
                                <td>
                                  <?php echo clear($row["barcode_no"]); ?>
                                </td>
                                <td><button type="button" class='btn  bg-primary btn-sm ' data-toggle="modal"
                                    data-target="#senderDetails" data-whatever="<?= clear($row['sender_id']) ?>">
                                    View Sender Details</button>
                                </td>
                                <td><button type="button" class='btn  bg-success btn-sm  ' data-toggle="modal"
                                    data-target="#receiverDetails" data-whatever="<?= clear($row['receiver_id']) ?>">
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

                              </tr>
                              <?php
                          }
                        }
                        ?>
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
        <!-- /.content -->

      </div>
    </div>
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
    <?php include "footer.php" ?>

  </div>


  <!-- jQuery -->
  <script src="./js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="./js/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./js/demo.js"></script>
  <!-- Page specific script -->
  <!-- Select2 -->
  <script src="./js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="./js/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="./js/moment.min.js"></script>
  <script src="./js/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="./js/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="./js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="./js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="./js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="./js/dropzone.min.js"></script>
  <!-- <script src="../plugins/joi/joi-browser.min.js"></script> -->
  <script type="text/javascript" src="./js/bootstrap-msg.js"></script>
  <script src="script.js"></script>
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
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "print", "colvis", {
          extend: 'excelHtml5',
          title: ''
        },
          {
            extend: 'pdfHtml5',
            title: ''
          }
        ]
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

  </script>
</body>
</hml>