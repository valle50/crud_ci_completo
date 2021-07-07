<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	//Realiza consulta de usuario de acuerdo a los valores que el controlador le envió
	//Si el usuario y contraseña son correctos, se establecen las variables de sesión y regresa un TRUE o FALSE de acuerdo a la consulta
	public function login_usuario($usr, $pwd){

		$query = $this->db
				->where('nombre_usuario', $usr)
				->where('password', $pwd)
				->get('usuarios')
				->row();

		//Si la consulta contiene un resultado
		if(isset($query)){

			$this->session->set_userdata('id', $query->Id);
			$this->session->set_userdata('nombre_usuario', $query->nombre_usuario);

			return TRUE;

		}else{

			return FALSE;
		}
	}


}

