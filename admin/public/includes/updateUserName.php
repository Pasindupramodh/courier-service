<?php
require '../../private/database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();}
$uname = addslashes($_POST['newUName']);
$password = addslashes($_POST['cPassword']);

$db = new Database();
$data = array();
$data['user_id'] = $_SESSION["user_id"];
$query = "select * from user where user_id = :user_id";
$result = $db->db_read($query, $data);
$data = $result[0];

$hash = ($result[0])['password'];
if (password_verify($password, $hash)) {

    $arr = array();
    $arr['user_id'] = $_SESSION["user_id"];
    $arr['user_name'] = $uname;
    $query = "SELECT * from user where user_name = :user_name and user_id != :user_id";

    $check = $db->db_check($query, $arr);
    if ($check) {
        echo "Username Already Exists";
    }else{
        $arr1 = array();
        $arr1['user_name'] = $uname;
        $arr1['user_id'] = $_SESSION["user_id"];
        $query = "update user set user_name = :user_name where user_id = :user_id";
        $db->db_write($query,$arr1);
        echo "successfully";
    }

} else {
    echo "Password isn't match";
}

?>