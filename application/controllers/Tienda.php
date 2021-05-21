<?php
class Tienda extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('mTienda');
    $this->load->model('mProducto');
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
        $listar=  $this->mTienda->getTiendaByCategoria($param['search']);
      }else{//busca todos las tiendas
        $listar=  $this->mTienda->getTienda();
      }     
    }else{//si no esnumero entonces busca por nombre o por nombre del producto y muesta las tiendas q tienen esos productos
      $param['search'];
      $listar=  $this->mTienda->getTiendaByName($param['search']);      
    }
    echo json_encode($listar);
  }

  public function Search_productos(){
    $param['search'] = $this->input->post('search');
    if(is_numeric($param['search'])){// si es numero puede ser todos los elementos o una categoria
      $param['search'] = (int)$param['search'];
      if($param['search']!=0){// si no es cero, busca por id de categoria
        $listar=  $this->mProducto->getProductoByCategoria($param['search']);
      }
      // else{
      //   $listar=  $this->mTienda->getTienda();
      // }     
    }
    // else{
    //   $param['search'];
    //   $listar=  $this->mTienda->getTiendaByName($param['search']);      
    // }
    echo json_encode($listar);
  }
  
  public function getTiendaByID(){
    $id = $this->input->post('id');
    $listar = $this->mTienda->getTiendaByID($id); 
    echo json_encode($listar);  
  }

  public function getProductoByTiendaId(){
    $id = $this->input->post('id');
    $listar = $this->mProducto->getProductoByTiendaId($id); 
    echo json_encode($listar);  
  }

  public function getProductoById(){
    $id = $this->input->post('id');
    $listar = $this->mProducto->getProducto($id); 
    echo json_encode($listar);  
  }
  


}
?>