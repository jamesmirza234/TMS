<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Autocomplete extends CI_Controller {
	public function index() {
	}

	public function customer() {
		$this->load->model('customer');
		
		$term = $this->input->post('term');
		
		echo json_encode($this->customer->autocomplete($term));
	}

	public function contact() {
		$this->load->model('contact');
		
		$term = $this->input->post('term');
		
		echo json_encode($this->contact->autocomplete($term));
	}

	public function services() {
		$this->load->model('services');
		
		$term = $this->input->post('term');
		
		echo json_encode($this->services->autocomplete($term));
	}

	public function items() {
		$this->load->model('items');
		
		$term = $this->input->post('term');
		
		echo json_encode($this->items->autocomplete($term));
	}
}
