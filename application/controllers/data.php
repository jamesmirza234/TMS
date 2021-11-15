<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Data extends CI_Controller {
	private $sql_details = array();
	
    function __construct()
    {
        parent::__construct();

		$this->load->library('datatables');
		
		$this->load->model('user', '', TRUE);
		
		$this->sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);
    }
	
	public function index() {
	}
	
	public function view_shipment() {
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
		
		$params = $_POST;
		
		if ($this->session->userdata('level') == 1) {
			$params['where'] = "`keyCustomer` IN (". $this->user->getAllCustomer().")";
		}
		
		if ($this->session->userdata('level') == 2) {
			$params['where'] = "`keyCustomer` = ".$this->session->userdata('key_customer');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function shipment_detail() {
		$this->load->model('shipment', '', TRUE);

		echo json_encode($this->shipment->getOriginDestination($this->input->post('id')));
	}
	
	public function shipment_parcel() {
		$this->load->model('parcel', '', TRUE);

		echo json_encode($this->parcel->getParcel($this->input->post('id')));
	}
	
	public function dashboard_header() {
		$this->load->model('shipment', '', TRUE);
		
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		
		$data["sent"] = $this->shipment->countShipmentDateStatus($start, $end, 'Sent');
		$data["intransit"] = $this->shipment->countShipmentDateStatus($start, $end, 'In Transit');
		$data["delivered"] = $this->shipment->countShipmentDateStatus($start, $end, 'Delivered');

		echo json_encode($data);
	}
	
	public function dashboard_detail() {
		$this->load->model('shipment', '', TRUE);
		
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$status = $this->input->post('status');
		
		echo json_encode($this->shipment->getShipmentDateStatus($start, $end, $status));
	}
	
	public function user_customer() {
		$this->load->model('user', '', TRUE);
		
		$id = $this->input->post('id');
		
		echo json_encode($this->user->getUserCustomer($id));
	}
	
	public function customer() {
		$primaryKey = 'id';
		$table = 'customer';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' ),
			array( 'db' => 'Alamat', 'dt' => 'address' ),
			array( 'db' => 'Kota', 'dt' => 'city' ),
			array( 'db' => 'Provinsi', 'dt' => 'province' ),
			array( 'db' => 'Negara', 'dt' => 'country' ),
			array( 'db' => 'ZIP', 'dt' => 'zip' ),
			array( 'db' => 'Kontak', 'dt' => 'contact' ),
			array( 'db' => 'Telpon', 'dt' => 'phone' ),
			array( 'db' => 'Email', 'dt' => 'email' )
		);
		
		$params = $_POST;
		
		if ($this->session->userdata('level') == 1) {
			$params['where'] = "`ID` IN (". $this->user->getAllCustomer().")";
		}
		
		if ($this->session->userdata('level') == 2) {
			$params['where'] = "`ID` = ".$this->session->userdata('key_customer');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function services() {
		$primaryKey = 'id';
		$table = 'service';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' )
		);
		
		$params = $_POST;

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function status() {
		$primaryKey = 'id';
		$table = 'status';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' )
		);
		
		$params = $_POST;

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function contact() {
		$primaryKey = 'id';
		$table = 'contact';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' ),
			array( 'db' => 'Perusahaan', 'dt' => 'company' ),
			array( 'db' => 'Alamat', 'dt' => 'address' ),
			array( 'db' => 'Kota', 'dt' => 'city' ),
			array( 'db' => 'Provinsi', 'dt' => 'province' ),
			array( 'db' => 'Negara', 'dt' => 'country' ),
			array( 'db' => 'ZIP', 'dt' => 'zip' ),
			array( 'db' => 'Kontak', 'dt' => 'contact' ),
			array( 'db' => 'Telpon', 'dt' => 'phone' ),
			array( 'db' => 'Email', 'dt' => 'email' )
		);
		
		$params = $_POST;
		
		if ($this->session->userdata('level') == 1) {
			$params['where'] = "`keyCustomer` IN (". $this->user->getAllCustomer().")";
		}
		
		if ($this->session->userdata('level') == 2) {
			$params['where'] = "`keyCustomer` = ".$this->session->userdata('key_customer');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function items() {
		$primaryKey = 'id';
		$table = 'barang';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' ),
			array( 'db' => 'Panjang', 'dt' => 'length' ),
			array( 'db' => 'Lebar', 'dt' => 'width' ),
			array( 'db' => 'Tinggi', 'dt' => 'height' ),
			array( 'db' => 'Berat', 'dt' => 'weight' )
		);
		
		$params = $_POST;
		
		if ($this->session->userdata('level') == 1) {
			$params['where'] = "`keyCustomer` IN (". $this->user->getAllCustomer().")";
		}
		
		if ($this->session->userdata('level') == 2) {
			$params['where'] = "`keyCustomer` = ".$this->session->userdata('key_customer');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function company() {
		$primaryKey = 'id';
		$table = 'company';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Nama', 'dt' => 'name' ),
			array( 'db' => 'Alamat', 'dt' => 'address' ),
			array( 'db' => 'Kota', 'dt' => 'city' ),
			array( 'db' => 'Provinsi', 'dt' => 'province' ),
			array( 'db' => 'Negara', 'dt' => 'country' ),
			array( 'db' => 'ZIP', 'dt' => 'zip' ),
			array( 'db' => 'Kontak', 'dt' => 'contact' ),
			array( 'db' => 'Telpon', 'dt' => 'phone' ),
			array( 'db' => 'Email', 'dt' => 'email' )
		);
		
		$params = $_POST;
		
		if ($this->session->userdata('level') > 0) {
			$params['where'] = "`ID` = ".$this->session->userdata('key_company');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function mobile_user() {
		$primaryKey = 'id';
		$table = 'users';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Username', 'dt' => 'username' ),
			array( 'db' => 'Active', 'dt' => 'active' ),
			array( 'db' => 'Nama', 'dt' => 'name' ),
			array( 'db' => 'IMEI', 'dt' => 'imei' ),
			array( 'db' => 'HP', 'dt' => 'hp' ),
			array( 'db' => 'Key', 'dt' => 'key' ),
			array( 'db' => 'Latitude', 'dt' => 'lat' ),
			array( 'db' => 'Longitude', 'dt' => 'lon' ),
			array( 'db' => 'Accuracy', 'dt' => 'acc' ),
			array( 'db' => 'Mobile_Level', 'dt' => 'level' ),
			array( 'db' => 'Mobile_Team', 'dt' => 'connect' )
		);
		
		$params = $_POST;
		
		if ($this->session->userdata('level') == 1) {
			$params['where'] = "`keyCompany` = ".$this->session->userdata('key_company')." AND `keyCustomer` = ".$this->session->userdata('key_customer');
		}
		
		if ($this->session->userdata('level') == 2) {
			$params['where'] = "`keyCustomer` = ".$this->session->userdata('key_customer');
		}

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function feedback() {
		$primaryKey = 'id';
		$table = 'feedback';
		$columns = array(
			array( 'db' => 'ID', 'dt' => 'id' ),
			array( 'db' => 'Pertanyaan', 'dt' => 'question' ),
			array( 'db' => 'Jawaban', 'dt' => 'answer' )
		);
		
		$params = $_POST;

		echo json_encode(
			$this->datatables->simple( $params, $this->sql_details, $table, $primaryKey, $columns )
		);
	}
}
