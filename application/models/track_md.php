<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Track_md extends CI_Model {
	function insert(
		$name,
		$lat,
		$lon,
		$user,
		$date
	) {
		$data = array(
			'Transport' => $name,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Modified_By' => $user,
			'Modified_Date' => $date
		);
		
		$this->db->insert('track', $data); 
	}
}