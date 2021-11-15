<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$unlocked = array('login');
		
		if ( ! $this->secure->is_logged_in() AND ! in_array(strtolower(get_class($this)), $unlocked) )
		{
		redirect($this->config->base_url() . 'index.html');
		}
	}
}