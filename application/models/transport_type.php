<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Transport_type extends CI_Model {
	function autocomplete2()
    {
		$this->db->select('nama as name');
		$this->db->select('fix');
		$this->db->select('panjang as L');
		$this->db->select('lebar as W');
		$this->db->select('tinggi as H');
		
        $query = $this->db->get('tipe_transport', 10);
        return $query->result();
    }
	
	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('tipe_transport');
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
	
	function getFix (
		$name
	) {
		$this -> db -> select('Fix');
		$this -> db -> from('tipe_transport');
		$this -> db -> where('Nama', $name);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Fix;
		}
		else {
			return 0;
		}
	}
	
	function getFixByID (
		$id
	) {
		$this -> db -> select('Fix');
		$this -> db -> from('tipe_transport');
		$this -> db -> where('ID', $id);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Fix;
		}
		else {
			return 0;
		}
	}
}