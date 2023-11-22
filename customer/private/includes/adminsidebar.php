<?php
// require "fun.php";


// $db = new Database();
// $arr = array();
// $arr['emp_id'] = $_SESSION["user_id"];

// $result1 = $db->db_read("select * from employee where user_id = :emp_id", $arr);
// $row1 = $result1[0];
// $adminId = $row1["emp_id"];

// $check = $db->db_check("select * from admin_img where user_id = :emp_id", $arr);
// if($check){
//     $result = $db->db_read("select * from admin_img where user_id = :emp_id", $arr);
// $row = $result[0];
// $image = $row["img_path"];
// }else{
    $image ="s.png";
// }
// ?>

<aside class="main-sidebar sidebar-primary bg-light elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="./private/img/logo.png" alt="Hopit Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Hopit Express</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/<?= "png;base64," . base64_encode(file_get_contents("./profile_img/" . $image)) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile" class="d-block">
                    <?php echo $_SESSION["name"]; ?>
                </a>
                <!-- <a href="profile"class="d-block">Pasindu</a> -->
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>

                </li>

                <li class="nav-item ">
                    <a href="addCourier" class="nav-link">

                        <i class="nav-icon fas fa-truck-moving"></i>
                        <p>Add new Courier</p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a href="viewCouriers" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>View Couriers</p>
                    </a>
                </li>
                <!-- <li class="nav-item ">
                    <a href="deliveryCharges" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>view Delivery Charges</p>
                    </a>
                </li> -->
                <li class="nav-item ">
                    <a href="profile" class="nav-link">
                        <i class="nav-icon fas fas fa-address-card"></i>
                        <p>View Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>