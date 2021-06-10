<?php
class MUsuario extends CI_Model{

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

  public function getUsusario(){
    $this->db->select("*");
    $this->db->from("usuario");
    $this->db->where("trash","0");
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getUsuarioByID($id){
    $this->db->select("*");
    $this->db->from("usuario");
    $this->db->where("trash","0");
    $this->db->where("usuario_id",$id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }
  
  public function updateUsuario($id,$data){
    $this->db->where('usuario_id', $id);
    $this->db->update('usuario',$data);	
    return true;
  }

  public function setUsuario($data){
	  $this->db->insert('usuario',$data);
    return true;
  }

}
?>