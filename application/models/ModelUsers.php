<?php

class ModelUsers extends CI_Model{
    function __Construct(){
        $this->load->database();
    }

    public function save($user,$uerInfo){
        /*$this->db->trans_start(TRUE); Se pone el TRUE para hacer un tipo test y asi no llene de basura la base de datos*/
        $this->db->trans_start();
            $this->db->insert("usuarios",$user);
            $userInfo["id_usuario"] = $this->db->insert_id();
            $this->db->insert("medicos",$userInfo);
        $this->db->trans_complete();

        return (!$this->db->trans_status())?false:true;
    }

    public function getUsers(){
        $sql = $this->db->order_by("id","DESC")->get("usuarios");
        return $sql->result();
    }

    public function getPaginate($limit,$offset){
        $sql = $this->db->order_by("id","DESC")->get("usuarios",$limit,$offset);
        return $sql->result();
    }

    public function updateUser($id,$data){
        $this->db->where("id",$id);
        $this->db->update("medicos",$data);
    }

    public function deleteUser($id){
        $this->db->where("id",$id);
        $this->db->delete("usuarios");
    }

    public function getUser($id){
        $this->db->join("medicos","usuarios.id = medicos.id_usuario");
        $user = $this->db->get_where("usuarios",array("usuarios.id"=>$id),1);

        return $user->row_array();
    }
}