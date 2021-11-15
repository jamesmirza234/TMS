<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Items extends CI_Model {
	function autocomplete(
		$term
	)
    {
		$this->db->select('id, nama as label, nama as value');
		$this->db->select('panjang as length');
		$this->db->select('lebar as width');
		$this->db->select('tinggi as height');
		$this->db->select('berat as weight');
		
		$this->db->like('nama', $term);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('barang', 10);
        return $query->result();
    }
	
	function autocomplete2(
		$term,
		$customer
	)
    {
		$this->db->select('nama as name');
		$this->db->select('panjang as length');
		$this->db->select('lebar as width');
		$this->db->select('tinggi as height');
		$this->db->select('berat as weight');
		
		$this->db->like('nama', $term);
		$this->db->where_in('keyCustomer', $customer);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
        $query = $this->db->get('barang', 10);
        return $query->result();
    }
	
	function insert(
		$customer,
		$name,
		$length,
		$width,
		$height,
		$weight
	) {
		$data = array(
			'keyCustomer' => $customer,
			'Nama' => $name,
			'Panjang' => $length,
			'Lebar' => $width,
			'Tinggi' => $height,
			'Berat' => $weight
		);
		
		$this->db->insert('barang', $data); 
	}
	
	function update(
		$id,
		$name,
		$length,
		$width,
		$height,
		$weight
	) {
		$data = array(
			'Nama' => $name,
			'Panjang' => $length,
			'Lebar' => $width,
			'Tinggi' => $height,
			'Berat' => $weight
		);
		
		$this->db->where('ID', $id);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
		$this->db->update('barang', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		
		$this->db->delete('barang'); 
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('barang');
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