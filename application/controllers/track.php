<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Track extends CI_Controller {
	private $pair_time;
	private $unpair_time;
	
    function __construct()
    {
        parent::__construct();
		
		$this->load->library('form_validation');
		
		$this->load->model('user', '', TRUE);
		$this->load->model('mobile_log', '', TRUE);
		
		$this->mobile_log->insert(json_encode($_POST));
				
		$this->output->set_content_type('text/json');
		
		$this->pair_time=300;
		$this->unpair_time=100;
    }
	
	public function index() {
	}
	
	public function register() {
		$this->load->library('general');
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon');
			$name = $this->input->post('name');
			
			$SMS_key = $this->general->randomNumber();
			$SMS_exp = date("Y-m-d H:i:s", strtotime("+5 minutes"));
			
			if ($this->user->getMobileID($imei, $hp) == 0) {
				$this->user->insertMobileTrack (
					$name,
					$imei,
					$hp,
					$SMS_key,
					$SMS_exp,
					$lat,
					$lon,
					0
				);
			}
			else {
				$this->user->updateMobileTrack1 (
					$name,
					$imei,
					$hp,
					$SMS_key,
					$SMS_exp,
					$lat,
					$lon,
					0
				);
			}
			
			$this->general->sendSMS($hp, 'tracking code ' . $SMS_key);
				
			$response = true;
		}
		
		$data = array('response'=> $response);
		
		echo json_encode($data);
	}
	
	public function key() {
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$key = $this->input->post('key');
			
			if ($this->user->checkSMSKey($imei, $hp, $key)) {
				$this->user->updateMobileTrack3($imei, $hp, 1);
				
				$response = true;
			}
		}
		
		$data = array('response'=> $response);
		
		echo json_encode($data);
	}
	
	public function pairing() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$data;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$transport = $this->input->post('ref_no');
			
			$userID = $this->user->getMobileID($imei, $hp);
			
			if ($userID == 0) {
				$data = array('response'=> false, 'message'=> 'register');
			}
			else {
				$transportID = $this->transport->getID($transport);
				
				if ($transportID == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else if ($this->parcel->countParcelByTransport($transportID) == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else if ($this->transport->getType($transport) == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else {
					$this->transport->updateLastPair($transportID, $userID);
					
					$data = array('response'=> true, 'message'=> 'pair', 'pair_time'=> $this->pair_time, 'unpair_time'=>  $this->unpair_time);
				}
			}
		}
		
		echo json_encode($data);
	}
	
	public function submit() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		$this->load->model('track_md', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$data;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$transport = $this->input->post('ref_no');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon');
			$date_time = date("Y-m-d H:i:s", strtotime(substr($this->input->post('date_time'), 4, 29)));
			
			$userID = $this->user->getMobileID($imei, $hp);
			
			if ($userID == 0) {
				$data = array('response'=> false, 'message'=> 'register');
			}
			else {
				$transportID = $this->transport->getID($transport);
				
				if ($transportID == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else if ($this->transport->getType($transport) == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else {
					$this->track_md->insert($transport, $lat, $lon, $userID, $date_time);
					
					$data = array('response'=> true, 'message'=> 'pair', 'pair_time'=> $this->pair_time, 'unpair_time'=>  $this->unpair_time);
				}
			}
		}
		
		echo json_encode($data);
	}
	
	public function status() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$data;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			
			$userID = $this->user->getMobileID($imei, $hp);
			
			if ($userID == 0) {
				$data = array('response'=> false, 'message'=> 'register');
			}
			else {
				$transportID = $this->transport->getIDByLast($userID);
				
				if ($transportID == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else if ($this->parcel->countParcelByTransport($transportID) == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else if ($this->transport->getTypeByID($transportID) == 0) {
					$data = array('response'=> false, 'message'=> 'not available');
				}
				else {
					$data = array('response'=> true, 'message'=> 'pair', 'pair_time'=> $this->pair_time, 'unpair_time'=>  $this->unpair_time);
				}
			}
		}
		
		echo json_encode($data);
	}
}
