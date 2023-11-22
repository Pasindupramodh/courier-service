<?php

class Database
{
	private function connect()
	{
		try {
			$string = "mysql:host=localhost;dbname=hopit_express";
			$con = new PDO($string, "root", "");
		} catch (PDOException $e) {
			if ($_SERVER['HTTP_HOST'] == "localhost") {
				die($e->getMessage());
			} else {
				die("Cannot connect to the database...?");
			}
		}
		return $con;
	}
	public function getConnection()
	{
		$con = $this->connect();
		return $con;
	}
	public function db_read($query, $data = array())
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				if (is_array($result) && count($result) > 0) {
					return $result;
				}
			}
		}
	}
	public function db_check($query, $data = array())
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				if (is_array($result) && count($result) > 0) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	// public function db_multi_write($query1, $data1 = array(), $query2, $data2 = array(), $query3, $data3 = array())
	// {
	// 	$con = $this->connect();
	// 	$stm = $con->prepare($query1);
	// 	if ($stm) {
	// 		$check = $stm->execute($data1);
	// 		if ($check) {
	// 			$stm = $con->prepare($query2);
	// 			if ($stm) {
	// 				$check = $stm->execute($data2);
	// 				if ($check) {
	// 					$stm = $con->prepare($query3);
	// 					if ($stm) {
	// 						$check = $stm->execute($data3);
	// 						if ($check) {
	// 							return true;
	// 						}
	// 					}
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	public function db_write($query, $data = array())
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				return $check;
			}
		}
	}
}


class Bank extends Database
{

	function getBanks()
	{
		$query = "select * from bank";
		return $this->db_read($query);
	}
	function getBankBranch($id)
	{
		$id = (int) $id;
		$query = "select * from bank_branch where bank_id = :bank_id";
		$data = array();
		$data['bank_id'] = $id;
		return $this->db_read($query, $data);
	}

}
class District extends Database
{

	function getDistrict()
	{
		$query = "select * from district";
		return $this->db_read($query);
	}
	function getCities()
	{
		$query = "SELECT * FROM district ORDER BY district_name ASC";

		return $this->db_read($query);
	}

}

class Courier extends Database
{
	public function getPendingCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where user_id = '".$_SESSION['user_id']."' ORDER BY status_date;";
		return $this->db_read($query);
	}
	public function getInTransitsCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status !='pending' and courier_status.status !='Finished' and user_id = '".$_SESSION['user_id']."' group by courier.courier_id order by status_date";
		return $this->db_read($query);
	}
	public function getFinishedCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status ='Finished' and user_id = '".$_SESSION['user_id']."';";
		return $this->db_read($query);
	}
	public function getReturnedCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status ='Returned' and user_id = '".$_SESSION['user_id']."';";
		return $this->db_read($query);
	}
	public function getAllCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where user_id = '".$_SESSION['user_id']."';";
		return $this->db_read($query);
	}
	public function getReturnedCouriersCount(){
		$query = "SELECT count(courier.courier_id) as c FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status ='Returned' and user_id = '".$_SESSION['user_id']."';";
		return (($this->db_read($query))[0])['c'];
	}
	public function getInTransitsCouriersCount(){
		$query = "SELECT count(courier.courier_id) as c FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status !='pending' and courier_status.status !='Finished' and user_id = '".$_SESSION['user_id']."' group by courier.courier_id order by status_date";
		return (($this->db_read($query))[0])['c'];
	}
	public function getFinishedCouriersCount(){
		$query = "SELECT count(courier.courier_id) as c FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status ='Finished' and user_id = '".$_SESSION['user_id']."';";
		return (($this->db_read($query))[0])['c'];
	}
	
	public function getAllCouriersCount(){
		$query = "SELECT count(courier.courier_id) as c FROM courier 
		where user_id = '".$_SESSION['user_id']."';";
		return (($this->db_read($query))[0])['c'];
	}
	public function getSender($sender_id){
		$query = "SELECT * FROM sender inner join district on district.district_id = sender.sender_address_line_3 where sender_id = '$sender_id'";
		return $this->db_read($query);
	}
	public function getReceiver($sender_id){
		$query = "SELECT * FROM receiver inner join district on district.district_id = receiver.receiver_address_line_3 where receiver_id = '$sender_id'";
		return $this->db_read($query);
	}
	public function getTracking($courier_id){
		$query = "SELECT * from  tracking  inner join 
		courier_status on courier_status.courier_status_id = tracking.courier_status_id where courier_id = $courier_id ORDER BY status_date;";
		return $this->db_read($query);
	}
	function getCourier($id){
		$id = (int)$id;
		
		$query = "SELECT * FROM courier inner join sender on 
		sender.sender_id=courier.sender_id inner join receiver on 
		receiver.receiver_id = courier.receiver_id inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id 
		where courier_id='$id' ";
		return $this->db_read($query);
	
	}
	public function getDistrictName($district_id)
	{
		$query = "SELECT * FROM district where district_id=$district_id";

		return (($this->db_read($query))[0])['district_name'];
	}
	function saveCourier($post)
	{
		$Error = "";

		date_default_timezone_set('Asia/Colombo');
		$date = date('Y-m-d H:i:s');

		$receiver_fname = addsLashes($post['receiver_fname']);
		$receiver_lname = addsLashes($post['receiver_lname']);
		$receiver_mobile = addsLashes($post['receiver_mobile']);
		$receiver_address1 = addsLashes($post['receiver_address1']);
		$receiver_address2 = addsLashes($post['receiver_address2']);
		$receiver_address3 = addsLashes($post['receiver_address3']);

		$type = addsLashes($post["r1"]);
		$package_price = addsLashes($post['package_price']);
		$package_weight = addsLashes($post['package_weight']);
		$delivery_charge = addsLashes($post['delivery_charge']);
		$desc = addsLashes($post['desc']);

		$cus = $this->get_Customer();
		$sender_fname = ($cus[0])['fname'];
		$sender_lname = ($cus[0])['lname'];
		$sender_mobile = ($cus[0])['mobile'];
		$sender_address1 = ($cus[0])['address_line_1'];
		$sender_address2 = ($cus[0])['address_line_2'];
		$sender_address3 = ($cus[0])['address_line_3'];

		$barcode = $this->getBarcode();
		$barcode_id = ($barcode[0])['barcode_id'];
		$barcode_current = ($barcode[0])['barcode_current'];

		if ($type == "COD" && $package_price == "" | $package_price == null) {
			$Error = "Add package price or leave it 0.";
		}
		if ($package_weight == "0") {
			$Error = "Package weight can be 0";
		}
		if (!is_numeric($delivery_charge)) {
			$Error = "Something went wrong";
		}

		if ($Error == "") {
			if (!is_numeric($package_price)) {
				$package_price = 0;
			}
			$result = $this->db_read("select count(sender_fname) as c from sender");
			$sender_id = ((int) ($result[0])['c']) + 1;

			$query = "insert into sender (sender_id,sender_fname,sender_lname,sender_mobile,
		sender_address_line_1,sender_address_line_2,sender_address_line_3) 
	values (:sender_id,:sender_fname,:sender_lname,:sender_mobile,
:sender_address_line_1,:sender_address_line_2,:sender_address_line_3)";

			$data = array();

			$data['sender_id'] = $sender_id;
			$data['sender_fname'] = $sender_fname;
			$data['sender_lname'] = $sender_lname;
			$data['sender_mobile'] = $sender_mobile;
			$data['sender_address_line_1'] = $sender_address1;
			$data['sender_address_line_2'] = $sender_address2;
			$data['sender_address_line_3'] = $sender_address3;

			$this->db_write($query, $data);

			$result = $this->db_read("select count(receiver_fname) as c from receiver");
			$receiver_id = ((int) ($result[0])['c']) + 1;

			$query = "insert into receiver (receiver_id,receiver_fname,receiver_lname,receiver_mobile,
receiver_address_line_1,receiver_address_line_2,receiver_address_line_3) 
values (:receiver_id,:receiver_fname,:receiver_lname,:receiver_mobile,
:receiver_address_line_1,:receiver_address_line_2,:receiver_address_line_3)";

			$data = array();

			$data['receiver_id'] = $receiver_id;
			$data['receiver_fname'] = $receiver_fname;
			$data['receiver_lname'] = $receiver_lname;
			$data['receiver_mobile'] = $receiver_mobile;
			$data['receiver_address_line_1'] = $receiver_address1;
			$data['receiver_address_line_2'] = $receiver_address2;
			$data['receiver_address_line_3'] = $receiver_address3;

			$this->db_write($query, $data);


			$result = $this->db_read("select count(delevery_charge_id) as c from delevery_charge");
			$delevery_charge_id = ((int) ($result[0])['c']) + 1;

			$query = "insert into delevery_charge (delevery_charge_id,delevery_code,charge,status) 
values (:delevery_charge_id,:delevery_code,:charge,:status)";

			$data = array();

			$data['delevery_charge_id'] = $delevery_charge_id;
			$data['delevery_code'] = $type;
			$data['charge'] = $delivery_charge;
			$data['status'] = 1;

			$this->db_write($query, $data);

			$user = $_SESSION["user_id"];

			$result = $this->db_read("select count(courier_id) as c from courier");
			$courier_id = ((int)($result[0])['c']) + 1;
		
		
			$query = "INSERT INTO courier (courier_id,package_price,package_weight,package_desc,
		courier_type,is_paid,sender_id,receiver_id,delevery_charge_id,user_id,barcode_no,courier_date) values ( :courier_id,:package_price,:package_weight,:package_desc,
		:courier_type,:is_paid,:sender_id,:receiver_id,:delevery_charge_id,:user_id,:barcode_no,:courier_date )";
		
			$data = array();
			$data['courier_id'] = $courier_id;
			$data['package_price'] = $package_price;
			$data['package_weight'] = $package_weight;
			$data['package_desc'] = $desc;
			$data['courier_type'] = $type;
		
			if ($type == "Cash") {
				$data['is_paid'] = 1;
			} else {
				$data['is_paid'] = 0;
			}
			$data['sender_id'] = $sender_id;
			$data['receiver_id'] = $receiver_id;
			$data['delevery_charge_id'] = $delevery_charge_id;
			$data['user_id'] = $user;
		
			//barcode id
			$barcode_current = $barcode_current+1;
			$data['barcode_no'] = ($barcode_current);
			$data['courier_date'] = $date;
			$this->db_write($query, $data);
			$query = "update barcode set barcode_current = '$barcode_current' where barcode_id = '$barcode_id'";
			$this->db_write($query);
		
			$result = $this->db_read("select count(courier_status_id) as c from courier_status");
			$courier_status_id = ((int)($result[0])['c']) + 1;
		
			$query = "insert into courier_status (courier_status_id,status) values (:courier_status_id,:status)";
			$data = array();
			$data['courier_status_id'] = $courier_status_id;
			$data['status'] = "Pending";
			
		
			$this->db_write($query, $data);
		
			$query = "insert into tracking (courier_id,courier_status_id,status_date) values (:courier_id,:courier_status_id,:status_date)";
		
			$data = array();
			$data['courier_id'] = $courier_id;
			$data['courier_status_id'] = $courier_status_id;
			$data['status_date'] = $date;
		
			$this->db_write($query, $data);
			header("Location: print?p_id=$courier_id");
			die;
		}

		return $Error;
	}
	public function getBarcode()
	{
		$id = $_SESSION['customer_id'];
		$query = "SELECT barcode_id,barcode_current FROM customer inner join barcode on barcode.barcode_id = customer.barcode_barcode_id where cus_id = '$id';";
		return $this->db_read($query);
	}
	public function get_Customer()
	{
		//get profile
		$id = $_SESSION['customer_id'];
		$query = "select * from customer where cus_id = '$id' limit 1";
		return $this->db_read($query);
	}
}

class User extends Database
{
	function register($POST)
	{
		$Error = "";

		$uname = addsLashes($POST["uname"]);
		$password = addsLashes($POST["password"]);
		$email = addsLashes($POST["email"]);
		$mobile = addsLashes($POST["mobile"]);
		$com_name = addsLashes($POST["com_name"]);
		$fname = addsLashes($POST["fname"]);
		$lname = addsLashes($POST["lname"]);
		$nic = addsLashes($POST["nic"]);
		$address_1 = addsLashes($POST["address_1"]);
		$address_2 = addsLashes($POST["address_2"]);
		$address_3 = addsLashes($POST["address_3"]);
		$acc_name = addsLashes($POST["acc_name"]);
		$acc_number = addsLashes($POST["acc_number"]);
		$bank = addsLashes($POST["bank"]);
		$bank_branch = addsLashes($POST["bank_branch"]);

		$arr = array();
		$arr['user_name'] = $uname;
		$query = "select * from user where user_name = :user_name";
		if ($this->db_check($query, $arr)) {
			$Error = "Username already exists";
		} else {
			$arr = array();
			$arr['nic'] = $nic;
			$query = "select * from customer where nic = :nic";
			if ($this->db_check($query, $arr)) {
				$Error = "NIC already exists.";
			} else {
				$arr = array();
				$arr['email'] = $email;
				$query = "select * from customer where email = :email";
				if ($this->db_check($query, $arr)) {
					$Error = "Email already exists.";
				} else {
					$arr = array();
					$arr['mobile'] = $mobile;
					$query = "select * from customer where mobile = :mobile";
					if ($this->db_check($query, $arr)) {
						$Error = "Mobile Number already Exists";
					} else {

						$key = random_int(0, 999999);
						$key = str_pad($key, 6, 0, STR_PAD_LEFT);
						$result = $this->db_read("select count(code) as c from verify_code");
						$code_id = ((int) ($result[0])['c']) + 1;

						$query1 = "insert into verify_code (verify_code_id,code) values (:verify_code_id,:code)";
						$data1 = array();
						$data1['verify_code_id'] = $code_id;
						$data1['code'] = $key;

						$result = $this->db_read("select count(user_id) as c from user");
						$user_id = ((int) ($result[0])['c']) + 1;

						$query2 = "insert into user (user_id,user_name,password,is_verify,is_2fa_active,user_type_id,status_id,verify_code_id,img_id)
                 values (:user_id,:user_name,:password,:is_verify,:is_2fa_active,:user_type_id,:status_id,:verify_code_id,:img_id)";
						$data2 = array();
						$data2['user_id'] = $user_id;
						$data2['user_name'] = $uname;
						$data2['password'] = password_hash($password, PASSWORD_DEFAULT);
						$data2['is_verify'] = 0;
						$data2['is_2fa_active'] = 0;
						$data2['user_type_id'] = 4;
						$data2['status_id'] = 2;
						$data2['verify_code_id'] = $code_id;
						$data2['img_id'] = 1;

						$query3 = "insert into customer (fname,lname,company_name,nic,email,mobile,address_line_1,address_line_2
						,address_line_3,account_name,account_no,user_id,active_status,bank_branch_id,barcode_barcode_id,is_cash_customer) 
						values (:fname, :lname, :company_name, :nic, :email, :mobile, :address_line_1, :address_line_2
						, :address_line_3, :account_name, :account_no, :user_id, :active_status, :bank_branch_id, :barcode_barcode_id, :is_cash_customer)";

						$data3 = array();
						$data3['fname'] = $fname;
						$data3['lname'] = $lname;
						$data3['company_name'] = $com_name;
						$data3['nic'] = $nic;
						$data3['email'] = $email;
						$data3['mobile'] = $mobile;
						$data3['address_line_1'] = $address_1;
						$data3['address_line_2'] = $address_2;
						$data3['address_line_3'] = $address_3;
						$data3['account_name'] = $acc_name;
						$data3['account_no'] = $acc_number;
						$data3['user_id'] = $user_id;
						$data3['active_status'] = 1;
						$data3['bank_branch_id'] = $bank_branch;
						$data3['barcode_barcode_id'] = 1;
						$data3['is_cash_customer'] = 0;
						$c = $this->db_write($query1, $data1);
						$c = $this->db_write($query2, $data2);
						$c = $this->db_write($query3, $data3);
						if ($c) {
							$Error = "Success";
						} else {
							$Error = "Registration Failed.";
						}
					}
				}
			}
		}

		return $Error;
	}
	function login($POST)
	{
		$Error = "";

		$username = addsLashes($POST["uname"]);
		$password = addsLashes($POST["password"]);


		$arr = array();
		$arr['username'] = $username;
		$query = "select * from user where user_name = :username";
		$check = $this->db_check($query, $arr);
		if ($check) {
			$result = $this->db_read("select * from user where user_name = :username", $arr);
			$hash = ($result[0])['password'];
			if (password_verify($password, $hash)) {
				$status = ($result[0])['status_id'];
				$is_verify = ($result[0])['is_verify'];
				if ($status == 2 && $is_verify == 1) {
					$Error = "Your account has been baned.";
				} else if ($status == 2) {
					$Error = "Not Approved yet.";
				} else {
					$row = $result[0];
					if (session_status() === PHP_SESSION_NONE) {
						session_start();
					}
					if($row["user_type_id"]==4){
						$_SESSION["user_id"] = $row["user_id"];
						$_SESSION["user_type_id"] = $row["user_type_id"];
						$query = "update user set is_verify = 1 where user_id = '" . $row['user_id'] . "'";
						$arr = array();
						$arr['user_id'] = $row["user_id"];
						$result1 = $this->db_read("select * from customer where user_id = :user_id", $arr);
						$row1 = $result1[0];
						$_SESSION["name"] = $row1["fname"] . " " . $row1["lname"];
						$_SESSION['customer_id'] = $row1['cus_id'];
						// setcookie("email",$username,time()+(60*60*24*365));
						//     setcookie("password",$password,time()+(60*60*24*365));
						session_write_close();
					}else{
						$Error = 'Wrong Username or Password';
					}
					

					// if($rememberme == "true"){
					//     setcookie("email",$username,time()+(60*60*24*365));
					//     setcookie("password",$password,time()+(60*60*24*365));
					// }else{

					//     setcookie("email","",-1);
					//     setcookie("password","",-1);

					// }
				}

			} else {
				$Error = 'Wrong Password';
			}
		} else {
			$Error = 'Wrong Username';

		}
		return $Error;
	}

	function getCus(){
		$arr = array();
        $arr['emp_id'] = $_SESSION["user_id"];
		$query="select * from customer inner join district on customer.address_line_3=district.district_id  where user_id = :emp_id";
        return $this->db_read($query, $arr);
	}
}



function clear($value)
{
	return htmlspecialchars($value);
}