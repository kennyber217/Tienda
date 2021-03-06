<?php 
class CTienda extends CI_Controller{

  function __construct() {
    parent::__construct();
      $this->load->model('MTienda');
      $this->load->model('MCategoria');
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
  
  public function getTiendaByUser(){
    if( $this->session->userdata('rol_id')==1 ){//admin
      $listar = $this->MTienda->getTiendaForAdmin();
    }
    if( $this->session->userdata('rol_id')==2 ){//user vendedor
      $user_id = $this->session->userdata('user_id');
      $listar = $this->MTienda->getTiendaByUser($user_id);
    }    
    echo json_encode($listar);
  }

  public function change_estado_registro(){
    $id = $this->input->post('id');
    $estado = $this->input->post('estado');
    $data = array(
			'estado' => $estado
    );
    $listar = $this->MTienda->updateTienda($id,$data); 
    echo json_encode($listar);
  }
  
  public function desactivar_registro(){
    $id = $this->input->post('id');
    $data = array(
			'trash' => '1'
    );
    $listar = $this->MTienda->updateTienda($id,$data); 
    echo json_encode($listar);
  }

  public function getTiendaByID(){
    $id = $this->input->post('id');
    $listar = $this->MTienda->getTiendaByID($id); 
    echo json_encode($listar);  
  }

  public function getCategoria(){
    $listar=  $this->MCategoria->getCategoria();
    echo json_encode($listar);
  }
  
  public function updateTienda(){
    $id = $this->input->post('txt_id');
    $data = array(
      'nombre' => $this->input->post('txt_nombre'),
      'imagen_url' => $this->input->post('txt_img_url'),
      'descripcion' => $this->input->post('txt_descripcion'),
      'categoria_id' => $this->input->post('cbo_categoria') ,      
      'celular' => $this->input->post('txt_cel') ,
      'direccion' => $this->input->post('txt_direccion') ,
      'telefono' => $this->input->post('txt_telefono'),
      'longitud' => $this->input->post('txt_Longitud'),
      'latitud' => $this->input->post('txt_Latitud')
    );
    $listar = $this->MTienda->updateTienda($id,$data); 
    echo json_encode($listar);
  }
  
  public function setTienda(){
    $data = array(
      'nombre' => $this->input->post('txt_nombre'),
      'imagen_url' => $this->input->post('txt_img_url'),
      'descripcion' => $this->input->post('txt_descripcion'),
      'categoria_id' => $this->input->post('cbo_categoria') ,      
      'celular' => $this->input->post('txt_cel') ,
      'direccion' => $this->input->post('txt_direccion') ,
      'telefono' => $this->input->post('txt_telefono'),
      'longitud' => $this->input->post('txt_Longitud'),
      'latitud' => $this->input->post('txt_Latitud'),
      'usuario_id' => $this->session->userdata('user_id')
    );
    $listar = $this->MTienda->setTienda($data); 
    echo json_encode($listar);
  }

}
?>

