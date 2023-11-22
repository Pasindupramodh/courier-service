<?php


require "../../private/database.php";


$zone_id = addsLashes($_POST["zone_id"]);
$fee = addsLashes($_POST["fee"]);



$db = new Database();

$arr = array();
$arr['zone_id'] = $zone_id;
$arr['fee'] = $fee;

$query = "UPDATE zone SET zone_charge = :fee WHERE zone_id = :zone_id";

$check = $db->db_write($query, $arr);

if($check){
    echo "successfully";
}else{
    echo 'Cannot Update';
}