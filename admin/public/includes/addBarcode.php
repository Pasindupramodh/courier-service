<?php

require "../../private/database.php";


$id = addslashes($_POST["id"]);
$barcode_end = addslashes($_POST["barcode_end"]);
$barcode_start = addslashes($_POST["barcode_start"]);

if($barcode_end <= $barcode_start){
    echo "Invalid Barcode Range";
}else{
    $emp = new Database();


    $query = "select count(barcode_id) as c from barcode";
    $bar_id = (($emp->db_read($query))[0])['c']+1;

    $query = "INSERT into barcode (barcode_id,barcode_start,barcode_end,barcode_current) values 
    (:barcode_id, :barcode_start, :barcode_end, :barcode_current)";
    $data = array();
    $data['barcode_id']=$bar_id;
    $data['barcode_start']=$barcode_start;
    $data['barcode_end']=$barcode_end;
    $data['barcode_current']=$barcode_start;
    $emp->db_write($query,$data);

    $query ="UPDATE customer set barcode_barcode_id = '$bar_id' where cus_id = '$id'";
    $emp->db_write($query);
    echo "successfully";
}