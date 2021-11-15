<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class User extends CI_Model {
    function login($username, $password)
    {
		$this -> db -> select('ID');
		$this -> db -> select('Level');
		$this -> db -> select('keyCustomer');
		$this -> db -> select('keyCompany');
		$this -> db -> from('users');
		$this -> db -> where('Username', $username);
		$this -> db -> where('Password', $password);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result();
		}
		else {
			return FALSE;
		}
	}
	
	function unique_key(
		$key
	) {
		$this -> db -> select('ID');
		$this -> db -> from('users');
		$this -> db -> where('Key', $key);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	function update_key(
		$id,
		$key
	) {
		$data = array(
			'Key' => $key
		);
		
		$this->db->where('ID', $id);
		$this->db->update('users', $data);
	}
	
	function update_mobile(
		$id,
		$level,
		$connect
	) {
		$data = array(
			'Mobile_Level' => $level,
			'Mobile_Team' => $connect === 'true'? 1: 0
		);
		
		$this->db->where('ID', $id);
		$this->db->update('users', $data);
	}
	
	function user_new (
		$customer,
		$username,
		$password
	) {
		$data = array(
			'Username' => $username,
			'Password' => $password,
			'keyCustomer' => $customer
		);
		
		$this->db->insert('users', $data); 
	}
	
	function insertMobile (
		$nama,
		$imei,
		$hp,
		$key,
		$smsKey,
		$expKey,
		$lat,
		$lon,
		$acc,
		$status,
		$level
	) {
		$data = array(
			'Nama' => $nama,
			'IMEI' => $imei,
			'HP' => $hp,
			'Key' => $key,
			'SMS_Key' => $smsKey,
			'Exp_Key' => $expKey,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Accuracy' => $acc,
			'Mobile_Team' => $status,
			'Mobile_Level' => $level
		);
		
		$this->db->insert('users', $data); 
	}
	
	function insertMobileTrack (
		$nama,
		$imei,
		$hp,
		$smsKey,
		$expKey,
		$lat,
		$lon,
		$status
	) {
		$data = array(
			'Nama' => $nama,
			'IMEI' => $imei,
			'HP' => $hp,
			'SMS_Key' => $smsKey,
			'Exp_Key' => $expKey,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Mobile_Track' => $status
		);
		
		$this->db->insert('users', $data); 
	}
	
	function updateMobileTeam1 (
		$nama,
		$imei,
		$hp,
		$key,
		$smsKey,
		$expKey,
		$lat,
		$lon,
		$acc,
		$status
	) {
		$data = array(
			'Nama' => $nama,
			'Key' => $key,
			'SMS_Key' => $smsKey,
			'Exp_Key' => $expKey,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Accuracy' => $acc,
			'Mobile_Team' => $status
		);
		
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this->db->update('users', $data); 
	}
	
	function updateMobileTeam2 (
		$nama,
		$imei,
		$hp,
		$key,
		$smsKey,
		$expKey,
		$lat,
		$lon,
		$acc,
		$status
	) {
		$data = array(
			'Nama' => $nama,
			'IMEI' => $imei,
			'HP' => $hp,
			'SMS_Key' => $smsKey,
			'Exp_Key' => $expKey,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Accuracy' => $acc,
			'Mobile_Team' => $status
		);
		
		$this -> db -> where('Key', $key);
		$this->db->update('users', $data); 
	}
	
	function updateMobileTeam3 (
		$imei,
		$hp,
		$status
	) {
		$data = array(
			'Mobile_Team' => $status
		);
		
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this->db->update('users', $data); 
	}
	
	function updateMobileTrack1 (
		$nama,
		$imei,
		$hp,
		$smsKey,
		$expKey,
		$lat,
		$lon,
		$status
	) {
		$data = array(
			'Nama' => $nama,
			'IMEI' => $imei,
			'HP' => $hp,
			'SMS_Key' => $smsKey,
			'Exp_Key' => $expKey,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Mobile_Track' => $status
		);
		
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this->db->update('users', $data); 
	}
	
	function updateMobileTrack3 (
		$imei,
		$hp,
		$status
	) {
		$data = array(
			'Mobile_Track' => $status
		);
		
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this->db->update('users', $data); 
	}
	
	function getKeyID (
		$key
	) {
		$this -> db -> select('ID');
		$this -> db -> from('users');
		$this -> db -> where('Key', $key);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
	
	function getPassword ($username) {
		$this -> db -> select('Password');
		$this -> db -> from('users');
		$this -> db -> where('Username', $username);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Password;
		}
		else {
			return 0;
		}
	}
	
	function updatePassword ($username, $password) {
		$data = array(
			'Password' => $password
		);
		
		$this -> db -> where('Username', $username);
		$this->db->update('users', $data); 
	}
	
	function getMobileID (
		$imei,
		$hp
	) {
		$this -> db -> select('ID');
		$this -> db -> select('Username');
		$this -> db -> select('Level');
		$this -> db -> select('keyCustomer');
		$this -> db -> select('keyCompany');
		$this -> db -> from('users');
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			$user_info = array(
				'id' => $query->result()[0]->ID,
				'username' => $query->result()[0]->Username,
				'logged_in' => TRUE,
				'level' => $query->result()[0]->Level,
				'key_customer' => $query->result()[0]->keyCustomer,
				'key_company' => $query->result()[0]->keyCompany
			);
			
			$this->session->set_userdata($user_info);
			
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
	
	function getMobileLevel (
		$imei,
		$hp
	) {
		$this -> db -> select('Mobile_Level');
		$this -> db -> from('users');
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Mobile_Level;
		}
		else {
			return 0;
		}
	}
	
	function checkSMSKey (
		$imei,
		$hp,
		$key
	) {
		$this -> db -> select('ID');
		$this -> db -> from('users');
		$this -> db -> where('IMEI', $imei);
		$this -> db -> where('HP', $hp);
		$this -> db -> where('SMS_Key', $key);
		$this -> db -> where('Exp_Key > ', date("Y-m-d H:i:s"));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return 1;
		}
		else {
			return 0;
		}
	}
	
	function getKeyCompany (
		$keyCustomer
	) {
		$this -> db -> select('Company');
		$this -> db -> from('customer');
		$this -> db -> where('ID', $keyCustomer);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Company;
		}
		else {
			return 0;
		}
	}
	
	function getCompany (
		$shipment
	) {
		$this -> db -> select('c.Nama, c.Alamat, c.Kota, c.ZIP, c.Negara');
		$this -> db -> from('shipment a');
		$this -> db -> join('customer b', 'a.keyCustomer = b.ID');
		$this -> db -> join('company c', 'b.Company = c.ID');
		$this -> db -> where('Shipment_No', $shipment);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0];
		}
		else {
			return 0;
		}		
	}
	
	function getAllCustomer() {
		$this->db->select('ID');
		$this->db->from('customer');
		$this->db->where('Company', $this->session->userdata('key_company'));
		
		$query = $this -> db -> get();
		
		$data = '';
		
		foreach($query->result() as $row) {
			$data .= $row->ID.',';
		}
		
		$data = substr($data, 0, strlen($data)-1);
		
		return $data;
	}
	
	function getUserCustomer (
		$id
	) {
		$this -> db -> select('a.ID id, b.Nama customer, a.Username user');
		$this -> db -> from('users a');
		$this -> db -> join('customer b', 'a.keyCustomer = b.ID');
		$this -> db -> where('b.ID', $id);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		return $query->result();
	}
}