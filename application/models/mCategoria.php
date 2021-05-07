<?php
class mCategoria extends CI_Model{

  public function getCategoria(){
    $this->db->select("*");
    $this->db->from("categoria");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $resultado = $this->db->get();
	return $resultado->result();
  }




}
?>