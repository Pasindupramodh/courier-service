<?php


require "../../private/database.php";


$extra_charge_id = addsLashes($_POST["extra_charge_id"]);
$extra = addsLashes($_POST["extra"]);



$db = new Database();

$arr = array();
$arr['extra_charge_id'] = $extra_charge_id;
$arr['fee'] = $extra;

$query = "UPDATE extra_charge SET extra_charge = :fee WHERE extra_charge_id = :extra_charge_id";

$check = $db->db_write($query, $arr);
// echo 'Cannot Update';
if($check){
    echo "successfully";
}else{
    echo 'Cannot Update';
}