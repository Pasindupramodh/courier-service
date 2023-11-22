<?php
require "fun.php";


        $db = new Database();
        $arr = array();
        $arr['emp_id'] = $_SESSION["user_id"];

        $result1 = $db->db_read("select * from employee where user_id = :emp_id", $arr);
        $row1 = $result1[0];
        $adminId = $row1["emp_id"];

        $check = $db->db_check("select * from admin_img where user_id = :emp_id", $arr);
        if($check){
            $result = $db->db_read("select * from admin_img where user_id = :emp_id", $arr);
        $row = $result[0];
        $image = $row["img_path"];
        }else{
            $image ="s.png";
        }

        ?>

<aside class="main-sidebar sidebar-primary bg-light elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../images/icons/logo.png" alt="Hopit Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hopit Express</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/<?= "png;base64,".base64_encode(file_get_contents("../../private/profile_images/".$image))?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile" class="d-block"><?php echo $_SESSION["name"]; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <a href="home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <?php

                if (role() == 1) {
                ?>
                    <li class="nav-item">
                        <a href="manage_admins" class="nav-link">
                            <i class="nav-icon fas fal fa-user-lock"></i>
                            <p>
                                Manage Administration
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="addAdmin" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Add New Admin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_admins.php" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Update Admin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="viewAdmins.php" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>View All admins</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fad fa-user-check"></i>
                            <p>
                                Manage Manager
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="addManager" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Add New Manager</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_managers" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Update Manager</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="viewManagers" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>View Manager</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php
                }
                ?>
                <?php
                if (role() <= 2) {
                ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sharp fa-solid fa-user-tie"></i>
                            <p>Manage Staff
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="addStaff" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Add Staff</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manageStaff" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Update Staff</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="viewStaff" class="nav-link">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>View Staff</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-regular fa-user-graduate"></i>
                        <p>
                            Manage Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="viewPendingCustomers" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>View Pending Customer</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>Update Customer</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="viewCustomers" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>View Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockedCustomers" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>View blocked Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manageBarcode" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>Manage Barcode</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Manage Courier
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="addCourier" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>Add New Courier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewCouriers" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>View Couriers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="updateTracking" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p>Update Tracking</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="deliveryCharges" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Manage Delivery Charges
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="profile" class="nav-link">
                        <i class="nav-icon fas fas fa-address-card"></i>
                        <p>
                            View Profile
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>