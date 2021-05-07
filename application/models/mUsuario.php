<?php
class mUsuario extends CI_Model{

  public function login($param){
    $this->db->select("*");
    $this->db->from("usuario");
    $this->db->where("trash","0");
    $this->db->where("estado","1");
    $this->db->where("email",$param["email"]);
    $this->db->where("password",$param["password"]);
    $resultado = $this->db->get();
	return $resultado->result();
  }



}
?>