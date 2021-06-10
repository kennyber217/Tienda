<?php 
class CProducto extends CI_Controller{

  function __construct() {
    parent::__construct();
      $this->load->model('MProducto');
      $this->load->model('MCategoriaProducto');
      if (!$this->session->userdata('user_id')) {
        redirect('cLogin');
      }
  }

  public function productos($tienda_id){
    $data['title']='vShop';
    $data['tienda_id']=$tienda_id;
    $this->load->view('intranet/layout/header.php');
    $this->load->view('intranet/layout/menu.php');
    $this->load->view('intranet/producto.php',$data);
    $this->load->view('intranet/layout/footer.php');
  }
  
  public function getProductoByTienda(){
    $tienda_id = $this->input->post('tienda_id');
    $listar = $this->MProducto->getProductoByTienda($tienda_id);
    echo json_encode($listar);
  }

  public function change_estado_registro(){
    $id = $this->input->post('id');
    $estado = $this->input->post('estado');
    $data = array(
			'estado' => $estado
    );
    $listar = $this->MProducto->updateProducto($id,$data); 
    echo json_encode($listar);
  }
  
  public function desactivar_registro(){
    $id = $this->input->post('id');
    $data = array(
			'trash' => '1'
    );
    $listar = $this->MProducto->updateProducto($id,$data); 
    echo json_encode($listar);
  }

  public function getProductoByID(){
    $id = $this->input->post('id');
    $listar = $this->MProducto->getProductoByID($id); 
    echo json_encode($listar);  
  }

  public function getCategoriaProducto(){
    $listar=  $this->MCategoriaProducto->getCategoriaProducto();
    echo json_encode($listar);
  }
  
  public function updateProducto(){
    $id = $this->input->post('txt_id');
    $data = array(
      'codigo' => $this->input->post('txt_codigo'),
      'nombre' => $this->input->post('txt_nombre'),      
      'descripcion' => $this->input->post('txt_descripcion'),
      'categoria_producto_id' => $this->input->post('cbo_categoria_producto'),
      'precioCompra' => $this->input->post('txt_precioCompra'),
      'precioVenta' => $this->input->post('txt_precioVenta'),
      'existencia' => $this->input->post('txt_existencia'),
      'imagen_url' => $this->input->post('txt_img_url')
    );
    $listar = $this->MProducto->updateProducto($id,$data); 
    echo json_encode($listar);
  }
  
  public function setProducto(){
    $data = array(
      'tienda_id' => $this->input->post('tienda_id'),
      'codigo' => $this->input->post('txt_codigo'),
      'nombre' => $this->input->post('txt_nombre'),      
      'descripcion' => $this->input->post('txt_descripcion'),
      'categoria_producto_id' => $this->input->post('cbo_categoria_producto'),
      'precioCompra' => $this->input->post('txt_precioCompra'),
      'precioVenta' => $this->input->post('txt_precioVenta'),
      'existencia' => $this->input->post('txt_existencia'),
      'imagen_url' => $this->input->post('txt_img_url')
    );
    $listar = $this->MProducto->setProducto($data); 
    echo json_encode($listar);
  }

}
?>

