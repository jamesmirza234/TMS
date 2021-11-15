<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Mobile_log extends CI_Model {
	function insert(
		$log
	) {
		$data = array(
			'data' => $log,
		);
		
		$this->db->insert('mobile_log', $data); 
	}
}