<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Detail_invoice extends CI_Model {
	function insert(
		$invoice,
		$tambahan,
		$harga
	) {
		$data = array(
			'Invoice' => $invoice,
			'Tambahan' => $tambahan,
			'Harga' => $harga
		);
		
		$this->db->insert('detail_invoice', $data); 
	}
}