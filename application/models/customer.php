<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Customer extends CI_Model {
	function autocomplete(
		$term
	)
    {
		$this->db->select('id, nama as label, nama as value');
		
		$this->db->like('nama', $term);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('ID', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('customer', 10);
        return $query->result();
    }
	
	function autocomplete2(
		$term,
		$customer
	)
    {
		$this->db->select('nama as name');
		
		$this->db->like('nama', $term);
		$this->db->where_in('ID', $customer);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('ID', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('customer', 10);
        return $query->result();
    }
	
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
		if ($this->session->userdata('level') < 2) {
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
			
			$this->db->insert('customer', $data);
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
		if ($this->session->userdata('level') < 2) {
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
			$this->db->update('customer', $data);
		}
	}
	
	function delete(
		$id
	) {
		if ($this->session->userdata('level') < 2) {
			$this->db->where('ID', $id);
			$this->db->delete('customer');
		}
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('customer');
		$this -> db -> where('Nama', $name);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('ID', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
}