<?php
class mTienda extends CI_Model{

  public function getTienda(){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $resultado = $this->db->get();
	  return $resultado->result();
  }
	
  public function getTienda_forHomePage(){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $this->db->order_by('tienda_id', 'RANDOM');
    $this->db->limit(5); 
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getTiendaByID($id){
    $this->db->select("tienda.*,categoria.nombre as categoria_nom");
    $this->db->from("tienda");
    $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    $this->db->where("tienda.trash","0");
	  $this->db->where("tienda.tienda_id",$id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getTiendaByCategoria($search){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
	  $this->db->where("categoria_id",$search);
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getTiendaByName($search){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
	  $this->db->like("nombre",$search, 'both');
    $resultado = $this->db->get();
  	return $resultado->result();
  }

  public function getTiendaForAdmin(){
    $this->db->select("tienda.*,categoria.nombre as categoria_nom");
    $this->db->from("tienda");
	  $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    $this->db->where("tienda.trash","0");
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getTiendaByUser($user_id){
    $this->db->select("tienda.*,categoria.nombre as categoria_nom");
    $this->db->from("tienda");
	  $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    $this->db->where("tienda.trash","0");
	  $this->db->where("tienda.usuario_id",$user_id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function updateTienda($id,$data){
    $this->db->where('tienda_id', $id);
    $this->db->update('tienda',$data);	
    return true;
  }

  public function setTienda($data){
	$this->db->insert('tienda',$data);
    return true;
  }

  
}
?>