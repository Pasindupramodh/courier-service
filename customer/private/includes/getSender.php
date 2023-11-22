<?php 

$sender_id = $_POST['sender_id'];

$emp = new Courier();
$result = $emp->getSender($sender_id);
$row = $result[0];
echo json_encode($row);

?>