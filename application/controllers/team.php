<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Team extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		
		$this->load->library('form_validation');
		
		$this->load->model('user', '', TRUE);
		$this->load->model('mobile_log', '', TRUE);
		
		$this->mobile_log->insert(json_encode($_POST));
		
		$this->output->set_content_type('text/json');
    }
	
	public function index() {
	}
	
	/* ORDER */
	public function sign_up() {
		$this->load->library('general');
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'Failed';
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon');
			$acc = $this->input->post('acc');
			$name = $this->input->post('name');
			$key = $this->input->post('key');
			
			$level = 3;
			
			$SMS_key = $this->general->randomNumber();
			$SMS_exp = date("Y-m-d H:i:s", strtotime("+5 minutes"));
			
			if ($key == '') {
				if ($this->user->getMobileID($imei, $hp) == 0) {
					$this->user->insertMobile (
						$name,
						$imei,
						$hp,
						$key,
						$SMS_key,
						$SMS_exp,
						$lat,
						$lon,
						$acc,
						0,
						$level
					);
					
					$response = true;
				}
				else if ($this->user->getMobileLevel($imei, $hp) == 3) {
					$this->user->updateMobileTeam1 (
						$name,
						$imei,
						$hp,
						$key,
						$SMS_key,
						$SMS_exp,
						$lat,
						$lon,
						$acc,
						0
					);
					
					$response = true;
				}
			}
			else {
				if ($this->user->getKeyID($key) > 0) {
					$this->user->updateMobileTeam2 (
						$name,
						$imei,
						$hp,
						$key,
						$SMS_key,
						$SMS_exp,
						$lat,
						$lon,
						$acc,
						0
					);
					
					$response = true;
				}			
			}
			
			if ($response) {
				$this->general->sendSMS($hp, 'tracking code ' . $SMS_key);
				
				$message = 'Success';
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message);
		
		echo json_encode($data);
	}
	
	public function confirmation() {
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$level = -1;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$key = $this->input->post('SMSkey');
			
			if ($this->user->checkSMSKey($imei, $hp, $key)) {
				$this->user->updateMobileTeam3($imei, $hp, 1);
				
				$response = true;
				$level = $this->user->getMobileLevel($imei, $hp);
			}
		}
		
		$data = array('response'=> $response, 'level'=> $level);
		
		echo json_encode($data);
	}
	
	public function list_customer() {
		$this->load->model('customer', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$term = $this->input->post('term');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				
				$customer = explode(",",$this->user->getAllCustomer());
				$rows = $this->customer->autocomplete2($term, $customer);
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function list_contact() {
		$this->load->model('contact', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$term = $this->input->post('term');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				
				$customer = explode(",",$this->user->getAllCustomer());
				$rows = $this->contact->autocomplete2($term, $customer);
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function list_service() {
		$this->load->model('services', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				$rows = $this->services->autocomplete2();
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function list_item() {
		$this->load->model('items', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$term = $this->input->post('term');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				
				$customer = explode(",",$this->user->getAllCustomer());
				$rows = $this->items->autocomplete2($term, $customer);
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function list_uom() {
		$this->load->model('uom', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				$rows = $this->uom->autocomplete2();
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function get_rate() {
		$this->load->model('rate', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rate = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$origin = $this->input->post('origin');
			$destination = $this->input->post('destination');
			$service = $this->input->post('service');
			$uom = $this->input->post('uom');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				$rate = $this->rate->getRate($origin,$destination,$service,$uom);
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'rate'=> $rate);
		
		echo json_encode($data);
	}
	
	public function list_add_service() {
		$this->load->model('additional', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$message = 'register';
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			
			if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$message = 'done';
				$rows = $this->additional->autocomplete2();
			}
		}
		
		$data = array('response'=> $response, 'message'=> $message, 'data'=> $rows);
		
		echo json_encode($data);
	}
	
	public function save_order() {
		$this->load->model('customer', '', TRUE);
		$this->load->model('contact', '', TRUE);
		$this->load->model('services', '', TRUE);
		$this->load->model('items', '', TRUE);
		$this->load->model('status', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->load->library('general');
		
		$info = $this->general->object_to_array(json_decode($this->input->post('info')));
		$header = $this->general->object_to_array(json_decode($this->input->post('header')));
		$origin = $this->general->object_to_array(json_decode($this->input->post('origin')));
		$destination = $this->general->object_to_array(json_decode($this->input->post('destination')));
		$order = $this->general->object_to_array(json_decode($this->input->post('order')));
		
		$response = false;
		$message = 'register';
		$shipmentNo = "";
			
		$collie = 0;
		$taw = 0;
		$tvw = 0;
		$tcw = 0;
		$tv = 0;
		
		$barang = array();
		
		if ($this->user->getMobileID($info["imei"], $info["phone"])) {
			$response = true;
			$message = 'Done';
			
			$customerID = $this->customer->getID($header["customer"]);
			
			$originID = $this->contact->getID($origin["name"]);
			
			if ($originID == 0) {
				$this->contact->insert2(
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
				$this->contact->update2(
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
				$this->contact->insert2(
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
				$this->contact->update2(
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
			
			$serviceID = $this->services->getID($order["service"]);
			
			for ($i=0; $i<sizeof($order["item"]); $i++) {
				$itemID = $this->items->getID($order["item"][$i]["name"]);
				
				if ($itemID == 0) {
					$this->items->insert(
						$customerID,
						$order["item"][$i]["name"],
						$order["item"][$i]["length"],
						$order["item"][$i]["width"],
						$order["item"][$i]["height"],
						$order["item"][$i]["weight"]
					);
				}
				else {
					$this->items->update(
						$itemID,
						$order["item"][$i]["name"],
						$order["item"][$i]["length"],
						$order["item"][$i]["width"],
						$order["item"][$i]["height"],
						$order["item"][$i]["weight"]
					);
				}
				
				$aw = $order["item"][$i]["weight"];
				$vw = ceil(($order["item"][$i]["length"] * $order["item"][$i]["width"] * $order["item"][$i]["height"]) / 6000);
				$cw = $aw > $vw ? $aw : $vw;
				$v = $order["item"][$i]["length"] * $order["item"][$i]["width"] * $order["item"][$i]["height"];
			
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
				$header["pick_up"],
				$customerID,
				$statusID,
				$header["description"],
				$order["note"],
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
			
			for ($i=0; $i<sizeof($order["item"]); $i++) {
				$this->parcel->insert(
					$shipmentID,
					$this->general->addChar($i + 1, "0", 5),
					$order["item"][$i]["name"],
					$order["item"][$i]["length"],
					$order["item"][$i]["width"],
					$order["item"][$i]["height"],
					$order["item"][$i]["weight"]
				);
				
				$paket = array(
					"ItemID" => $this->general->addChar($i + 1, "0", 5),
					"OrderID" => $shipmentID,
					"ItemName" => $order["item"][$i]["name"],
					"Length" => $order["item"][$i]["length"],
					"Width" => $order["item"][$i]["width"],
					"Height" => $order["item"][$i]["height"],
					"Weight" => $order["item"][$i]["weight"]
				);
				
				array_push($barang, $paket);
			}
		}
		
		$data = array(
			'response'=> $response,
			'message'=> $message,
			'order'=> $shipmentNo,
			'origin'=> $origin["city"],
			'destination'=> $destination["city"],
			'collie'=> sizeof($order["item"]),
			'service'=> $order["service"],
			'note'=> $order["note"],
			'chargeable'=> $tcw,
			'item'=> $barang
		);
		
		echo json_encode($data);
	}
	
	public function save_invoice() {
		$this->load->model('additional', '', TRUE);
		$this->load->model('invoice', '', TRUE);
		$this->load->model('detail_invoice', '', TRUE);
		
		$this->load->library('general');
		
		$response = false;
		$message = 'register';
		$invoice = array();
		
		$info = $this->general->object_to_array(json_decode($this->input->post('info')));
		$header = $this->general->object_to_array(json_decode($this->input->post('header')));
		$service = $this->general->object_to_array(json_decode($this->input->post('service')));
		
		if ($this->user->getMobileID($info["imei"], $info["phone"])) {
			$response = true;
			$message = 'Done';
			
			for ($i=0; $i<sizeof($service); $i++) {
				$additionalID = $this->additional->getID($service[$i]["name"]);
				
				if ($additionalID == 0) {
					$this->additional->insert(
						$service[$i]["name"],
						$service[$i]["charge"]
					);
				}
				else {
					$this->additional->update(
						$additionalID,
						$service[$i]["name"],
						$service[$i]["charge"]
					);
				}
			}
			
			// save invoice
			$invoiceID = $this->invoice->getLastID() + 1;
			
			$this->invoice->insert(
				$header["order"],
				$invoiceID,
				$header["origin"],
				$header["destination"],
				$header["collie"],
				$header["chargeable"],
				$header["service"],
				$header["uom"],
				$header["rate"],
				$header["vat"],
				$header["vat_percent"],
				$header["total"]
			);
			
			for ($i=0; $i<sizeof($service); $i++) {
				$additionalID = $this->additional->getID($service[$i]["name"]);
				
				$this->detail_invoice->insert(
					$invoiceID,
					$service[$i]["name"],
					$service[$i]["charge"]
				);
			}
			
			$invoice = array(
				"invoiceID"   => InvoiceID,
				"order"       => $header["order"],
				"origin"      => $header["origin"],
				"destination" => $header["destination"],
				"collie"      => $header["collie"],
				"chargeable"  => $header["chargeable"],
				"service"     => $header["service"],
				"uom"         => $header["uom"],
				"rate"        => $header["rate"],
				"vat"         => $header["vat"],
				"vat_percent" => vat_percent,
				"total"       => $header["vat_percent"],
				"add_service" => $service
			);
			
		}
		
		$data = array(
			'response'=> $response,
			'message'=> $message,
			'invoice'=> $invoice
		);
		
		echo json_encode($data);
	}
	
	/* LOADING */
	public function list_transport_type() {
		$this->load->model('transport_type', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$rows = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				foreach($this->transport_type->autocomplete2() as $row) {
					array_push($rows, array(
						"name" => $row->name,
						"fix" => (boolean)$row->fix ? 'true' : 'false',
						"L" => $row->L,
						"W" => $row->W,
						"H" => $row->H
					));
				}
			// }
		}
		
		$data = array('response'=> $response, 'rows'=> $rows);
		
		echo json_encode($data);
	}
	
	public function new_transport() {
		$this->load->model('transport_type', '', TRUE);
		$this->load->model('transport', '', TRUE);
		$this->load->model('container', '', TRUE);
		
		$response = true;
		
		$imei = $this->input->post('imei');
		$phone = $this->input->post('phone');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$l = $this->input->post('l');
		$w = $this->input->post('w');
		$h = $this->input->post('h');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$acc = $this->input->post('acc');
		
		$transportID = $this->transport->getID($name);
		$typeID = $this->transport_type->getID($type);
		
		if ($transportID == 0) {
			$this->transport->insert(
				$name,
				$typeID,
				$l,
				$w,
				$h,
				$lat,
				$lon,
				$acc				
			);
			
			$transportID = $this->transport->getID($name);
			$containerID = $this->container->getID($name);
			
			if ($containerID == 0) {
				$this->container->insert(
					$transportID,
					'Z'.$name,
					1,
					$l,
					$w,
					$h,
					$lat,
					$lon,
					$acc
				);
			}
		}
		
		$data = array(
			'response'=> $response,
			'transport'=> $name,
			'L'=> $l,
			'W'=> $w,
			'H'=> $h,
			'volume'=> ($l * $w * $h) / 1000000,
			'type'=> $type,
			'Fixed'=> (boolean)$this->transport_type->getFix($type),
			'Creator'=> $imei
		);
		
		echo json_encode($data);
	}
	
	public function new_basket() {
		$this->load->model('container', '', TRUE);
		
		$response = true;
		
		$imei = $this->input->post('imei');
		$phone = $this->input->post('phone');
		$name = $this->input->post('name');
		$fix = (integer)$this->input->post('fix');
		$l = $this->input->post('l');
		$w = $this->input->post('w');
		$h = $this->input->post('h');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$acc = $this->input->post('acc');
		
		$containerID = $this->container->getID($name);
		
		if ($containerID == 0) {
			$this->container->insert(
				null,
				$name,
				$fix,
				$l,
				$w,
				$h,
				$lat,
				$lon,
				$acc
			);
		}
		
		$data = array(
			'response'=> $response,
			'basket'=> $name,
			'l'=> $l,
			'w'=> $w,
			'h'=> $h,
			'volume'=> ($l * $w * $h) / 1000000,
			'Fixed'=> (boolean)$fix ? 'true' : 'false',
			'Creator'=> $imei
		);
		
		echo json_encode($data);
	}
	
	public function list_transport() {
		$this->load->model('transport_type', '', TRUE);
		$this->load->model('transport', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$fix = false;
		$container = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$transport = $this->input->post('transport');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				$typeID = $this->transport->getType($transport);
				$transportID = $this->transport->getID($transport);
				
				$fix = (boolean)$this->transport_type->getFixByID($typeID);
				
				$container = $this->parcel->countParcelByTransportGroupContainer($transportID);
			// }
		}
		
		$data = array('request'=> $response, 'fix'=> $fix, 'basket'=> $container);
		
		echo json_encode($data);
	}
	
	public function list_basket() {
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$fix = false;
		$collie = 0;
		$item = array();
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$container = $this->input->post('basket');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$containerID = $this->container->getID($container);
				$fix = (boolean)$this->container->getFix($container);
				
				$item = $this->parcel->listParcelByContainer($containerID);
				$collie = sizeof($item);
			// }
		}
		
		$data = array('response'=> $response, 'fix'=> $fix, 'collie' => $collie,'item'=> $item);
		
		echo json_encode($data);
	}
	
	public function list_laundry() {
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$service = '';
		$weight = 0;
		$volume = 0;
		$transporter = '';
		$status = '';
		$origin = '';
		$destination = '';
		$aging = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$label = $this->input->post('label');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$parcel = $this->parcel->listParcel($label);
				
				$service = $parcel[0]->service;
				$weight = $parcel[0]->weight;
				$volume = $parcel[0]->volume;
				$transporter = $parcel[0]->transporter;
				$status = $parcel[0]->status;
				$origin = $parcel[0]->origin;
				$destination = $parcel[0]->destination;
			// }
		}
		
		$data = array(
			'response'=> $response,
			'service'=> $service,
			'weight'=> $weight,
			'volume'=> $volume,
			'transporter'=> $transporter,
			'status'=> $status,
			'origin'=> $origin,
			'destination'=> $destination,
			'aging'=> $aging
		);
		
		echo json_encode($data);
	}
	
	public function status_transport() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$transport = $this->input->post('transport');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$transportID = $this->transport->getID($transport);
				
				$collie = $this->parcel->countParcelByTransport($transportID);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $transport, 'collie'=> $collie);
		
		echo json_encode($data);
	}
	
	public function status_basket() {
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$container = $this->input->post('basket');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$containerID = $this->container->getID($container);
				$fix = (boolean)$this->container->getFix($container);
				
				$item = $this->parcel->listParcelByContainer($containerID);
				$collie = sizeof($item);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $container, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_laundry_to_basket() {
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$label = $this->input->post('label');
			$container = $this->input->post('basket');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$parcelID = $this->parcel->getIDByLabel($label);
				$containerID = $this->container->getID($container);
				
				$this->parcel->updateContainer($parcelID, $containerID);
				
				$item = $this->parcel->listParcelByContainer($containerID);
				$collie = sizeof($item);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $label, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_laundry_to_transport() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$label = $this->input->post('label');
			$transport = $this->input->post('transport');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$parcelID = $this->parcel->getIDByLabel($label);
				$transportID = $this->transport->getID($transport);
				$containerID = $this->container->getID('Z' . $transport);
				
				$this->parcel->updateContainer($parcelID, $containerID);
				
				$collie = $this->parcel->countParcelByTransport($transportID);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $label, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_order_to_basket() {
		$this->load->model('container', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$shipment = $this->input->post('order');
			$container = $this->input->post('basket');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$shipmentID = $this->shipment->getID($shipment);
				$containerID = $this->container->getID($container);
				
				$this->parcel->updateContainerByShipment($shipmentID, $containerID);
				
				$item = $this->parcel->listParcelByContainer($containerID);
				$collie = sizeof($item);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $shipment, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_order_to_transport() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('container', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$shipment = $this->input->post('order');
			$transport = $this->input->post('transport');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$shipmentID = $this->shipment->getID($shipment);
				$transportID = $this->transport->getID($transport);
				$containerID = $this->container->getID('Z' . $transport);
				
				$this->parcel->updateContainerByShipment($shipmentID, $containerID);
				
				$collie = $this->parcel->countParcelByTransport($transportID);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $shipment, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_basket_to_transport() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$container = $this->input->post('basket');
			$transport = $this->input->post('transport');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$transportID = $this->transport->getID($transport);
				$containerID = $this->container->getID('Z' . $transport);
				$containerOldID = $this->container->getID($container);
				
				$containerOldFix = $this->container->getFix($container);
				
				if ((boolean)$containerOldFix) {
					$this->parcel->updateContainerByContainer($containerID, $containerOldID);
				}
				else {
					$this->container->updateTransport($containerOldID, $transportID);
				}
				
				$collie = $this->parcel->countParcelByTransport($transportID);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $container, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	public function save_transport_to_transport() {
		$this->load->model('transport', '', TRUE);
		$this->load->model('container', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->form_validation->set_rules('imei', 'imei', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
		
		$response = false;
		$collie = 0;
		
		if($this->form_validation->run()) {
			$imei = $this->input->post('imei');
			$hp = $this->input->post('phone');
			$transport1 = $this->input->post('transport1');
			$transport2 = $this->input->post('transport2');
			
			// if ($this->user->getMobileID($imei, $hp)) {
				$response = true;
				
				$transportID = $this->transport->getID($transport1);
				$containerID = $this->container->getID('Z' . $transport1);
				
				$transportOldID = $this->transport->getID($transport2);
				$containersOldID = $this->container->getContainerByTransport($transportOldID);
				
				foreach ($containersOldID as $row) {
					$containerOldFix = $this->container->getFix($row->Nama);
					
					if ((boolean)$containerOldFix) {
						$this->parcel->updateContainerByContainer($containerID, $row->ID);
					}
					else {
						$this->container->updateTransport($row->ID, $transportID);
					}
				}
				
				$collie = $this->parcel->countParcelByTransport($transportID);
			// }
		}
		
		$data = array('response'=> $response, 'last'=> $transport2, 'collie' => $collie);
		
		echo json_encode($data);
	}
	
	/* POP */
	public function shipment_mobile_pop() {
		$this->load->model('shipment', '', TRUE);
		
		$shipment = $this->input->post('shipment');
		
		$data = $this->shipment->getMobileData($shipment);
		
		echo json_encode($data);
	}
	
	public function upload_mobile_pop() {
		$this->load->model('pop', '', TRUE);
		$this->load->model('status', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		
		$this->load->library('image_lib'); 
		$this->load->library('general');
		
		$post_data = array_values($_POST);
		
		$shipment = $post_data[0];
		$imei = $post_data[1];
		$hp = $post_data[2];
		$categori = $post_data[3];
		$longitude = $post_data[4];
		$latitude = $post_data[5];
		$receiver = $post_data[6];
		$remarks = $post_data[7];
		$datetime = date("Y-m-d H:i:s", strtotime(str_replace(": ", "", $post_data[8])));
		
		$filename = $shipment . '_' . $this->pop->countShipment($shipment) . '.jpg';
		
		$pathTemp = './wp-content/capture/pop/temp/';
		$path640 = './wp-content/capture/pop/640/';
		$path320 = './wp-content/capture/pop/320/';
		$path128 = './wp-content/capture/pop/128/';
		
		$config['upload_path'] = $pathTemp;
		$config['allowed_types'] = '*';
		$config['file_name'] = $filename;
		
		$this->load->library('upload', $config);
		
		$file_key = '';
		
		foreach($_FILES as $key => $value) {
			$file_key = $key;
		}
		
		if ($this->upload->do_upload($file_key)) {
			copy ($pathTemp.$filename, $path640.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path640.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 640;
			$config['height']	= 480;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			copy ($pathTemp.$filename, $path320.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path320.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 320;
			$config['height']	= 240;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			copy ($pathTemp.$filename, $path128.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path128.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 128;
			$config['height']	= 96;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			$path640 = 'wp-content/capture/pop/640/';
			$path320 = 'wp-content/capture/pop/320/';
			$path128 = 'wp-content/capture/pop/128/';
			
			$this->pop->insert (
				$shipment,
				$datetime,
				$imei,
				$hp,
				$latitude,
				$longitude,
				$categori,
				$path640.$filename,
				$path320.$filename,
				$path128.$filename,
				$receiver,
				$remarks
			);
			
			if (strtoupper($categori) == 'SIGNATURE') {
				$pathMaps = 'wp-content/capture/pop/maps/';
				
				$this->general->saveMap($pathMaps . $shipment . '.jpg', $latitude, $longitude);
				
				$lokasi = (object) $this->general->gpsLocationName($latitude, $longitude);
				$status = $this->status->getID('Sent');
				
				$this->shipment->update_status($shipment, $lokasi->city . ' - ' . $lokasi->province, $status);
			}
		}
		
		echo 'done';
	}
	
	/* POD */
	public function shipment_mobile_pod() {
		$this->load->model('shipment', '', TRUE);
		
		$shipment = $this->input->post('shipment');
		
		$data = $this->shipment->getMobileData($shipment);
		
		echo json_encode($data);
	}
	
	public function upload_mobile_pod() {
		$this->load->model('pod', '', TRUE);
		$this->load->model('status', '', TRUE);
		$this->load->model('shipment', '', TRUE);
		$this->load->model('parcel', '', TRUE);
		
		$this->load->library('image_lib'); 
		$this->load->library('general');
		
		$post_data = array_values($_POST);
		
		$shipment = $post_data[0];
		$imei = $post_data[1];
		$hp = $post_data[2];
		$categori = $post_data[3];
		$longitude = $post_data[4];
		$latitude = $post_data[5];
		$receiver = $post_data[6];
		$remarks = $post_data[7];
		$datetime = date("Y-m-d H:i:s", strtotime(str_replace(": ", "", $post_data[8])));
		
		$filename = $shipment . '_' . $this->pod->countShipment($shipment) . '.jpg';
		
		$pathTemp = './wp-content/capture/pod/temp/';
		$path640 = './wp-content/capture/pod/640/';
		$path320 = './wp-content/capture/pod/320/';
		$path128 = './wp-content/capture/pod/128/';
		
		$config['upload_path'] = $pathTemp;
		$config['allowed_types'] = '*';
		$config['file_name'] = $filename;
		
		$this->load->library('upload', $config);
		
		
		$file_key = '';
		
		foreach($_FILES as $key => $value) {
			$file_key = $key;
		}
		
		if ($this->upload->do_upload($file_key)) {
			copy ($pathTemp.$filename, $path640.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path640.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 640;
			$config['height']	= 480;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			copy ($pathTemp.$filename, $path320.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path320.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 320;
			$config['height']	= 240;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			copy ($pathTemp.$filename, $path128.$filename);
			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $path128.$filename;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 128;
			$config['height']	= 96;

			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			$path640 = 'wp-content/capture/pod/640/';
			$path320 = 'wp-content/capture/pod/320/';
			$path128 = 'wp-content/capture/pod/128/';
			
			$this->pod->insert (
				$shipment,
				$datetime,
				$imei,
				$hp,
				$latitude,
				$longitude,
				$categori,
				$path640.$filename,
				$path320.$filename,
				$path128.$filename,
				$receiver,
				$remarks
			);
			
			if (strtoupper($categori) == 'SIGNATURE') {
				$pathMaps = 'wp-content/capture/pod/maps/';
				
				$this->general->saveMap($pathMaps . $shipment . '.jpg', $latitude, $longitude);
				
				$lokasi = (object) $this->general->gpsLocationName($latitude, $longitude);
				$status = $this->status->getID('Delivered');
				
				$this->shipment->update_status($shipment, $lokasi->city . ' - ' . $lokasi->province, $status);
				$shipmentID = $this->shipment->getID($shipment);
				
				$this->parcel->removeContainerByShipment($shipmentID);
				
			}
		}
		
		echo 'done';
	}
}
