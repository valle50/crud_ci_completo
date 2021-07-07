<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_controller extends CI_Controller {

	public function __construct(){

		parent::__construct();

		//Carga los modelos que vamos a utilizar en el controlador
		$this->load->model('empleados_model');
		$this->load->model('cargos_model');

		//Carga librería de validación de inputs
		$this->load->library('form_validation');

		//Si no hay una sesión activa, redirige al login, en este caso se evalúa la variable de sesión "id"
		//Si detecta que no existe ninguna variable de sesión "id", es porque no se ha iniciado una
		if(!$this->session->userdata('id'))
	   	{
	    	//redirect(base_url());
	   	}

	}

	// Carga datos en tabla
	public function index()
	{
		$data['empleados'] = $this->empleados_model->lista_empleados();
		$data['titulo'] = 'Empleados prueba';
		$data['active_inicio'] = 'active';

		$this->load->template('inicio', $data);
	}


	// Carga página para agregar regsitro de empleado
	public function form_nuevo_empleado(){

		$data['cargos'] = $this->cargos_model->lista_cargos();
		$data['titulo'] = 'Alta de empleados';
		$data['active_nuevo'] = 'active';

		$this->load->template('alta_empleado', $data);
	}


	// Recibe los datos del formulario para realizar el insert
	public function insert_empleado(){

		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[3]|alpha');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|min_length[3]|alpha');
		$this->form_validation->set_rules('sexo', 'sexo', 'required');
		$this->form_validation->set_rules('telefono', 'telefono', 'required|integer');
		$this->form_validation->set_rules('fecha_cumple', 'fecha de nacimiento', 'required');
		$this->form_validation->set_rules('fecha_ingreso', 'fecha de ingreso', 'required');

		if($this->form_validation->run()){//Si todos los campos pasan la validación

			$data = $this->input->post(NULL, TRUE);

			$insert = $this->empleados_model->insert_empleado($data);

			if($insert){

				echo json_encode(array('Respuesta' => TRUE));
				
			}else{
				
				echo json_encode(array('Respuesta' => FALSE));
			}
		}else{//Si no pasan, enviar los mensajes de los campos que no pasaron alguna validación

			echo json_encode($this->form_validation->error_array());
		}
		
	}//función insert


	// Carga página para actualizar
	public function form_actualiza_empleado($id = null)
	{
		$data['empleado'] = $this->empleados_model->obtiene_empleado($id);
		$data['cargos'] = $this->cargos_model->lista_cargos();
		$data['titulo'] = 'Actualiza empleados';
 
		if($data['empleado']){

			$this->load->template('actualiza_empleado', $data);
		}
		
	}


	// Recibe los datos del formulario para realizar el insert
	public function update_empleado($id)
	{
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[3]|alpha');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|min_length[3]|alpha');
		$this->form_validation->set_rules('sexo', 'sexo', 'required');
		$this->form_validation->set_rules('telefono', 'telefono', 'required|numeric');
		$this->form_validation->set_rules('fecha_cumple', 'fecha de nacimiento', 'required');
		$this->form_validation->set_rules('fecha_ingreso', 'fecha de ingreso', 'required');


		if($this->form_validation->run()){//Si todos los campos pasan la validación

			$data = $this->input->post(NULL, TRUE);

			$update = $this->empleados_model->update_empleado($id, $data);

			if($update){

				echo json_encode(array('Respuesta' => TRUE));
			}else{

				echo json_encode(array('Respuesta' => FALSE));
			}

		}else{//Si no pasan, enviar los mensajes de los campos que no pasaron alguna validación

			echo json_encode($this->form_validation->error_array());
		}
	}//función update


	public function delete_empleado($id){

		$delete = $this->empleados_model->delete_empleado($id);

		if($delete){

			echo json_encode(array('Respuesta' => TRUE));
		}else{

			echo json_encode(array('Respuesta' => FALSE));
		}
	}

}
