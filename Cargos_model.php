<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function lista_cargos(){

		$query = $this->db->select('*')
	    ->from('cargos')
	    ->order_by('Id', 'DESC')
	    ->get();

	    return $query->result();
	}

}

