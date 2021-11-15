<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Save extends CI_Controller {
	public function index() {
	}
	
	public function create_shipement() {
		$this->load->model('customer', '', TRUE);
		$this->load->model('contact', '', TRUE);
		$this->load->model('services', '', TRUE);
		$this->load->model('items', '', TRUE);
		$this->load->model('status', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->load->library('general');
		
		$message = "";
		
		$pickup = $this->input->post('pickup');
		$customer = $this->input->post('customer');
		$description = $this->input->post('description');
		$origin = json_decode($this->input->post('origin'), TRUE);
		$destination = json_decode($this->input->post('destination'), TRUE);
		$service = $this->input->post('service');
		$items = json_decode($this->input->post('items'), TRUE);
		$note = $this->input->post('note');
		
		$customerID = $this->customer->getID($customer);
		
		$originID = $this->contact->getID($origin["name"]);
		
		if ($originID == 0) {
			$this->contact->insert(
				$customerID,
				$origin["name"],
				$origin["company"],
				$origin["address"],
				$origin["city"],
				$origin["province"],
				$origin["country"],
				$origin["zip"],
				$origin["contact"],
				$origin["phone"],
				$origin["email"]
			);
		}
		else {
			$this->contact->update(
				$originID,
				$origin["name"],
				$origin["company"],
				$origin["address"],
				$origin["city"],
				$origin["province"],
				$origin["country"],
				$origin["zip"],
				$origin["contact"],
				$origin["phone"],
				$origin["email"]
			);
		}
		
		$destinationID = $this->contact->getID($destination["name"]);
		
		if ($destinationID == 0) {
			$this->contact->insert(
				$customerID,
				$destination["name"],
				$destination["company"],
				$destination["address"],
				$destination["city"],
				$destination["province"],
				$destination["country"],
				$destination["zip"],
				$destination["contact"],
				$destination["phone"],
				$destination["email"]
			);
		}
		else {
			$this->contact->update(
				$destinationID,
				$destination["name"],
				$destination["company"],
				$destination["address"],
				$destination["city"],
				$destination["province"],
				$destination["country"],
				$destination["zip"],
				$destination["contact"],
				$destination["phone"],
				$destination["email"]
			);
		}
		
		$serviceID = $this->services->getID($service);
		
		$collie = 0;
		$taw = 0;
		$tvw = 0;
		$tcw = 0;
		$tv = 0;
		
		for ($i=0; $i<sizeof($items); $i++) {
			$itemID = $this->items->getID($items[$i]["name"]);
			
			if ($itemID == 0) {
				$this->items->insert(
					$customerID,
					$items[$i]["name"],
					$items[$i]["l"],
					$items[$i]["w"],
					$items[$i]["h"],
					$items[$i]["aw"]
				);
			}
			else {
				$this->items->update(
					$itemID,
					$items[$i]["name"],
					$items[$i]["l"],
					$items[$i]["w"],
					$items[$i]["h"],
					$items[$i]["aw"]
				);
			}
			
			$aw = $items[$i]["aw"];
			$vw = ceil(($items[$i]["l"] * $items[$i]["w"] * $items[$i]["h"]) / 6000);
			$cw = $aw > $vw ? $aw : $vw;
			$v = $items[$i]["l"] * $items[$i]["w"] * $items[$i]["h"];
		
			$collie++;
			
			$taw += $aw;
			$tvw += $vw;
			$tcw += $cw;
			$tv += $v;
		}
		
		$statusID = $this->status->getID('Draft');
		
		$keyGenerator = $this->shipment->keyGenerator();
		
		$shipmentNo = "JO" . date("y") . $this->general->alMonth(date("m")) . date("d") . $this->general->addChar($keyGenerator % 10000, "0", 4);
		
		$this->shipment->insert(
			$shipmentNo,
			$pickup,
			$customerID,
			$statusID,
			$description,
			$note,
			$origin["name"],
			$origin["company"],
			$origin["address"],
			$origin["city"],
			$origin["province"],
			$origin["country"],
			$origin["zip"],
			$origin["contact"],
			$origin["phone"],
			$origin["email"],
			$destination["name"],
			$destination["company"],
			$destination["address"],
			$destination["city"],
			$destination["province"],
			$destination["country"],
			$destination["zip"],
			$destination["contact"],
			$destination["phone"],
			$destination["email"],
			$serviceID,
			$collie,
			$taw,
			$tvw,
			$tcw,
			$tv
		);
		
		$this->shipment->updateAuto($keyGenerator);
		
		$shipmentID = $this->shipment->getID($shipmentNo);
		
		for ($i=0; $i<sizeof($items); $i++) {
			$this->parcel->insert(
				$shipmentID,
				$this->general->addChar($i + 1, "0", 5),
				$items[$i]["name"],
				$items[$i]["l"],
				$items[$i]["w"],
				$items[$i]["h"],
				$items[$i]["aw"]
			);
		}
		
		echo $shipmentNo;
	}
	
	public function customer() {
		$this->load->model('customer', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$province = $this->input->post('province');
		$country = $this->input->post('country');
		$zip = $this->input->post('zip');
		$contact = $this->input->post('contact');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
			
		if ($id == '') {
			$this->customer->insert(
				$name,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Insert success";
		}
		else {
			$this->customer->update(
				$id,
				$name,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function services() {
		$this->load->model('services', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
			
		if ($id == '') {
			$this->services->insert(
				$name
			);

			$message = "Insert success";
		}
		else {
			$this->services->update(
				$id,
				$name
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function status() {
		$this->load->model('status', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
			
		if ($id == '') {
			$this->status->insert(
				$name
			);
			
			$message = "Insert success";
		}
		else {
			$this->status->update(
				$id,
				$name
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function contact() {
		$this->load->model('contact', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$company = $this->input->post('company');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$province = $this->input->post('province');
		$country = $this->input->post('country');
		$zip = $this->input->post('zip');
		$contact = $this->input->post('contact');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
			
		if ($id == '') {
			$this->contact->insert(
				$this->session->userdata('key_customer'),
				$name,
				$company,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Insert success";
		}
		else {
			$this->contact->update(
				$id,
				$name,
				$company,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function items() {
		$this->load->model('items', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$length = $this->input->post('length');
		$width = $this->input->post('width');
		$height = $this->input->post('height');
		$weight = $this->input->post('weight');
			
		if ($id == '') {
			$this->items->insert(
				$this->session->userdata('key_customer'),
				$name,
				$length,
				$width,
				$height,
				$weight
			);
			
			$message = "Insert success";
		}
		else {
			$this->items->update(
				$id,
				$name,
				$length,
				$width,
				$height,
				$weight
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function company() {
		$this->load->model('company', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$province = $this->input->post('province');
		$country = $this->input->post('country');
		$zip = $this->input->post('zip');
		$contact = $this->input->post('contact');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
			
		if ($id == '') {
			$this->company->insert(
				$name,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Insert success";
		}
		else {
			$this->company->update(
				$id,
				$name,
				$address,
				$city,
				$province,
				$country,
				$zip,
				$contact,
				$phone,
				$email
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function generate_key() {
		$this->load->library('general');
		
		$this->load->model('user', '', TRUE);
		
		$id = $this->input->post('id');
		
		$key = $this->general->randomNumber();
		
		while ($this->user->unique_key(
			$key
		)) {
			$key = $this->general->randomNumber();
		}
		
		$this->user->update_key(
			$id,
			$key
		);
		
		echo $key;
	}
	
	public function mobile_user() {
		$this->load->model('user', '', TRUE);
		
		$message = "Update success";
		
		$id = $this->input->post('id');
		$level = $this->input->post('level');
		$connect = $this->input->post('connect');
		
		$this->user->update_mobile(
			$id,
			$level,
			$connect
		);
		
		echo $message;
	}
	
	public function feedback() {
		$this->load->model('feedback', '', TRUE);
		
		$message = "";
		
		$id = $this->input->post('id');
		$question = $this->input->post('question');
		$answer = $this->input->post('answer');
			
		if ($id == '') {
			$this->feedback->insert(
				$question,
				$answer
			);
			
			$message = "Insert success";
		}
		else {
			$this->feedback->update(
				$id,
				$question,
				$answer
			);
			
			$message = "Update success";
		}
		
		echo $message;
	}
	
	public function view_shipment() {
		$this->load->model('status', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		
		$message = "";
		
		$shipment = $this->input->post('shipment');
		$location = $this->input->post('location');
		$status = $this->input->post('status');
		
		$statusID = $this->status->getID($status);
		
		$this->shipment->update_status(
			$shipment,
			$location,
			$statusID
		);
		
		$message = "Update success";
		
		echo $message;
	}
	
	public function change_password() {
		$this->load->library('form_validation');
		
		$this->load->model('user', '', TRUE);
		
		$message = "";
		
		$this->form_validation->set_rules('password0', 'password0', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password1', 'password1', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password2', 'password2', 'trim|required|xss_clean');
		
		if($this->form_validation->run()) {
			$password0 = $this->input->post('password0');
			$password1 = $this->input->post('password1');
			$password2 = $this->input->post('password2');
			
			if ($password1 == $password2) {
				if ($this->user->getPassword($this->session->userdata('username')) == $password0) {
					$this->user->updatePassword($this->session->userdata('username'), $password1);
					
					$message = "Update success";
				}
				else {
					$message = "Wrong password";
				}
			}
			else {
				$message = "Password1 dan password2 tidak sama!";
			}
		}
		else {
			$message = "Invalid input";
		}
		
		echo $message;
	}
	
	public function user_new() {
		$this->load->model('user', '', TRUE);
		
		$message = "";
		
		$customer = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->user->user_new(
			$customer,
			$username,
			$password
		);
		
		$message = "User Created";
		
		echo $message;
	}
}
