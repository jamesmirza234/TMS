<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Login extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }

	public function index() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_login');

		$this->load->view('header');
		
		if($this->form_validation->run() == FALSE && $this->session->userdata('id') == '') {
			$this->load->view('login');
		}
		else {
			$this->load->view('menu');
		}
		
		$this->load->view('first');
		$this->load->view('footer');
	}
	
	public function check_login() {
		$this->load->model('user', '', TRUE);
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->user->login($username, $password);

		if($result) {
			$user_info = array();
			
			foreach($result as $row) {
				$user_info = array(
					'id' => $row->ID,
					'username' => $username,
					'logged_in' => TRUE,
					'level' => $row->Level,
					'key_customer' => $row->keyCustomer,
					'key_company' => $row->keyCompany
				);
				
				$this->session->set_userdata($user_info);
			}
			
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_login', 'Invalid username or password');
			
			return FALSE;
		}
	}
}
