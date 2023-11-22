<?php
require "../../private/database.php";

$adminId = addsLashes($_POST["id"]);

$db = new Database();

$arr = array();
$arr['emp_id'] = $adminId;
$query = "SELECT * FROM hopit_express.employee where emp_id = :emp_id";
$result = $db->db_read($query, $arr);
$row = $result[0];
if($row["active_status"]==1){
    $query = "UPDATE employee set active_status = 2 where emp_id=:emp_id";
}else{
    $query = "UPDATE employee set active_status = 1 where emp_id=:emp_id";
}


$arr = array();
$arr['emp_id'] = $adminId;

if ($db->db_write($query, $arr)) {
    echo 'successfully';
} else {
    echo 'Failed to Delete';
}
