<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array("form_validation","email","pagination"));
        /*helper string => para generar una cedana aleatoria*/
        $this->load->helper(array("users/user_rules","string"));
        $this->load->model("ModelUsers");
    }

    public function index($offset=0){
        /*START PAGINATION*/
        $data = $this->ModelUsers->getUsers();
        $config["base_url"] = base_url("Users/index");
        $config["per_page"] = 3;
        $config["total_rows"] = count($data);

        $config["full_tag_open"] = "<div class='paggin text-center'><nav><ul class='pagination'>";
        $config["full_tag_close"] = "</ul></nav></div>";
        $config["num_tag_open"] = "<li class='page-item'><span class='page-link'>";
        $config["num_tag_close"] = "</span></li>";
        $config["cur_tag_open"] = "<li class='page-item active'><span class='page-link'>";
        $config["cur_tag_close"] = "<span class='sr-only'>(current)</span></span></li>";
        $config["next_tag_open"] = "<li class='page-item'><span class='page-link'>";
        $config["next_tagl_close"] = "<span aria-hidden='true'>&raquo;</span></span></li>";
        $config["prev_tag_open"] = "<li class='page-item'><span class='page-link'>";
        $config["prev_tagl_close"] = "</span></li>";
        $config["first_tag_open"] = "<li class='page-item'><span class='page-link'>";
        $config["first_tagl_close"] = "</span></li>";
        $config["last_tag_open"] = "<li class='page-item'><span class='page-link'>";
        $config["last_tagl_close"] = "</span></li>";
        $this->pagination->initialize($config);

        $page = $this->ModelUsers->getPaginate($config["per_page"],$offset);
        /*END PAGINATION*/

        $this->getTemplate($this->load->view("admin/show_users",array("data"=>$page),TRUE));
    }

    public function create(){
        $vista = $this->load->view("admin/create_users","",TRUE);
        $this->getTemplate($vista);
    }

    public function update(){
        /*Validar para peticiones POST para que no se pueda acceder desde URL*/
        if($this->input->server("REQUEST_METHOD")==="POST"){
            $user = $this->input->post("user");
            $_id = $this->input->post("_id");
            $nombre = $this->input->post("nombre");
            $app = $this->input->post("apellidos");
            $cedula = $this->input->post("cedula");
            $especialidad = $this->input->post("especialidad");
            $area = $this->input->post("area");
    
            $this->form_validation->set_rules(getUpdateUserRules());
            if($this->form_validation->run()==FALSE){
                $view = $this->load->view("admin/edit_user","",TRUE);
                $this->getTemplate($view);
            }else{
                $data = array(
                    "nombre"=>$nombre,
                    "apellido"=>$app,
                    "area"=>$area,
                    "cedula"=>$cedula,
                    "especialidad"=>$especialidad
                );
                $this->ModelUsers->updateUser($_id,$data);
                $this->session->set_flashdata("msg","El usuario ".$user." fue actualizado correctamente");
                redirect("Users");
            }
        }else{
            show_404();
        }
    }

    public function delete(){
        $_id = $this->input->post("id");
        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array("msg"=>"El id no puede ser vacio.")));
        }else{
            $this->ModelUsers->deleteUser($_id);
            $this->output->set_status_header(200);
        }
    }

    public function store(){
        $user = $this->input->post("nombreUsers");
        $correo = $this->input->post("correo");
        $rango = $this->input->post("rangoUsuario");
        $name = $this->input->post("nombre");
        $lastName = $this->input->post("app");
        $area = $this->input->post("area");
        $especialidad = $this->input->post("especialidad");
        $cedula = $this->input->post("cedula");

        $this->form_validation->set_rules(getCreateUserRules());
        if($this->form_validation->run()==FALSE){
            $this->output->set_status_header(400);
        }else{
            $user = array(
                "nombre_usuario"=>$user,
                "correo"=>$correo,
                "contrasena"=>random_string("alnum",8),
                "status"=>1,
                "range"=>$rango,
            );
            $userInfo = array(
                "nombre"=>$name,
                "apellido"=>$lastName,
                "area"=>$area,
                "cedula"=>$cedula,
                "especialidad"=>$especilaidad
            );
            if(!$this->ModelUsers->save($user,$userInfo)){
                $this->output->set_status_header(500);
            }else{
                $this->sendEmail($user);
                $this->session->set_flashdata("msg","El usuario a sido registrado");
                redirect(base_url("users"));
            }
        }

        $vista = $this->load->view("admin/create_users","",TRUE);
        $this->getTemplate($vista);
    }

    public function edit($id =0){
        $user = $this->ModelUsers->getUser($id);
        $view = $this->load->view("admin/edit_user",array("user"=>$user),TRUE);

        $this->getTemplate($view);
    }

    public function sendEmail($data){
        $this->email->from("sistema@hospidev.com","Hospidev");
        $this->email->to($data["correo"]);
        
        $this->email->subject("Datos de cuenta");
        $vista = $this->load->view("emails/welcome",$data,TRUE);
        $this->email->message($vista);

        $this->email->send();
    }

    public function getTemplate($view){
        $data=array(
            /*CON LA LINEA DE ABAJO SE HACE UNA VISTA EN STRING*/
            "head"=>$this->load->view("layout/head","",TRUE),
            "nav"=>$this->load->view("layout/nav","",TRUE),
            "aside"=>$this->load->view("layout/aside","",TRUE),
            "content"=>$view,
            "footer"=>$this->load->view("layout/footer","",TRUE)
        );
        $this->load->view("dashboard",$data);
    }
}