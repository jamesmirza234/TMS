<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Shipment extends CI_Model {
	function insert(
		$shipmentNo,
		$tanggal,
		$customer,
		$status,
		$keterangan,
		$catatan,
		$dari,
		$dariPerusahaan,
		$dariAlamat,
		$dariKota,
		$dariProvinsi,
		$dariNegara,
		$dariZip,
		$dariKontak,
		$dariTelpon,
		$dariEmail,
		$untuk,
		$untukPerusahaan,
		$untukAlamat,
		$untukKota,
		$untukProvinsi,
		$untukNegara,
		$untukZip,
		$untukKontak,
		$untukTelpon,
		$untukEmail,
		$service,
		$collie,
		$aw,
		$vw,
		$cw,
		$v
	) {
		$data = array(
			'Shipment_No' => $shipmentNo,
			'keyCustomer' => $customer,
			'Tanggal' => $tanggal,
			'Status' => $status,
			'Keterangan' => $keterangan,
			'Catatan' => $catatan,
			'Dari' => $dari,
			'Dari_Perusahaan' => $dariPerusahaan,
			'Dari_Alamat' => $dariAlamat,
			'Dari_Kota' => $dariKota,
			'Dari_Provinsi' => $dariProvinsi,
			'Dari_Negara' => $dariNegara,
			'Dari_ZIP' => $dariZip,
			'Dari_Kontak' => $dariKontak,
			'Dari_Telpon' => $dariTelpon,
			'Dari_Email' => $dariEmail,
			'Untuk' => $untuk,
			'Untuk_Perusahaan' => $untukPerusahaan,
			'Untuk_Alamat' => $untukAlamat,
			'Untuk_Kota' => $untukKota,
			'Untuk_Provinsi' => $untukProvinsi,
			'Untuk_Negara' => $untukNegara,
			'Untuk_ZIP' => $untukZip,
			'Untuk_Kontak' => $untukKontak,
			'Untuk_Telpon' => $untukTelpon,
			'Untuk_Email' => $untukEmail,
			'Service' => $service,
			'Collie' => $collie,
			'AW' => $aw,
			'VW' => $vw,
			'CW' => $cw,
			'V' => $v,
			'Modified_By' => $this->session->userdata('username'),
			'Modified_Date' => date("Y-m-d H:i:s")
		);
		
		$this->db->insert('shipment', $data); 
	}
	
	function update(
		$id,
		$name
	) {
		$data = array(
			'Nama' => $name,
			'Modified_By' => $this->session->userdata('username'),
			'Modified_Date' => date("Y-m-d H:i:s")
		);
		
		$this->db->where('ID', $id);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}
		$this->db->update('shipment', $data);
	}
	
	function keyGenerator() {
		$this -> db -> select('Last');
		$this -> db -> from('auto');
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Last + 1;
		}
		else {
			return 1;
		}
	}
	
	function updateAuto($last) {
		$data = array(
			'Last' => $last
		);
		
		$this->db->update('auto', $data);
	}
	
	function getID (
		$shipmentNo
	) {
		$this -> db -> select('ID');
		$this -> db -> from('shipment');
		$this -> db -> where('Shipment_No', $shipmentNo);
		$this -> db -> limit(1);
		
		// if ($this->session->userdata('level') == 2) {
			// $this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		// }

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
	
	function getCollie (
		$shipmentNo
	) {
		$this -> db -> select('Collie');
		$this -> db -> from('shipment');
		$this -> db -> where('Shipment_No', $shipmentNo);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->Collie;
		}
		else {
			return 0;
		}
	}
	
	function getRow (
		$shipmentNo
	) {
		$this -> db -> select('*');
		$this -> db -> from('shipment');
		$this -> db -> where('Shipment_No', $shipmentNo);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0];
		}
		else {
			return 0;
		}
	}
	
	function getMobileData (
		$shipmentNo
	) {
		$this -> db -> select('Shipment_No as Shipment');
		$this -> db -> select('Dari_Kota as `From`');
		$this -> db -> select('Untuk_Kota as `To`');
		$this -> db -> select('Dari_Kontak as PIC');
		$this -> db -> select('Collie as Package');
		$this -> db -> from('shipment');
		$this -> db -> where('Shipment_No', $shipmentNo);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0];
		}
		else {
			return (object)array();
		}
	}
	
	function getOriginDestination (
		$id
	) {
		$this -> db -> select('Dari as origin, Dari_Perusahaan as o_company, Dari_Alamat as o_address, Dari_Kota as o_city, Dari_Provinsi as o_province, Dari_Negara as o_country, Dari_ZIP as o_zip, Dari_Kontak as o_contact, Dari_Telpon as o_phone, Dari_Email as o_email, Untuk as destination, Untuk_Perusahaan as d_company, Untuk_Alamat as d_address, Untuk_Kota as d_city, Untuk_Provinsi as d_province, Untuk_Negara as d_country, Untuk_ZIP as d_zip, Untuk_Kontak as d_contact, Untuk_Telpon as d_phone, Untuk_Email as d_email');
		$this -> db -> from('shipment');
		$this -> db -> where('id', $id);
		$this -> db -> limit(1);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		return $query->result()[0];
	}
	
	function countShipmentDateStatus (
		$date1,
		$date2,
		$status
	) {
		$this -> db -> select('ID');
		$this -> db -> from('view_shipment');
		$this -> db -> where('tanggal >=', $date1);
		$this -> db -> where('tanggal <=', $date2);
		$this -> db -> where('status', $status);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		return $query -> num_rows();
	}
	
	function getShipmentDateStatus (
		$date1,
		$date2,
		$status
	) {
		$this -> db -> select('shipment, description, status, origin, now_at, destination, collie, weight');
		$this -> db -> from('view_shipment');
		$this -> db -> where('Tanggal >=', $date1);
		$this -> db -> where('Tanggal <=', $date2);
		$this -> db -> where('Status', $status);
		
		if ($this->session->userdata('level') == 2) {
			$this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		}

		$query = $this -> db -> get();

		return $query->result();
	}
	
	function update_status (
		$shipment,
		$location,
		$status
	) {
		$data = array(
			'Lokasi' => $location,
			'Status' => $status,
			'Modified_By' => $this->session->userdata('username'),
			'Modified_Date' => date("Y-m-d H:i:s")
		);
		
		$this->db->where('Shipment_No', $shipment);
		
		// if ($this->session->userdata('level') == 2) {
			// $this->db->where('keyCustomer', $this->session->userdata('key_customer'));
		// }
		$this->db->update('shipment', $data);
	}
}