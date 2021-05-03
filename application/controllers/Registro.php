<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller{
    public function __construct(){
		parent::__construct();
        $this->load->helper(array("getmenu"));
        $this->load->model("Users");
        $this->load->library(array("form_validation"));
    }
    
    public function index(){
        $data["menu"] = main_menu();
        $this->load->view("registro",$data);
    }

    public function create(){
        $username =$this->input->post("username");
        $email =$this->input->post("email");
        $password =$this->input->post("password");
        $password_c =$this->input->post("password_confirm");

        $config = array(
            array(
                    'field' => 'username',
                    'label' => 'Nombre de usuario',
                    'rules' => 'required|alpha_numeric'
            ),
            array(
                    'field' => 'email',
                    'label' => 'Correo',
                    'rules' => 'required|valid_email',
                    'errors' => array(
                            'required' => 'El %s es incorrecto.',
                    ),
            ),
        );
        $this->form_validation->set_rules($config);
        $data["menu"] = main_menu();
        if($this->form_validation->run() == FALSE){
            $this->load->view('registro',$data);
        }else{
            $datos = array(
                        "nombre_usuario"=> $username,
                        "correo"=> $email,
                        "contrasena"=> $password
            );
            
            if(!$this->Users->create($datos)){
                $data["msj"] = "Ocurrio un error al cargar los datos, intente mas tarde.";
                $this->load->view("registro",$data);
            }else{
                $data["msj"] = "Resgistrado correctamente.";
                $this->load->view("registro",$data);
            }
        }

    }

}
