<?php
class Tienda extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('MTienda');
    $this->load->model('MProducto');
  }

  public function tienda($tienda_id){  
    $data['title']='Tienda V';
    $data['tienda_id']=$tienda_id;
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/tienda.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }

  public function producto($producto_id){  
    $data['title']='Tienda V';
    $data['producto_id']=$producto_id;
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/producto.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }

  public function listar($search){  
    $data['title']='Tienda V';
    $data['search']=$search;
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/tiendas.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }

  public function productos($search){  
    $data['title']='Tienda V';
    $data['search']=$search;
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/productos.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }

  public function Search(){
    $param['search'] = $this->input->post('search');
    if(is_numeric($param['search'])){// si es numero puede ser todos los elementos o una categoria
      $param['search'] = (int)$param['search'];
      if($param['search']!=0){// si no es cero, busca por id de categoria
        $listar=  $this->MTienda->getTiendaByCategoria($param['search']);
      }else{//busca todos las tiendas
        $listar=  $this->MTienda->getTienda();
      }     
    }else{//si no esnumero entonces busca por nombre o por nombre del producto y muesta las tiendas q tienen esos productos
      $param['search'];
      $listar=  $this->MTienda->getTiendaByName($param['search']);      
    }
    echo json_encode($listar);
  }

  public function Search_productos(){
    $param['search'] = $this->input->post('search');
    if(is_numeric($param['search'])){// si es numero puede ser todos los elementos o una categoria
      $param['search'] = (int)$param['search'];
      if($param['search']!=0){// si no es cero, busca por id de categoria
        $listar=  $this->MProducto->getProductoByCategoria($param['search']);
      }
      // else{
      //   $listar=  $this->MTienda->getTienda();
      // }     
    }
    // else{
    //   $param['search'];
    //   $listar=  $this->MTienda->getTiendaByName($param['search']);      
    // }
    echo json_encode($listar);
  }
  
  public function getTiendaByID(){
    $id = $this->input->post('id');
    $listar = $this->MTienda->getTiendaByID($id); 
    echo json_encode($listar);  
  }

  public function getProductoByTiendaId(){
    $id = $this->input->post('id');
    $listar = $this->MProducto->getProductoByTiendaId($id); 
    echo json_encode($listar);  
  }

  public function getProductoById(){
    $id = $this->input->post('id');
    $listar = $this->MProducto->getProducto($id); 
    echo json_encode($listar);  
  }
  


}
?>