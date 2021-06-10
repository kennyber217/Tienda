<?php
class CHome extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('MTienda');
    $this->load->model('MCategoria');
    $this->load->model('MCategoriaProducto');
  }

  public function index()
  {   
    $data['title']='Tienda V';
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/home.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }
  
  public function getTienda(){
    $listar=  $this->MTienda->getTienda();
    echo json_encode($listar);
  }
  
  public function getTienda_forHomePage(){
    $listar=  $this->MTienda->getTienda_forHomePage();
    echo json_encode($listar);
  }

  public function getCategoria(){
    $listar=  $this->MCategoria->getCategoria();
    echo json_encode($listar);
  }
  
  public function getCategoriaProductos(){
    $listar=  $this->MCategoriaProducto->getCategoriaProducto();
    echo json_encode($listar);
  }


}
?>