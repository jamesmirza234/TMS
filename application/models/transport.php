<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Transport extends CI_Model {
	function getTransport($nama)
    {
		// $this -> db -> select('Harga');
		// $this -> db -> from('transport');
		// $this -> db -> where('Asal', $asal);
		// $this -> db -> where('Tujuan', $tujuan);
		// $this -> db -> where('Service', $service);
		// $this -> db -> where('Satuan', $satuan);
		// $this -> db -> limit(1);

		// $query = $this -> db -> get();

		// if($query -> num_rows() == 1) {
			// return $query->result()[0]->Harga;
		// }
		// else {
			// return 0;
		// }
    }
	
	function insert (
		$name,
		$type,
		$l,
		$w,
		$h,
		$lat,
		$lon,
		$acc
	) {
		$data = array (
			'Nama' => $name,
			'Tipe' => $type,
			'Panjang' => $l,
			'Lebar' => $w,
			'Tinggi' => $h,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Accuracy' => $acc
		);
		
		$this->db->insert('transport', $data); 
	}
	
	function updateLastPair(
		$id,
		$last
	) {
		$data = array(
			'Last_Pair' => $last
		);
		
		$this->db->where('ID', $id);
		$this->db->update('transport', $data);
	}

	function getID (
		$name
	) {
		$this -> db -> select('ID');
		$this -> db -> from('transport');
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

	function getIDByLast (
		$last
	) {
		$this -> db -> select('ID');
		$this -> db -> from('transport');
		$this -> db -> where('Last_Pair', $last);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}

	function getType (
		$name
	) {
		$this -> db -> select('Tipe');
		$this -> db -> from('transport');
		$this -> db -> where('Nama', $name);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Tipe;
		}
		else {
			return 0;
		}
	}

	function getTypeByID (
		$id
	) {
		$this -> db -> select('Tipe');
		$this -> db -> from('transport');
		$this -> db -> where('ID', $id);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Tipe;
		}
		else {
			return 0;
		}
	}
}