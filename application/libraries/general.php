<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General 
{
	function __construct()
	{
	}

	function randomNumber($len=4) {
		$number = "";
		
		for ($i=0; $i<$len; $i++) {
			$number .= rand(0, 9);
		}
		
		return $number;
	}
	
	function addChar (
		$str,
		$char,
		$len
	) {
		$newStr = $str;
		
		for ($i=0; $i<($len-strlen($str)); $i++) {
			$newStr = $char . $newStr;
		}
		
		return $newStr;
	}
	
	function alMonth($index) {
		$month = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
		
		return $month[$index-1];
	}
	
	function sendSMS($noHP, $message) {
		$smsUserKey = urlencode('8finat');
		$smsPassKey = urlencode('parsel123!@#');
		$smsHP = urlencode($noHP);
		$smsMessage = urlencode($message);
		
		$url = 'https://reguler.zenziva.net/apps/smsapi.php';
		$url .= '?userkey=' . $smsUserKey;
		$url .= '&passkey=' . $smsPassKey;
		$url .= '&nohp=' . $smsHP;
		$url .= '&pesan=' . $smsMessage;
		
		return file_get_contents($url);
	}
	
	function gpsLocationName($lat, $lon) {
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon;
		
		$data = json_decode(file_get_contents($url));
		
		$zip='';
		$city='';
		$province='';
		$country='';
		
		foreach ($data->results[0]->address_components as $row) {
			if ($row->types[0] == "postal_code") {
				$zip=$row->long_name;
			}
			if ($row->types[0] == "administrative_area_level_2") {
				$city=$row->long_name;
			}
			if ($row->types[0] == "administrative_area_level_1") {
				$province=$row->long_name;
			}
			if ($row->types[0] == "country") {
				$country=$row->long_name;
			}
		}
		
		$result = array (
			'city'=>$city,
			'province'=>$province,
			'country'=>$country,
			'zip'=> $zip
		);
		
		return $result;
	}
	
	function saveMap($filename, $lat, $lon) {
		$url	= 'http://maps.googleapis.com/maps/api/staticmap?center=' . $lat . ',' . $lon . "&zoom=15&size=320x240&format=jpg&markers=%7Clabel:P%7C" . $lat . ',' . $lon;
		
		$contents=file_get_contents($url);
		$save_path=$filename;
		
		file_put_contents($save_path,$contents);
		
		return TRUE;
	}
	
	function object_to_array($obj) {
		if(is_object($obj)) $obj = (array) $obj;
		if(is_array($obj)) {
			$new = array();
			foreach($obj as $key => $val) {
				$new[$key] = $this->object_to_array($val);
			}
		}
		else $new = $obj;
		return $new;
	}
}
?>