<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Services extends CI_Model {
	function autocomplete(
		$term
	)
    {
		$this->db->select('id, nama as label, nama as value');
		
		$this->db->like('nama', $term);
		
        $query = $this->db->get('service', 10);
        return $query->result();
    }
	
	function autocomplete2()
    {
		$this->db->select('nama as name');
		
        $query = $this->db->get('service', 10);
        return $query->result();
    }
	
	function insert(
		$name
	) {
		$data = array(
			'Nama' => $name,
		);
		
		$this->db->insert('service', $data); 
	}
	
	function update(
		$id,
		$name
	) {
		$data = array(
			'Nama' => $name
		);
		
		$this->db->where('ID', $id);
		$this->db->update('service', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		$this->db->delete('service'); 
	}
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('service');
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