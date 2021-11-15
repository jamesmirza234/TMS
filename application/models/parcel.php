<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Parcel extends CI_Model {
	function insert(
		$shipment,
		$parcel,
		$name,
		$length,
		$width,
		$height,
		$weight
	) {
		$data = array(
			'Shipment' => $shipment,
			'Paket_No' => $parcel,
			'Nama' => $name,
			'Panjang' => $length,
			'Lebar' => $width,
			'Tinggi' => $height,
			'Berat' => $weight
		);
		
		$this->db->insert('parcel', $data); 
	}
	
	function update(
		$id,
		$name
	) {
		$data = array(
			'Nama' => $name
		);
		
		$this->db->where('ID', $id);
		$this->db->update('parcel', $data);
	}
	
	function updateContainer(
		$id,
		$container
	) {
		$data = array(
			'Container' => $container
		);
		
		$this->db->where('ID', $id);
		$this->db->update('parcel', $data);
	}
	
	function updateContainerByShipment(
		$shipment,
		$container
	) {
		$data = array(
			'Container' => $container
		);
		
		$this->db->where('Shipment', $shipment);
		$this->db->update('parcel', $data);
	}
	
	function updateContainerByContainer(
		$container,
		$containerOld
	) {
		$data = array(
			'Container' => $container
		);
		
		$this->db->where('Container', $containerOld);
		$this->db->update('parcel', $data);
	}
	
	function removeContainerByShipment(
		$shipment
	) {
		$data = array(
			'Container' => null
		);
		
		$this->db->where('Shipment', $shipment);
		$this->db->update('parcel', $data);
	}
	
	function getParcel (
		$shipmentID
	) {
		$this -> db -> select('Paket_No as no, Nama as name');
		$this -> db -> from('parcel');
		$this -> db -> where('Shipment', $shipmentID);

		$query = $this -> db -> get();

		return $query->result();
	}
	
	function getIDByLabel (
		$label
	) {
		$this -> db -> select('a.ID');
		$this -> db -> from('parcel a');
		$this -> db -> join('shipment b', 'a.Shipment = b.ID');
		$this -> db -> where('concat(b.Shipment_No, a.Paket_No) = ', $label);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result()[0]->ID;
		}
		else {
			return 0;
		}
	}
	
	function countParcelByTransportGroupContainer (
		$transport
	) {
		$this -> db -> select('count(a.ID) as Collie');
		$this -> db -> select('b.Nama as Name');
		$this -> db -> from('parcel a');
		$this -> db -> join('container b', 'a.Container = b.ID');
		$this -> db -> where('b.Transport', $transport);
		$this->db->group_by('b.Nama');

		$query = $this -> db -> get();

		return $query->result();
	}
	
	function countParcelByTransport (
		$transport
	) {
		$this -> db -> select('count(a.ID) as collie');
		$this -> db -> from('parcel a');
		$this -> db -> join('container b', 'a.Container = b.ID');
		$this -> db -> where('b.Transport', $transport);

		$query = $this -> db -> get();

		return $query->result()[0]->collie;
	}
	
	function listParcelByContainer (
		$container
	) {
		$this -> db -> select('concat(b.Shipment_No, a.Paket_No) as label', FALSE);
		$this -> db -> select('a.Nama as description');
		$this -> db -> select('a.Berat as weight');
		$this -> db -> select('a.Panjang * a.Lebar * a.Tinggi as volume');
		$this -> db -> from('parcel a');
		$this -> db -> join('shipment b', 'a.Shipment = b.ID');
		$this -> db -> where('a.Container', $container);

		$query = $this -> db -> get();

		return $query->result();
	}
	
	function listParcel (
		$parcel
	) {
		$this -> db -> select('c.Nama as service');
		$this -> db -> select('a.Berat as weight');
		$this -> db -> select('a.Panjang * a.Lebar * a.Tinggi as volume');
		$this -> db -> select('f.Nama as transporter');
		$this -> db -> select('d.Nama as status');
		$this -> db -> select('b.Dari_Kota as origin');
		$this -> db -> select('b.Untuk_Kota as destination');
		$this -> db -> from('parcel a');
		$this -> db -> join('shipment b', 'a.Shipment = b.ID');
		$this -> db -> join('service c', 'b.Service = c.ID', 'left');
		$this -> db -> join('status d', 'b.Status = d.ID', 'left');
		$this -> db -> join('container e', 'a.Container = e.ID', 'left');
		$this -> db -> join('transport f', 'e.Transport = f.ID', 'left');
		$this -> db -> where('concat(b.Shipment_No, a.Paket_No) = ', $parcel);

		$query = $this -> db -> get();

		return $query->result();
	}
}