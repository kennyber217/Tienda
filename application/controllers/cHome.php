<?php
class cHome extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('mTienda');
    $this->load->model('mCategoria');
  }

  public function index()
  {   
    $data['title']='Tienda V';
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/home.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }
  
  public function getTienda(){
    $listar=  $this->mTienda->getTienda();
    echo json_encode($listar);
  }
  
  public function getTienda_forHomePage(){
    $listar=  $this->mTienda->getTienda_forHomePage();
    echo json_encode($listar);
  }

  public function getCategoria(){
    $listar=  $this->mCategoria->getCategoria();
    echo json_encode($listar);
  }
  


}
?>