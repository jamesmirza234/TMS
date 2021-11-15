<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Container extends CI_Model {
	function insert (
		$transport,
		$name,
		$fix,
		$l,
		$w,
		$h,
		$lat,
		$lon,
		$acc
	) {
		$data = array (
			'Transport' => $transport,
			'Nama' => $name,
			'Fix' => $fix,
			'Panjang' => $l,
			'Lebar' => $w,
			'Tinggi' => $h,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Accuracy' => $acc
		);
		
		$this->db->insert('container', $data); 
	}
	
	function updateTransport(
		$container,
		$transport
	) {
		$data = array(
			'Transport' => $transport
		);
		
		$this->db->where('ID', $container);
		$this->db->update('container', $data);
	}

	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('container');
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
		$this -> db -> from('container');
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

	function getContainerByTransport (
		$transport
	) {
		$this -> db -> select('ID, Nama');
		$this -> db -> from('container');
		$this -> db -> where('Transport', $transport);

		$query = $this -> db -> get();

		return $query->result();
	}
}