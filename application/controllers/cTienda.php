<?php 
class cTienda extends CI_Controller{

  function __construct() {
    parent::__construct();
      $this->load->model('mTienda');
      if (!$this->session->userdata('user_id')) {
        redirect('cLogin');
      }
  }

  public function index(){
    $data['title']='Tienda V';
    $this->load->view('intranet/layout/header.php');
    $this->load->view('intranet/layout/menu.php');
    $this->load->view('intranet/tienda.php',$data);
    $this->load->view('intranet/layout/footer.php');
  }


  
}
?>

