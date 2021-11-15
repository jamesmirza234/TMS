<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Web extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
	
	public function dashboard2() {
		$data['scripts'] = array('dashboard2.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('dashboard2');
		$this->load->view('footer', $data);
	}
	
	public function create_shipment() {
		$data['scripts'] = array('create-shipment.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('create-shipment');
		$this->load->view('footer', $data);
	}
	
	public function view_shipment() {
		$data['scripts'] = array('view-shipment.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('view-shipment');
		$this->load->view('modal/update-shipment');
		$this->load->view('footer', $data);
	}
	
	public function customer() {
		$data['scripts'] = array('customer.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('customer');
		$this->load->view('modal/delete');
		$this->load->view('modal/customer');
		$this->load->view('modal/user-new');
		$this->load->view('modal/user-password');
		$this->load->view('footer', $data);
	}
	
	public function services() {
		$data['scripts'] = array('services.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('services');
		$this->load->view('modal/delete');
		$this->load->view('modal/services');
		$this->load->view('footer', $data);
	}
	
	public function status2() {
		$data['scripts'] = array('status2.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('status');
		$this->load->view('modal/delete');
		$this->load->view('modal/status');
		$this->load->view('footer', $data);
	}
	
	public function contact() {
		$data['scripts'] = array('contact.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('contact');
		$this->load->view('modal/delete');
		$this->load->view('modal/contact');
		$this->load->view('footer', $data);
	}
	
	public function items() {
		$data['scripts'] = array('items.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('items');
		$this->load->view('modal/delete');
		$this->load->view('modal/items');
		$this->load->view('footer', $data);
	}
	
	public function perusahaan() {
		$data['scripts'] = array('company.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('company');
		$this->load->view('modal/delete');
		$this->load->view('modal/company');
		$this->load->view('footer', $data);
	}
	
	public function mobile_users() {
		$data['scripts'] = array('mobile-user.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('mobile-user');
		$this->load->view('modal/mobile-user');
		$this->load->view('footer', $data);
	}
	
	public function feedback() {
		$data['scripts'] = array('feedback.js');
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('feedback');
		$this->load->view('modal/delete');
		$this->load->view('modal/feedback');
		$this->load->view('footer', $data);
	}
	
	public function logout() {
		$this->session->sess_destroy();
		
		header('Location: ' . $this->config->base_url() . 'index.html');
	}
}
