<?php 

$sender_id = $_POST['receiver_id'];

$emp = new Courier();
$result = $emp->getReceiver($sender_id);
$row = $result[0];
echo json_encode($row);

?>