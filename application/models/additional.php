<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Additional extends CI_Model {
	function autocomplete2()
    {
		$this->db->select('nama as name');
		$this->db->select('harga as price');
		
        $query = $this->db->get('additional_service', 10);
        return $query->result();
    }
	
	function insert(
		$name,
		$price
	) {
		$data = array(
			'Nama' => $name,
			'Harga' => $price
		);
		
		$this->db->insert('additional_service', $data); 
	}
	
	function update(
		$id,
		$name,
		$price
	) {
		$data = array(
			'Nama' => $name,
			'Harga' => $price
		);
		
		$this->db->where('ID', $id);
		$this->db->update('additional_service', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		$this->db->delete('additional_service'); 
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('additional_service');
		$this -> db -> where('Nama', $name);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
}