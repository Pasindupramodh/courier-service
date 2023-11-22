<?php 

// require "../../private/database.php";
require "fun.php";

$city = addsLashes($_POST["city"]);

$db = new Database();

$query = "SELECT * FROM hopit_express.zone_districts inner join zone on zone_districts.zone_id = zone.zone_id where zone_districts.district_id = :district_id;";
$arr = array();
$arr['district_id'] = $city;
if($db->db_check($query,$arr)){
    $result = $db->db_read($query,$arr);

    $row = $result[0];
    echo clear($row['zone_charge']);
}else{
    echo "Cannot Deliver";
}

?>