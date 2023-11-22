<?php
$fname = addsLashes($_POST["fname"]);
$email = addsLashes($_POST["email"]);
$mobile = addsLashes($_POST["mobile"]);
$address1 = addsLashes($_POST["address1"]);
$address2 = addsLashes($_POST["address2"]);
$nic = addsLashes($_POST["nic"]);
$address3 = addsLashes($_POST["address3"]);
$lname = addsLashes($_POST["lname"]);

$db = new Database();



$arr = array();
$arr['emp_id'] = $_SESSION["user_id"];

$result1 = $db->db_read("select * from customer where user_id = :emp_id", $arr);
$row1 = $result1[0];
$adminId = $row1["cus_id"];

$arr = array();
$arr['nic'] = $nic;
$arr['emp_id'] = $adminId;
$query = "SELECT * FROM customer where nic = :nic and cus_id != :emp_id";
$check = $db->db_check($query, $arr);
if ($check) {
    echo "NIC Already Exists";
} else {
    $arr = array();
    $arr['email'] = $email;
    $arr['emp_id'] = $adminId;
    $query = "SELECT * from customer where email = :email and cus_id != :emp_id";
    $check = $db->db_check($query, $arr);
    if ($check) {
        echo "Email Already Exists";
    } else {
        $query = "UPDATE customer set fname = :fname , lname = :lname , nic = :nic , email = :email , mobile = :mobile ,
              address_line_1 = :address_line_1 , address_line_2 = :address_line_2 ,
              address_line_3 = :address_line_3  where cus_id=:emp_id";
        $arr = array();
        $arr['fname'] = $fname;
        $arr['lname'] = $lname;
        $arr['nic'] = $nic;
        $arr['email'] = $email;
        $arr['mobile'] = $mobile;
        $arr['address_line_1'] = $address1;
        $arr['address_line_2'] = $address2;
        $arr['address_line_3'] = $address3;
        $arr['emp_id'] = $adminId;

        if ($db->db_write($query, $arr)) {
            $_SESSION["name"] = $fname." ".$lname;
            echo 'successfully';
        } else {
            echo 'Failed to Update';
        }
    }
}
