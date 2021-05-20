<?php 
class cProducto extends CI_Controller{

  function __construct() {
    parent::__construct();
      $this->load->model('mProducto');
      $this->load->model('mCategoriaProducto');
      if (!$this->session->userdata('user_id')) {
        redirect('cLogin');
      }
  }

  public function index(){
    $data['title']='Producto V';
    $this->load->view('intranet/layout/header.php');
    $this->load->view('intranet/layout/menu.php');
    $this->load->view('intranet/producto.php',$data);
    $this->load->view('intranet/layout/footer.php');
  }
  
  public function getProductoByTienda($tienda_id){
    $listar = $this->mProducto->getProductoByTienda($tienda_id);
    echo json_encode($listar);
  }

  public function change_estado_registro(){
    $id = $this->input->post('id');
    $estado = $this->input->post('estado');
    $data = array(
			'estado' => $estado
    );
    $listar = $this->mProducto->updateProducto($id,$data); 
    echo json_encode($listar);
  }
  
  public function desactivar_registro(){
    $id = $this->input->post('id');
    $data = array(
			'trash' => '1'
    );
    $listar = $this->mProducto->updateProducto($id,$data); 
    echo json_encode($listar);
  }

  public function getProductoByID(){
    $id = $this->input->post('id');
    $listar = $this->mProducto->getProductoByID($id); 
    echo json_encode($listar);  
  }

  public function getCategoriaProducto(){
    $listar=  $this->mCategoriaProducto->getCategoriaProducto();
    echo json_encode($listar);
  }
  
  public function updateProducto(){
    $id = $this->input->post('txt_id');
    $data = array(
      'nombre' => $this->input->post('txt_nombre'),
      'imagen_url' => $this->input->post('txt_img_url'),
      'descripcion' => $this->input->post('txt_descripcion'),
      'categoria_id' => $this->input->post('cbo_categoria'),
      'Stock' => $this->input->post('stock'),
      'Precio' => $this->input->post('precio') 
    );
    $listar = $this->mTienda->updateProducto($id,$data); 
    echo json_encode($listar);
  }
  
  public function setProducto(){
    $data = array(
        'nombre' => $this->input->post('txt_nombre'),
        'imagen_url' => $this->input->post('txt_img_url'),
        'descripcion' => $this->input->post('txt_descripcion'),
        'categoria_id' => $this->input->post('cbo_categoria'),      
        'Stock' => $this->input->post('stock'),
        'Precio' => $this->input->post('precio')
    );
    $listar = $this->mProducto->setProducto($data); 
    echo json_encode($listar);
  }

}
?>

