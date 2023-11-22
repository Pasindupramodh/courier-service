<?php


require "../../private/database.php";


$zone = addsLashes($_POST["zone"]);
$from = addsLashes($_POST["from"]);
$to = addsLashes($_POST["to"]);
$charge = addsLashes($_POST["charge"]);



$db = new Database();

$arr = array();
$arr['zone_id'] = $zone;
$arr['extra_to'] = $to;

$query = "SELECT * FROM hopit_express.extra_charge 
inner join zone_extra_charge on extra_charge.extra_charge_id = zone_extra_charge.extra_charge_id 
where zone_id=:zone_id and extra_to >=:extra_to;";

$check = $db->db_check($query, $arr);
if ($from >= $to) {
    echo 'Invalid Range';
} else if ($check) {
    echo 'range already exists';
} else {
    $result = $db->db_read("select count(extra_charge_id) as c from extra_charge");
    $extra_charge_id = ((int)($result[0])['c']) + 1;

    $query3 = "insert into extra_charge (extra_charge_id,extra_from,extra_to,extra_charge) values (:extra_charge_id,:extra_from,:extra_to,:extra_charge)";
    $data3 = array();
    $data3['extra_charge_id'] = $extra_charge_id;
    $data3['extra_from'] = $from;
    $data3['extra_to'] = $to;
    $data3['extra_charge'] = $charge;

    $db->db_write($query3, $data3);


    $query4 = "insert into zone_extra_charge (zone_id,extra_charge_id) values(:zone_id,:extra_charge_id)";
    $data4 = array();
    $data4['zone_id'] = $zone;
    $data4["extra_charge_id"] = $extra_charge_id;

    $db->db_write($query4, $data4);

    echo "successfully";
}