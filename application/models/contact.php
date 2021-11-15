<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Contact extends CI_Model {
	function autocomplete(
		$term
	)
    {
		$this->db->select('id, nama as label, nama as value');
		$this->db->select('perusahaan as company');
		$this->db->select('alamat as address');
		$this->db->select('kota as city');
		$this->db->select('provinsi as province');
		$this->db->select('negara as country');
		$this->db->select('zip');
		$this->db->select('kontak as contact');
		$this->db->select('telpon as phone');
		$this->db->select('email');
		
		$this->db->like('nama', $term);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('contact', 10);
        return $query->result();
    }
	
	function autocomplete2(
		$term,
		$customer
	)
    {
		$this->db->select('perusahaan as company');
		$this->db->select('nama as name');
		$this->db->select('alamat as address');
		$this->db->select('kota as city');
		$this->db->select('provinsi as province');
		$this->db->select('negara as country');
		$this->db->select('zip');
		$this->db->select('kontak as contact');
		$this->db->select('telpon as phone');
		$this->db->select('email');
		
		$this->db->like('nama', $term);
		$this->db->where_in('keyCustomer', $customer);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('contact', 10);
        return $query->result();
    }
	
	function insert(
		$customer,
		$name,
		$company,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$phone,
		$email
	) {
		$data = array(
			'keyCustomer' => $customer,
			'Nama' => $name,
			'Perusahaan' => $company,
			'Alamat' => $address,
			'Kota' => $city,
			'Provinsi' => $province,
			'Negara' => $country,
			'ZIP' => $zip,
			'Kontak' => $contact,
			'Telpon' => $phone,
			'Email' => $email
		);
		
		$this->db->insert('contact', $data); 
	}
	
	function update(
		$id,
		$name,
		$company,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$phone,
		$email
	) {
		$data = array(
			'Nama' => $name,
			'Perusahaan' => $company,
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
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
		$this->db->update('contact', $data);
	}
	
	function insert2(
		$customer,
		$name,
		$company,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$email,
		$phone
	) {
		$data = array(
			'keyCustomer' => $customer,
			'Nama' => $name,
			'Perusahaan' => $company,
			'Alamat' => $address,
			'Kota' => $city,
			'Provinsi' => $province,
			'Negara' => $country,
			'ZIP' => $zip,
			'Kontak' => $contact,
			'Telpon' => $phone,
			'Email' => $email
		);
		
		$this->db->insert('contact', $data); 
	}
	
	function update2(
		$id,
		$name,
		$company,
		$address,
		$city,
		$province,
		$country,
		$zip,
		$contact,
		$email,
		$phone
	) {
		$data = array(
			'Nama' => $name,
			'Perusahaan' => $company,
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
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
		$this->db->update('contact', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
		$this->db->delete('contact'); 
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('contact');
		$this -> db -> where('Nama', $name);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
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