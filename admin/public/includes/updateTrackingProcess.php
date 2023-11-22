<?php

require '../../private/database.php';
date_default_timezone_set('Asia/Colombo');

// Then call the date functions
$date = date('Y-m-d H:i:s');
session_start();
$status ="";
$value = $_POST['value'];
$courier_id = $_POST['cou'];
$branch_id = $_SESSION["branch_id"];
$database = new Database();
if ($value == "Received") {
    
    $query = "select branch_name as name from branch where branch_id = :branch_id";
    $data = array();
    $data['branch_id'] = $branch_id;
    $result = $database->db_read($query, $data);
    $branch_name = ($result[0])['name'];

    $status = "Received to " . $branch_name;
    
}else if ($value == "Out For Delivery"){
    $status = "Out For Delivery";
}else if ($value == "Finished"){
    $status = "Finished";
}else if($value=="Return"){
    $reason = $_POST['reason'];
    $status = $value." due to ".$reason;
}else if($value=="Out For"){
    $reason = $_POST['branch'];
    $status = "Out For ".$reason." Branch";
}else if($value == "Returned"){
    $status = "Returned";
}

if($status !=""){
    if ($database->db_check("select * from courier_status where status = '$status'")) {

        $query = "select * from courier_status where status = '$status'";
        $result = $database->db_read($query);

        $status_id = ($result[0])['courier_status_id'];

        $query = "insert into tracking (courier_id,courier_status_id,status_date) values (:courier_id,:courier_status_id,:status_date)";

        $data = array();
        $data['courier_id'] = $courier_id;
        $data['courier_status_id'] = $status_id;
        $data['status_date'] = $date;

        if($database->db_write($query, $data)){
            echo "successfully";
        }
    } else {

        $result = $database->db_read("select count(courier_status_id) as c from courier_status");
        $courier_status_id = ((int)($result[0])['c']) + 1;

        $query = "insert into courier_status (courier_status_id,status) values (:courier_status_id,:status)";
        $data = array();
        $data['courier_status_id'] = $courier_status_id;
        $data['status'] = $status;

        $database->db_write($query, $data);
        $query = "insert into tracking (courier_id,courier_status_id,status_date) values (:courier_id,:courier_status_id,:status_date)";

        $data = array();
        $data['courier_id'] = $courier_id;
        $data['courier_status_id'] = $courier_status_id;
        $data['status_date'] = $date;

        if($database->db_write($query, $data)){
            echo "successfully";
        }
    }
    
}else{
    echo "can't update tracking";
}
