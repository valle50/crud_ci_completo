<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_controller extends CI_Controller {

	public function __construct(){

		parent::__construct();
	}

	public function logout()
	{
		//Destruye todas las variables de sesión
		$this->session->sess_destroy();
	   	
	   	//Redirecciona al login
	   	redirect(base_url());
	}

}
