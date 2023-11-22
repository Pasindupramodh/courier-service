<?php

require "fun.php";

$city = addsLashes($_POST["city"]);
$weight = addsLashes($_POST["package_weight"]);

$db = new Database();

if($weight<=1){
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

}else{
    $query = "SELECT * FROM hopit_express.zone_districts inner join zone on zone_districts.zone_id = zone.zone_id where zone_districts.district_id = :district_id;";
    $arr = array();
    $arr['district_id'] = $city;
    if ($db->db_check($query, $arr)) {
        $result = $db->db_read($query, $arr);
    
        $row = $result[0];
    
        $query = "SELECT * FROM hopit_express.extra_charge inner join 
    zone_extra_charge on extra_charge.extra_charge_id = zone_extra_charge.extra_charge_id where zone_id =
     (select zone_id from zone_districts where district_id = :district_id) and extra_from <=  :package_weight;";
        $arr1 = array();
        $arr1['district_id'] = $city;
        $arr1['package_weight'] = $weight;
        if ($db->db_check($query, $arr1)) {
            $charge = 0;
            $result = $db->db_read($query, $arr1);
            foreach ($result as $row1) {
                if ($weight < $row1['extra_to']) {
                    $charge =  $row1['extra_charge'] ;
                }
            }
            if($charge == 0 && $weight>1){
                echo "Cannot Deliver";
            }else{
                echo clear($charge+$row['zone_charge']);
            }
            
        } else {
            echo "0";
        }
    
    } else {
        echo "Cannot Deliver";
    }
    
}

