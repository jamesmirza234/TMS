<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Uom extends CI_Model {
	function autocomplete2()
    {
		$this->db->select('nama as name');
		
        $query = $this->db->get('satuan', 10);
        return $query->result();
    }
}