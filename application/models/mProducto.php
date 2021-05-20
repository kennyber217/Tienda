<?php
class mProducto extends CI_Model{

  public function getProducto(){
  //  $this->db->select("*");
    //$this->db->from("tienda");
    //$this->db->where("estado","1");
    //$this->db->where("trash","0");
    $resultado = $this->db->get();
	  return $resultado->result();
  }
	
  public function getProducto_forHomePage(){
    //$this->db->select("*");
    //$this->db->from("tienda");
    //$this->db->where("estado","1");
    //$this->db->where("trash","0");
    //$this->db->order_by('tienda_id', 'RANDOM');
    $this->db->limit(5); 
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getProductoByID($id){
    //$this->db->select("tienda.*,categoria.nombre as categoria_nom");
    //$this->db->from("tienda");
    //$this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    //$this->db->where("tienda.trash","0");
	  //$this->db->where("tienda.tienda_id",$id);
    //$resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getProductoByCategoria($search){
    //$this->db->select("*");
    //$this->db->from("tienda");
    //$this->db->where("estado","1");
    /*$this->db->where("trash","0");
	  $this->db->where("categoria_id",$search);*/
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  /*public function getTiendaByName($search){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
	  $this->db->like("nombre",$search, 'both');
    $resultado = $this->db->get();
  	return $resultado->result();
  }*/

  public function getTiendaForAdmin(){
    $this->db->select("tienda.*,categoria.nombre as categoria_nom");
    $this->db->from("tienda");
	  $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    $this->db->where("tienda.trash","0");
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getProductoByTienda($user_id){
    /*$this->db->select("tienda.*,categoria.nombre as categoria_nom");
    $this->db->from("tienda");
	  $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
    $this->db->where("tienda.trash","0");
	  $this->db->where("tienda.usuario_id",$user_id);*/
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function updateProducto($id,$data){
    $this->db->where('producto_id', $id);
    $this->db->update('tienda',$data);	
    return true;
  }

  public function setProducto($data){
	$this->db->insert('tienda',$data);
    return true;
  }

  
}
?>