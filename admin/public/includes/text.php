<?php
require 'database.php';
class Employee extends Database
{
	function getAllAdmins($emp_type)
	{
		if (role() == 1) {
			$query = "SELECT * FROM employee inner join user on employee.user_id=user.user_id inner join branch on employee.branch_id=branch.branch_id where user.user_type_id= '$emp_type'";
		} else {
			$query = "SELECT * FROM employee inner join user on employee.user_id=user.user_id inner join branch on employee.branch_id=branch.branch_id where user.user_type_id= '$emp_type' and employee.branch_id='" . $_SESSION["branch_id"] . "'";
		}
		return $this->db_read($query);
	}
	function getBranches()
	{
		if (role() == 1) {
			$query = "SELECT * FROM branch";
		} else {
			$query = "SELECT * FROM branch where branch_id = '" . $_SESSION["branch_id"] . "'";
		}

		return $this->db_read($query);
	}

	function getAllZones()
	{
		$query = "SELECT * FROM zone";
		return $this->db_read($query);
	}
	function getAllZonesExtraCharges()
	{
		$query = "SELECT * FROM extra_charge inner join zone_extra_charge on extra_charge.extra_charge_id = zone_extra_charge.extra_charge_id inner join zone on zone_extra_charge.zone_id = zone.zone_id order by zone.zone_name";
		return $this->db_read($query);
	}
	function getAllZoneDistricts($zone_id)
	{
		$query = "SELECT * FROM zone_districts inner join district on district.district_id = zone_districts.district_id where zone_districts.zone_id = $zone_id";
		return $this->db_read($query);
	}
	function getAllZoneExtraCharges($zone_id)
	{
		$query = "SELECT * FROM zone_extra_charge inner join extra_charge on extra_charge.extra_charge_id = zone_extra_charge.extra_charge_id where zone_extra_charge.zone_id = $zone_id";
		return $this->db_read($query);
	}

	function getCities()
	{
		$query = "SELECT * FROM district ORDER BY district_name ASC";

		return $this->db_read($query);
	}
	public function get_profile($id)
	{
		//get profile
		$id = (int)$id;
		$query = "select * from users where id = '$id' limit 1";
		return $this->db_read($query);
	}
	public function getCourier($courier_id)
	{

		$id = (int)$courier_id;
		$query = "SELECT * FROM courier inner join sender on 
		sender.sender_id=courier.sender_id inner join receiver on 
		receiver.receiver_id = courier.receiver_id inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id 
		where courier_id='$id' ";
		return $this->db_read($query);
	}
	public function getCourierBarcode($courier_id)
	{
		$id = (int)$courier_id;
		$query = "SELECT * FROM courier inner join sender on 
		sender.sender_id=courier.sender_id inner join receiver on 
		receiver.receiver_id = courier.receiver_id inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id 
		where barcode_no='$id'; ";
		return $this->db_read($query);
	}
	public function getTracking($courier_id){
		$query = "SELECT * from  tracking  inner join 
		courier_status on courier_status.courier_status_id = tracking.courier_status_id where courier_id = $courier_id ORDER BY status_date;";
		return $this->db_read($query);
	}
	public function getPendingCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		 ORDER BY status_date;";
		return $this->db_read($query);
	}

	public function getInTransitsCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status !='pending' and courier_status.status !='Finished' group by courier.courier_id order by status_date";
		return $this->db_read($query);
	}
	public function getFinishedCouriers(){
		$query = "SELECT * FROM courier inner join 
		delevery_charge on delevery_charge.delevery_charge_id=courier.delevery_charge_id inner join
        tracking on courier.courier_id = tracking.courier_id inner join 
        courier_status on courier_status.courier_status_id = tracking.courier_status_id
		where courier_status.status ='Finished';";
		return $this->db_read($query);
	}
	public function getSender($sender_id){
		$query = "SELECT * FROM sender inner join district on district.district_id = sender.sender_address_line_3 where sender_id = '$sender_id'";
		return $this->db_read($query);
	}
	public function getReceiver($sender_id){
		$query = "SELECT * FROM receiver inner join district on district.district_id = receiver.receiver_address_line_3 where receiver_id = '$sender_id'";
		return $this->db_read($query);
	}
	public function getDistrictName($district_id)
	{
		$query = "SELECT * FROM district where district_id=$district_id";

		return (($this->db_read($query))[0])['district_name'];
	}
	public function getAdminCount(){
		$query = "SELECT count(user_id) as count FROM user where user_type_id = 1";
		$result = $this->db_read($query)[0];
		$count = $result['count'];
		return $count;

	}

	public function getManagerCount(){
		$query = "SELECT count(user_id) as count FROM user where user_type_id = 2";
		$result = $this->db_read($query)[0];
		$count = $result['count'];
		return $count;

	}

	public function getStaffCount(){
		$query = "SELECT count(user_id) as count FROM user where user_type_id = 3";
		$result = $this->db_read($query)[0];
		$count = $result['count'];
		return $count;

	}

	public function getCustomerCount(){
		$query = "SELECT count(user_id) as count FROM user where user_type_id = 4";
		$result = $this->db_read($query)[0];
		$count = $result['count'];
		return $count;

	}

}
function clear($value)
{
	return htmlspecialchars($value);
}

function role()
{
	$user_rank = isset($_SESSION['user_type_id']) ? $_SESSION['user_type_id'] : "";
	return $user_rank;
}
