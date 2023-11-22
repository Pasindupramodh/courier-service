<?php
require '../../private/database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();}
$uPassword = addslashes($_POST['uPassword']);
$nPassword = addslashes($_POST['nPassword']);
$rPassword = addslashes($_POST['rPassword']);
$db = new Database();

$data = array();
$data['user_id'] = $_SESSION["user_id"];
$query = "select * from user where user_id = :user_id";
$result = $db->db_read($query, $data);
$data = $result[0];

$hash = ($result[0])['password'];
if (password_verify($uPassword, $hash)) {
    if($nPassword == $rPassword){
        $arr = array();
        $arr['password'] = password_hash($nPassword, PASSWORD_DEFAULT);
        $arr['user_id'] = $_SESSION["user_id"];
        $auery = "update user set password = :password where user_id = :user_id";
        $db->db_write($auery,$arr);
        echo "successfully";
    }else{
        echo "Password isn't match";
    }
} else {
    echo "Password isn't match";
}
?>