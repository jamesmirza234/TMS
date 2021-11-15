<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Rate extends CI_Model {
	function getRate($asal, $tujuan, $service, $satuan)
    {
		$this -> db -> select('Harga');
		$this -> db -> from('rate');
		$this -> db -> where('Asal', $asal);
		$this -> db -> where('Tujuan', $tujuan);
		$this -> db -> where('Service', $service);
		$this -> db -> where('Satuan', $satuan);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Harga;
		}
		else {
			return 0;
		}
    }
}