<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Delete extends CI_Controller {
	public function index() {
	}
	
	public function customer() {
		$this->load->model('customer', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->customer->delete($id);
		
		echo $message;
	}
	
	public function services() {
		$this->load->model('services', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->services->delete($id);
		
		echo $message;
	}
	
	public function status() {
		$this->load->model('status', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->status->delete($id);
		
		echo $message;
	}
	
	public function contact() {
		$this->load->model('contact', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->contact->delete($id);
		
		echo $message;
	}
	
	public function items() {
		$this->load->model('items', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->items->delete($id);
		
		echo $message;
	}
	
	public function company() {
		$this->load->model('company', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->company->delete($id);
		
		echo $message;
	}
	
	public function feedback() {
		$this->load->model('feedback', '', TRUE);
		
		$message = "Delete success";
		
		$id = $this->input->post('id');
		
		$this->feedback->delete($id);
		
		echo $message;
	}
}
