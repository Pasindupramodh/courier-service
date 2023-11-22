<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hopit Express | Courier Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./css/css/adminlte.min.css">
    <link rel="icon" href="./private/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <style>
        @page {
            size: A5
        }
    </style>
</head>
<?php
$courier_id = (int)$_GET["p_id"];


$employee = new Courier();
$result = $employee->getCourier($courier_id);
if($result){
$row = $result[0];
if($row['user_id']==$_SESSION['user_id']){
?>
<body class="A5">
    <div class="container-fluid wrapper">
        <!-- Main content -->
        <section class="invoice pt-5 pl-5 pr-5">
            <!-- title row -->
            <div class="col-12">
                
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                    
                        <img src="./private/img/logo.png" height="50" width="50"/> Hopit Express
                        <small class="float-right">Date: <?= clear($row['courier_date']) ?> </small>
                        
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info mt-4">
                <div class="col-sm-6 invoice-col">
                    <h5>From</h5>
                    <address>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-bordered">
                                <tr>
                                    <th >Name</th>
                                    <td><?= clear($row['sender_fname'].' '.$row["sender_lname"]) ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?= clear($row['sender_address_line_1'].', '.$row['sender_address_line_2'].', '.$employee->getDistrictName($row['sender_address_line_3'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td> <?= clear($row['sender_mobile']) ?></td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </table>
                        </div>
                        <!-- <h5><strong>Pasindu Pramodh</strong><br>
                        no-25, Yakkala<br>
                        Gampaha,<br>
                        Phone: 77899630</h5> -->
                    </address>
                </div>
                
                <div class="col-sm-6 invoice-col">
                    <h5>To</h5>
                    <address>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-bordered">
                            <tr>
                                    <th >Name</th>
                                    <td><?= clear($row['receiver_fname'].' '.$row["receiver_lname"]) ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?= clear($row['receiver_address_line_1'].', '.$row['receiver_address_line_2'].', '.$employee->getDistrictName($row['receiver_address_line_3'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td> <?= clear($row['receiver_mobile']) ?></td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </table>
                        </div>
                    </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <hr/>
            <div class="row">
                <!-- accepted payments column -->

                <!-- /.col -->
                <div class="col-12">
                    <p class="lead">Order Details</p>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th style="width:50%">Courier Type:</th>
                                <td><?= clear($row['courier_type']) ?></td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td><?= clear($row['package_weight']) ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?php 
                                if(clear($row['courier_type'])=="COD"){
                                    echo clear($row['charge']+$row['package_price']);
                                    
                                }else{
                                    echo "0";
                                } ?></td>
                            </tr>
                            <tr>
                                
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                <svg id="barcode" class="aling-center" > </svg>

                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script type="text/javascript" src="./js/jsBarcode.js"></script>
    <script>
        window.addEventListener("load", ()=>{
            JsBarcode("#barcode",<?= clear($row['barcode_no']) ?>);
            window.print();
        });
        // window.addEventListener("load", );
    </script>
</body>
<?php
}else{
    echo 'not_found';
}
}
?>

</html>