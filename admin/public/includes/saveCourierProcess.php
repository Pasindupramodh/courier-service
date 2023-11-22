<?php

use function PHPSTORM_META\type;

require "../../private/database.php";
session_start();

$sender_lname = addsLashes($_POST["sender_lname"]);
$sender_fname = addsLashes($_POST["sender_fname"]);
$sender_mobile = addsLashes($_POST["sender_mobile"]);
$sender_address1 = addsLashes($_POST["sender_address1"]);
$sender_address2 = addsLashes($_POST["sender_address2"]);
$sender_address3 = addsLashes($_POST["sender_address3"]);
$receiver_fname = addsLashes($_POST["receiver_fname"]);
$receiver_lname = addsLashes($_POST["receiver_lname"]);
$receiver_mobile = addsLashes($_POST["receiver_mobile"]);
$receiver_address1 = addsLashes($_POST["receiver_address1"]);
$receiver_address2 = addsLashes($_POST["receiver_address2"]);
$receiver_address3 = addsLashes($_POST["receiver_address3"]);
$type = addsLashes($_POST["type"]);
$package_price = addsLashes($_POST["package_price"]);
$package_weight = addsLashes($_POST["package_weight"]);
$delivery_charge = addsLashes($_POST["delivery_charge"]);
$desc = addsLashes($_POST["desc"]);
if ($package_price == "" && $type == "COD") {
    echo "Please add Package Price";
} else {

    $db = new Database();

    if ($package_price == "") {
        $package_price = 0;
    }
    $result = $db->db_read("select count(sender_fname) as c from sender");
    $sender_id = ((int)($result[0])['c']) + 1;

    $query = "insert into sender (sender_id,sender_fname,sender_lname,sender_mobile,
sender_address_line_1,sender_address_line_2,sender_address_line_3) 
values (:sender_id,:sender_fname,:sender_lname,:sender_mobile,
:sender_address_line_1,:sender_address_line_2,:sender_address_line_3)";

    $data = array();

    $data['sender_id'] = $sender_id;
    $data['sender_fname'] = $sender_fname;
    $data['sender_lname'] = $sender_lname;
    $data['sender_mobile'] = $sender_mobile;
    $data['sender_address_line_1'] = $sender_address1;
    $data['sender_address_line_2'] = $sender_address2;
    $data['sender_address_line_3'] = $sender_address3;

    $db->db_write($query, $data);

    $result = $db->db_read("select count(receiver_fname) as c from receiver");
    $receiver_id = ((int)($result[0])['c']) + 1;

    $query = "insert into receiver (receiver_id,receiver_fname,receiver_lname,receiver_mobile,
receiver_address_line_1,receiver_address_line_2,receiver_address_line_3) 
values (:receiver_id,:receiver_fname,:receiver_lname,:receiver_mobile,
:receiver_address_line_1,:receiver_address_line_2,:receiver_address_line_3)";

    $data = array();

    $data['receiver_id'] = $receiver_id;
    $data['receiver_fname'] = $receiver_fname;
    $data['receiver_lname'] = $receiver_lname;
    $data['receiver_mobile'] = $receiver_mobile;
    $data['receiver_address_line_1'] = $receiver_address1;
    $data['receiver_address_line_2'] = $receiver_address2;
    $data['receiver_address_line_3'] = $receiver_address3;

    $db->db_write($query, $data);


    $result = $db->db_read("select count(delevery_charge_id) as c from delevery_charge");
    $delevery_charge_id = ((int)($result[0])['c']) + 1;

    $query = "insert into delevery_charge (delevery_charge_id,delevery_code,charge,status) 
values (:delevery_charge_id,:delevery_code,:charge,:status)";

    $data = array();

    $data['delevery_charge_id'] = $delevery_charge_id;
    $data['delevery_code'] = $type;
    $data['charge'] = $delivery_charge;
    $data['status'] = 1;

    $db->db_write($query, $data);

    $user = $_SESSION["user_id"];

    $result = $db->db_read("select count(courier_id) as c from courier");
    $courier_id = ((int)($result[0])['c']) + 1;

    date_default_timezone_set('Asia/Colombo');

    // Then call the date functions
    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO courier (courier_id,package_price,package_weight,package_desc,
courier_type,is_paid,sender_id,receiver_id,delevery_charge_id,user_id,barcode_no,courier_date) values ( :courier_id,:package_price,:package_weight,:package_desc,
:courier_type,:is_paid,:sender_id,:receiver_id,:delevery_charge_id,:user_id,:barcode_no,:courier_date )";

    $data = array();
    $data['courier_id'] = $courier_id;
    $data['package_price'] = $package_price;
    $data['package_weight'] = $package_weight;
    $data['package_desc'] = $desc;
    $data['courier_type'] = $type;

    if ($type == "Cash") {
        $data['is_paid'] = 1;
    } else {
        $data['is_paid'] = 0;
    }


    $data['sender_id'] = $sender_id;
    $data['receiver_id'] = $receiver_id;
    $data['delevery_charge_id'] = $delevery_charge_id;
    $data['user_id'] = $user;

    //barcode id
    $result = $db->db_read("select * from barcode where barcode_id = '1'");
    $barcode_id = ((int)($result[0])['barcode_current']) + 1;
    $data['barcode_no'] = $barcode_id;
    $data['courier_date'] = $date;
    $db->db_write($query, $data);
    $query = "update barcode set barcode_current = '$barcode_id' where barcode_id = '1'";
    $db->db_write($query);

    $result = $db->db_read("select count(courier_status_id) as c from courier_status");
    $courier_status_id = ((int)($result[0])['c']) + 1;

    $query = "insert into courier_status (courier_status_id,status) values (:courier_status_id,:status)";
    $data = array();
    $data['courier_status_id'] = $courier_status_id;
    $data['status'] = "Pending";
    

    $db->db_write($query, $data);

    $query = "insert into tracking (courier_id,courier_status_id,status_date) values (:courier_id,:courier_status_id,:status_date)";

    $data = array();
    $data['courier_id'] = $courier_id;
    $data['courier_status_id'] = $courier_status_id;
    $data['status_date'] = $date;

    $db->db_write($query, $data);
    echo $courier_id;
}
