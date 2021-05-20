<?php
class mCategoriaProducto extends CI_Model{

  public function getCategoriaProducto(){
    $this->db->select("*");
    $this->db->from("categoria_producto");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $resultado = $this->db->get();
	return $resultado->result();
  }




}
?>