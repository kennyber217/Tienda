<?php
class mProducto extends CI_Model{
  /* Inicio metodos Kenny */
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

  public function getProducto($id){
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

  /* Fin metodos Kenny */  
  /* Inicio metodos Roxana */

  // public function getProducto(){
  //  $this->db->select("*");
  //   $this->db->from("tienda");
  //   $this->db->where("estado","1");
  //   $this->db->where("trash","0");
  //   $resultado = $this->db->get();
	//   return $resultado->result();
  // }

  public function getProductoByID($id){
    $this->db->select("producto.*,categoria_producto.nombre as categoria_producto_nom");
    $this->db->from("producto");
    $this->db->join("categoria_producto","producto.categoria_producto_id = categoria_producto.categoria_producto_id", "inner");
    $this->db->where("producto.trash","0");
	  $this->db->where("producto.producto_id",$id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  // public function getProductoByCategoria($search){
  //   $this->db->select("*");
  //   $this->db->from("tienda");
  //   $this->db->where("estado","1");
  //   $this->db->where("trash","0");
	//   $this->db->where("categoria_id",$search);
  //   $resultado = $this->db->get();
	//   return $resultado->result();
  // }

  // public function getTiendaByName($search){
  //   $this->db->select("*");
  //   $this->db->from("tienda");
  //   $this->db->where("estado","1");
  //   $this->db->where("trash","0");
	//   $this->db->like("nombre",$search, 'both');
  //   $resultado = $this->db->get();
  // 	return $resultado->result();
  // }

  // public function getTiendaForAdmin(){
  //   $this->db->select("tienda.*,categoria.nombre as categoria_nom");
  //   $this->db->from("tienda");
	//   $this->db->join("categoria","tienda.categoria_id = categoria.categoria_id", "inner");
  //   $this->db->where("tienda.trash","0");
  //   $resultado = $this->db->get();
	//   return $resultado->result();
  // }

  public function getProductoByTienda($tienda_id){
    $this->db->select("producto.*,categoria_producto.nombre as categoria_producto_nom");
    $this->db->from("producto");
    $this->db->join("categoria_producto","producto.categoria_producto_id = categoria_producto.categoria_producto_id", "inner");
    $this->db->where("producto.trash","0");
	  $this->db->where("producto.tienda_id",$tienda_id);
    $resultado = $this->db->get();
	  return $resultado->result();
  }

  public function updateProducto($id,$data){
    $this->db->where('producto_id', $id);
    $this->db->update('producto',$data);	
    return true;
  }

  public function setProducto($data){
	  $this->db->insert('producto',$data);
    return true;
  }

  /* Fin metodos Roxana */

  
}
?>