<?php
require "../../private/database.php";

$adminId = addsLashes($_POST["id"]);
$fname = addsLashes($_POST["fname"]);
$email = addsLashes($_POST["email"]);
$mobile = addsLashes($_POST["mobile"]);
$bday = addsLashes($_POST["bday"]);
$address1 = addsLashes($_POST["address1"]);
$address2 = addsLashes($_POST["address2"]);
$nic = addsLashes($_POST["nic"]);
$gender = addsLashes($_POST["gender"]);
$address3 = addsLashes($_POST["address3"]);
$lname = addsLashes($_POST["lname"]);
$branch = addsLashes($_POST["branch"]);
$db = new Database();
$arr = array();
$arr['nic'] = $nic;
$arr['emp_id'] = $adminId;
$query = "SELECT * FROM hopit_express.employee where nic = :nic and emp_id != :emp_id";
$check = $db->db_check($query, $arr);
if ($check) {
    echo "admin NIC Already Exists" . $adminId;
} else {
    $arr = array();
    $arr['email'] = $email;
    $arr['emp_id'] = $adminId;
    $query = "SELECT * from employee where email = :email and emp_id != :emp_id";
    $check = $db->db_check($query, $arr);
    if ($check) {
        echo "admin Email Already Exists";
    } else {
        $query = "UPDATE employee set fname = :fname , lname = :lname , nic = :nic , email = :email , mobile = :mobile ,
             gender = :gender , bday = :bday , address_line_1 = :address_line_1 , address_line_2 = :address_line_2 ,
              address_line_3 = :address_line_3 , branch_id=:branch_id where emp_id=:emp_id";
              $arr = array();
              $arr['fname'] = $fname;
              $arr['lname'] = $lname;
              $arr['nic'] = $nic;
              $arr['email'] = $email;
              $arr['mobile'] = $mobile;
              $arr['gender'] = $gender;
              $arr['bday'] = $bday;
              $arr['address_line_1'] = $address1;
              $arr['address_line_2'] = $address2;
              $arr['address_line_3'] = $address3;
              $arr['branch_id'] = $branch;
              $arr['emp_id'] = $adminId;

              if($db->db_write($query,$arr)){
                echo 'successfully';
              }else{
                echo 'Failed to Update';
              }
    }
}
