<?php
class mProducto extends CI_Model{

  public function getProductoByTiendaId($id){
    $this->db->select("*");
    $this->db->from("producto");
    $this->db->where("producto.trash","0");
    $this->db->where("producto.estado","1");
	  $this->db->where("producto.tienda_id",$id);
    $this->db->order_by('producto.producto_id', 'RANDOM');
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function getProductoById($id){
    $this->db->select("producto.*,categoria_producto.nombre as categoria_producto_nom");
    $this->db->from("producto");
    $this->db->join("categoria_producto","producto.categoria_producto_id = categoria_producto.categoria_producto_id", "inner");
    $this->db->where("producto.trash","0");
	  $this->db->where("producto.producto_id",$id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }
  
  public function getProductoByCategoria($search){
    $this->db->select("*");
    $this->db->from("producto");
    $this->db->where("producto.estado","1");
    $this->db->where("producto.trash","0");
	  $this->db->where("producto.categoria_producto_id",$search);
    $resultado = $this->db->get();
	  return $resultado->result();
  }
  
  // public function updateTienda($id,$data){
  //   $this->db->where('tienda_id', $id);
  //   $this->db->update('tienda',$data);	
  //   return true;
  // }

  // public function setTienda($data){
	// $this->db->insert('tienda',$data);
  //   return true;
  // }

  
}
?>