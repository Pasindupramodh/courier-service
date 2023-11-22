<?php 
require "functions.php";
//  require ('./private/includes/functions.php');
$name = $_POST['bank'];
$data = "data";

$bank = new Bank();
$result = $bank->getBankBranch($name);
$data = " ";
if($result){
    foreach ($result as $row) {
        $data .='<option value="' . $row['branch_id'] . '">'.clear($row['branch_name'].'-'.$row['branch_code']).'</option>';
    }
}
echo json_encode($data);