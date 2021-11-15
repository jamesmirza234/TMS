<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Secure 
{
	function Secure()
	{
		$this->obj =& get_instance();
	}

	function is_logged_in()
	{
		if ($this->obj->session) {

			//If user has valid session, and such is logged in
			if ($this->obj->session->userdata('logged_in'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	} 
}
?>