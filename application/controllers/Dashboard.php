<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->library(array("pagination"));
        /*helper string => para generar una cedana aleatoria*/
        $this->load->library(array("session"));
    }

    public function index($offset=0){
        if($this->session->userdata("is_logged")){
            $this->load->model("ModelUsers");
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
        }else{
            show_404();
        }
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