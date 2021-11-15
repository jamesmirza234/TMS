<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Pop extends CI_Model {
	function insert (
		$shipment,
		$tanggal,
		$imei,
		$telpon,
		$lat,
		$lon,
		$kategori,
		$gambar1,
		$gambar2,
		$gambar3,
		$penerima,
		$keterangan
	) {
		$data = array (
			'Shipment' => $shipment,
			'Tanggal' => $tanggal,
			'IMEI' => $imei,
			'Telpon' => $telpon,
			'Latitude' => $lat,
			'Longitude' => $lon,
			'Kategori' => $kategori,
			'Gambar1' => $gambar1,
			'Gambar2' => $gambar2,
			'Gambar3' => $gambar3,
			'Penerima' => $penerima,
			'Keterangan' => $keterangan,
			'Modified_By' => $this->session->userdata('username'),
			'Modified_Date' => date("Y-m-d H:i:s")
		);

		$this->db->insert('pop', $data); 
	}
	
	function countShipment (
		$shipment
	) {
		$this -> db -> select('count(ID) as jml', FALSE);
		$this -> db -> from('pop');
		$this -> db -> where('Shipment', $shipment);

		$query = $this -> db -> get();

		return $query->result()[0]->jml;
	}
}