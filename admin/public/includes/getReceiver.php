<?php 
require 'fun.php';

$sender_id = $_POST['receiver_id'];

$emp = new Employee();
$result = $emp->getReceiver($sender_id);
$row = $result[0];
echo json_encode($row);

?>