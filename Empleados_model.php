<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function lista_empleados(){

	    $query = $this->db->select('
	    	t1.Id,
	    	t1.nombre,
	    	t1.apellidos,
	    	t1.sexo,
	    	t1.telefono,
	    	TIMESTAMPDIFF(YEAR,t1.fecha_cumple,CURDATE()) AS edad,
	    	t1.fecha_ingreso,
	    	TIMESTAMPDIFF(DAY,t1.fecha_ingreso,CURDATE()) AS dias_trabajo,
	    	t1.id_cargo,
	    	t2.cargo')
	    ->from('trabajadores t1')
	    ->join('cargos t2', 't1.id_cargo = t2.Id')
	    ->order_by('t1.Id','DESC')
	    ->get();

	    if($query->num_rows() >= 1)
	    {
	        return $query->result();
	    }

	}

	public function obtiene_empleado($id){

		$query = $this->db->select('t1.*, t2.cargo')
	    ->from('trabajadores t1')
	    ->join('cargos t2', 't1.id_cargo = t2.Id')
	    ->where('t1.Id', $id)
	    ->get();

	    if($query->num_rows() >= 1){

	    	return $query->row();
	    }else{

	    	return FALSE;
	    }
	    
	}


	public function insert_empleado($data){

		$this->db->insert('trabajadores', $data);

		if($this->db->affected_rows() > 0){

			return TRUE;
		}else{

			return FALSE;
		}
	}


	public function update_empleado($id, $data){

		$query = $this->db->set($data)
		->where('Id', $id )
		->update('trabajadores');

		if($this->db->affected_rows() > 0){

			return true;

		}else{

			return false;
		}
	}


	public function delete_empleado($id){

		$this->db->where('Id', $id)
		->delete('trabajadores');

		if($this->db->affected_rows() > 0){

			return true;
		}else{

			return false;
		}
	}


}

