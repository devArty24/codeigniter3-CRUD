<?php

class auth extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function login($usuario,$password){
        $data = $this->db->get_where("usuarios",array("correo"=>$usuario, "contrasena"=>$password),1);
        if(!$data->result()){
            return false;
        }else{
            return $data->row();
        }
    }
}