<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Status extends CI_Model {
	function autocomplete(
		$term
	)
    {
		$this->db->select('id, nama as label, nama as value');
		
		$this->db->like('nama', $term);
		
        $query = $this->db->get('status', 10);
        return $query->result();
    }
	
	function insert(
		$name
	) {
		$data = array(
			'Nama' => $name,
		);
		
		$this->db->insert('status', $data); 
	}
	
	function update(
		$id,
		$name
	) {
		$data = array(
			'Nama' => $name
		);
		
		$this->db->where('ID', $id);
		$this->db->update('status', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		$this->db->delete('status'); 
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('status');
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