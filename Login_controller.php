<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct(){

		parent::__construct();

		//Carga los modelos que vamos a utilizar en el controlador
		$this->load->model('usuarios_model');
		//Carga librería de validación de inputs
		$this->load->library('form_validation');

		//Si ya existe una sesión activa, redirecciona a al inicio de empleados
		if($this->session->userdata('id')){

			redirect(base_url().'Empleado_controller');
		}

	}

	//Carga la vista del login
	public function index()
	{
		$this->load->view('login');
	}


	//Recibe los datos del formulario del login para validarlos y realizar el login con el modelo
	public function login_usuario(){

		$this->form_validation->set_rules('usr', 'nombre de usuario', 'required|trim');
		$this->form_validation->set_rules('pwd', 'constraseña', 'required|trim');


		if($this->form_validation->run()){ //Si pasa las validaciones
			
			//Recibe los valores
			$usr = $this->input->post('usr', true);
			$pwd = $this->input->post('pwd', true);

			//Se envían los valores al modelo para que realice la consulta
			$login = $this->usuarios_model->login_usuario($usr, $pwd);

			if($login){

				echo json_encode(array('Respuesta' => TRUE));

			}else{

				echo json_encode(array('Respuesta' => FALSE));
			}

		}else{//Si no pasa alguna validación

			echo json_encode(array('Validaciones' => $this->form_validation->error_array()));
		}
		
	}

}
