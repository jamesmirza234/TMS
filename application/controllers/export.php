<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Export extends CI_Controller {
	public function index() {
	}
	
	public function shipment_excel () {
		$this->load->library('datatables');
		$this->load->library('general');
		
		$this->load->model('user', '', TRUE);
		
		$this->output->set_content_type('text/xml');
		$this->output->set_header("content-disposition: attachement; filename=Shipment.xml");
		
		$primaryKey = 'ID';
		$table = 'view_shipment';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'customer', 'dt' => 'customer' ),
			array( 'db' => 'shipment', 'dt' => 'shipment' ),
			array( 'db' => 'description', 'dt' => 'description' ),
			array( 'db' => 'status', 'dt' => 'status' ),
			array( 'db' => 'origin', 'dt' => 'origin' ),
			array( 'db' => 'now_at', 'dt' => 'now_at' ),
			array( 'db' => 'destination', 'dt' => 'destination' ),
			array( 'db' => 'collie', 'dt' => 'collie' ),
			array( 'db' => 'weight', 'dt' => 'weight' )
		);
		
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);
		
		$search = json_decode($this->input->post('search'));
		$search = $this->general->object_to_array($search);
		$search['length'] = 100;
		
		if ($this->session->userdata('level') == 1) {
			$search['where'] = "`keyCustomer` IN (". $this->user->getAllCustomer().")";
		}
		
		if ($this->session->userdata('level') == 2) {
			$search['where'] = "`keyCustomer` = ".$this->session->userdata('key_customer');
		}
		
		$data = $this->general->object_to_array($this->datatables->simple( $search, $sql_details, $table, $primaryKey, $columns ));
		
		$this->load->view('shipment_excel', $data);
		
		// echo json_encode($data);
	}
	
	public function shipment_label () {
		$this->load->model('shipment', '', TRUE);
		$this->load->model('user', '', TRUE);
		
		$shipment = $this->input->post('search');
		
		$data['shipment'] = $shipment;
		$data['collie'] = $this->shipment->getCollie($shipment);
		
		$company = $this->user->getCompany($shipment);
		
		$data['perusahaan'] = '';
		$data['alamat'] = '';
		$data['kota'] = '';
		$data['zip'] = '';
		$data['negara'] = '';
		
		if (is_object($company)) {
			$data['perusahaan'] = $company->Nama;
			$data['alamat'] = $company->Alamat;
			$data['kota'] = $company->Kota;
			$data['zip'] = $company->ZIP;
			$data['negara'] = $company->Negara;
		}
		
		
		$this->load->view('shipment_label', $data);
	}
	
	public function shipment_awb () {
		$this->load->model('user', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('company', '', TRUE);
		
		$shipment = $this->input->post('search');
		
		$row = $this->shipment->getRow($shipment);
		
		$keyCompany = $this->user->getKeyCompany($row->keyCustomer);
		$rowCompany = $this->company->getRow($keyCompany);
		
		$data['shipment'] = $shipment;
		$data['status'] = $row->Status;
		
		$data['perusahaan_pelanggan'] = $rowCompany->Nama;
		$data['alamat_pelanggan'] = $rowCompany->Alamat;
		$data['kota_pelanggan'] = $rowCompany->Kota;
		$data['zip_pelanggan'] = $rowCompany->ZIP;
		$data['negara_pelanggan'] = $rowCompany->Negara;
		$data['telpon_pelanggan'] = $rowCompany->Telpon;
		$data['email_pelanggan'] = $rowCompany->Email;
		
		$data['dari_perusahaan'] = $row->Dari_Perusahaan;
		$data['dari_kontak'] = $row->Dari_Kontak;
		$data['dari_kota'] = $row->Dari_Kota;
		$data['dari_alamat1'] = $row->Dari_Alamat;
		$data['dari_alamat2'] = "";
		$data['dari_telpon'] = $row->Dari_Telpon;
		
		$data['untuk_perusahaan'] = $row->Untuk_Perusahaan;
		$data['untuk_kontak'] = $row->Untuk_Kontak;
		$data['untuk_kota'] = $row->Untuk_Kota;
		$data['untuk_alamat1'] = $row->Untuk_Alamat;
		$data['untuk_alamat2'] = "";
		$data['untuk_telpon'] = $row->Untuk_Telpon;
		
		$data['keterangan'] = $row->Keterangan;
		$data['catatan'] = $row->Catatan;
		
		$data['collie'] = $row->Collie;
		$data['berat'] = $row->AW;
		$data['cw'] = $row->CW;
		
		$this->load->view('shipment_awb', $data);
	}
	
	public function shipment_pod () {
		$this->load->model('user', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('company', '', TRUE);
		
		$shipment = $this->input->post('search');
		
		$row = $this->shipment->getRow($shipment);
		
		$keyCompany = $this->user->getKeyCompany($row->keyCustomer);
		$rowCompany = $this->company->getRow($keyCompany);
		
		$data['shipment'] = $shipment;
		$data['status'] = $row->Status;
		
		$data['perusahaan_pelanggan'] = $rowCompany->Nama;
		$data['alamat_pelanggan'] = $rowCompany->Alamat;
		$data['kota_pelanggan'] = $rowCompany->Kota;
		$data['zip_pelanggan'] = $rowCompany->ZIP;
		$data['negara_pelanggan'] = $rowCompany->Negara;
		$data['telpon_pelanggan'] = $rowCompany->Telpon;
		$data['email_pelanggan'] = $rowCompany->Email;
		
		$data['dari_perusahaan'] = $row->Dari_Perusahaan;
		$data['dari_kontak'] = $row->Dari_Kontak;
		$data['dari_kota'] = $row->Dari_Kota;
		$data['dari_alamat1'] = $row->Dari_Alamat;
		$data['dari_alamat2'] = "";
		$data['dari_telpon'] = $row->Dari_Telpon;
		
		$data['untuk_perusahaan'] = $row->Untuk_Perusahaan;
		$data['untuk_kontak'] = $row->Untuk_Kontak;
		$data['untuk_kota'] = $row->Untuk_Kota;
		$data['untuk_alamat1'] = $row->Untuk_Alamat;
		$data['untuk_alamat2'] = "";
		$data['untuk_telpon'] = $row->Untuk_Telpon;
		
		$data['keterangan'] = $row->Keterangan;
		$data['catatan'] = $row->Catatan;
		
		$data['collie'] = $row->Collie;
		$data['berat'] = $row->AW;
		$data['cw'] = $row->CW;
		
		$data['rec_name'] = '';
		$data['rec_date'] = '';
		$data['lokasi'] = '';
		$data['latitude'] = '';
		$data['longitude'] = '';
		
		$this->load->view('shipment_pod', $data);
	}
}
