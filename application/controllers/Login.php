<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	/*function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
	   $this->load->library(array("session"));
	}*/
	public function __construct(){
		parent::__construct();
		$this->load->library(array("form_validation","session"));
		$this->load->helper(array("auth/login_rules"));
		$this->load->model("auth");
	}
	
	public function index(){
		$this->load->view("login");
	}
	
	public function validate(){
		$this->form_validation->set_error_delimiters("","");
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==FALSE){
			$errors = array(
				"email"=>form_error("email"),
				"password"=>form_error("password")
			);

			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{
			$user = $this->input->post("email");
			$password = $this->input->post("password");

			if(!$res =$this->auth->login($user,$password)){
				echo json_encode(array("msg"=>"Verifique sus credenciales"));
				$this->output->set_status_header(401);
				exit;
			}else{
				$data = array(
								"id"=> $res->id,
								"rango"=>$res->range,
								"status"=>$res->status,
								"nombreusuario"=>$res->nombre_usuario,
								"is_logged"=>TRUE
				);
				$this->session->set_userdata($data);
				$this->session->set_flashdata("msg","Bienvenido al sistema ".$data["nombreusuario"]);
				echo json_encode(array("url"=> base_url("dashboard")));
			}
		}
	}

	public function logout(){
		$vars = array("id","rango","status","nombreusuario","is_logged");
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect (base_url());
	}
}