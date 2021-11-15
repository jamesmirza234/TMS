<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Company extends CI_Model {
	function insert(
		$name,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$phone,
		$email
	) {
		if ($this->session->userdata('level') < 1) {
			$data = array(
				'Nama' => $name,
				'Alamat' => $address,
				'Kota' => $city,
				'Provinsi' => $province,
				'Negara' => $country,
				'ZIP' => $zip,
				'Kontak' => $contact,
				'Telpon' => $phone,
				'Email' => $email
			);
			
			$this->db->insert('company', $data);
		}
	}
	
	function update(
		$id,
		$name,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$phone,
		$email
	) {
		if ($this->session->userdata('level') < 1) {
			$data = array(
				'Nama' => $name,
				'Alamat' => $address,
				'Kota' => $city,
				'Provinsi' => $province,
				'Negara' => $country,
				'ZIP' => $zip,
				'Kontak' => $contact,
				'Telpon' => $phone,
				'Email' => $email
			);
			
			$this->db->where('ID', $id);
			
			$this->db->update('company', $data);
		}
	}
	
	function delete(
		$id
	) {
		if ($this->session->userdata('level') < 1) {
			$this->db->where('ID', $id);
			$this->db->delete('company'); 
		}
	}
	
	function getRow (
		$id
	) {
		$this -> db -> select('*');
		$this -> db -> from('company');
		$this -> db -> where('ID', $id);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0];
		}
		else {
			return 0;
		}
	}
}