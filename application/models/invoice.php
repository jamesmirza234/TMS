<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Invoice extends CI_Model {
	function insert(
		$shipment,
		$invoice,
		$asal,
		$tujuan,
		$koli,
		$jumlah,
		$service,
		$uom,
		$harga,
		$pajak,
		$pajak_persen,
		$total
	) {
		$data = array(
			'Shipment' => $shipment,
			'Invoice_No' => $invoice,
			'Asal' => $asal,
			'Tujuan' => $tujuan,
			'Koli' => $koli,
			'Jumlah' => $jumlah,
			'Service' => $service,
			'UOM' => $uom,
			'Harga' => $harga,
			'Pajak' => $pajak,
			'Pajak_Persen' => $pajak_persen,
			'Total' => $total
		);
		
		$this->db->insert('invoice', $data); 
	}
	
	function getLastID () {
		$this -> db -> select('ID');
		$this -> db -> from('invoice');
		$this -> db -> order_by("ID", "desc");;
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