<?php


require "../../private/database.php";


$cities = addsLashes($_POST["cities"]);
$zone_name = addsLashes($_POST["zone_name"]);
$from = addsLashes($_POST["from"]);
$to = addsLashes($_POST["to"]);
$charge = addsLashes($_POST["charge"]);
$fee = addsLashes($_POST["fee"]);

$db = new Database();


//-- handles it all in one pass
$output = preg_split('/[\.,\s]/', $cities, -1, PREG_SPLIT_NO_EMPTY);

//-- just output

$cities = preg_replace('/\.$/', '', $cities); //Remove dot at end if exists
$array = explode(', ', $cities); //split string into array seperated by ', '
$checkDistrict = true;
foreach ($array as $value) //loop over values
{
    $db = new Database();
    $arr = array();
    $arr['district_id'] = $value;
    $query = "select * from zone_districts where district_id = :district_id";
    $check = $db->db_check($query, $arr);
    if ($check) {
        $checkDistrict = true;
        break;
    } else {
        $checkDistrict = false;
        break;
    }
}
if ($checkDistrict) {
    echo "District already in a zone";
} else {
    $result = $db->db_read("select count(zone_id) as c from zone");
    $zone_id = ((int)($result[0])['c']) + 1;

    $result = $db->db_read("select count(extra_charge_id) as c from extra_charge");
    $extra_charge_id = ((int)($result[0])['c']) + 1;

    $query1 = "insert into zone (zone_id,zone_name,zone_charge) values (:zone_id,:zone_name,:zone_charge)";
    $data1 = array();
    $data1['zone_id'] = $zone_id;
    $data1['zone_name'] = $zone_name;
    $data1['zone_charge'] = $fee;

    $db->db_write($query1, $data1);

    $query3 = "insert into extra_charge (extra_charge_id,extra_from,extra_to,extra_charge) values (:extra_charge_id,:extra_from,:extra_to,:extra_charge)";
    $data3 = array();
    $data3['extra_charge_id'] = $extra_charge_id;
    $data3['extra_from'] = $from;
    $data3['extra_to'] = $to;
    $data3['extra_charge'] = $charge;

    $db->db_write($query3, $data3);


    $query4 = "insert into zone_extra_charge (zone_id,extra_charge_id) values(:zone_id,:extra_charge_id)";
    $data4 = array();
    $data4['zone_id'] = $zone_id;
    $data4["extra_charge_id"] = $extra_charge_id;

    $db->db_write($query4, $data4);

    // $cities = preg_replace('/\.$/', '', $cities); //Remove dot at end if exists
    $array = explode(',', $cities); //split string into array seperated by ', '

    $sql = "insert into zone_districts (district_id,zone_id) values (:district_id,:zone_id)";

    // and prepare it once.
    
    foreach ($array as $value) {
        // $st = $db->getConnection()->prepare($sql);

        // $st->bindValue(":district_id", $value, PDO::PARAM_STR);
        // $st->bindValue(":zone_id", $zone_id, PDO::PARAM_STR);
        
        $query5 = "insert into zone_districts (district_id,zone_id) values (:district_id,:zone_id)";
        $data5 = array();
        $data5['district_id'] = $value;
        $data5['zone_id'] = $zone_id;
        $db->db_write($query5,$data5);
        // echo "added ".$value;
    }
    // $st->execute();
    echo "successfully";
}
