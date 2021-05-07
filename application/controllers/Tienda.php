<?php
class Tienda extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('mTienda');
  }

  public function listar($search)
  {  
    $data['title']='Tienda V';
    $data['search']=$search;
    $this->load->view('extranet/layout/header.php');
    $this->load->view('extranet/tiendas.php',$data);
    $this->load->view('extranet/layout/footer.php');
  }

  public function Search(){
    $param['search'] = $this->input->post('search');
    if(is_numeric($param['search'])){
      $param['search'] = (int)$param['search'];
      if($param['search']!=0){
        $listar=  $this->mTienda->getTiendaByCategoria($param['search']);
      }else{
        $listar=  $this->mTienda->getTienda();
      }     
    }else{
      $param['search'];
      $listar=  $this->mTienda->getTiendaByName($param['search']);      
    }
    echo json_encode($listar);
  }
  
//   public function getTienda(){
//     $listar=  $this->mTienda->getTienda();
//     echo json_encode($listar);
//   }
  
//   public function getTienda_forHomePage(){
//     $listar=  $this->mTienda->getTienda_forHomePage();
//     echo json_encode($listar);
//   }



}
?>