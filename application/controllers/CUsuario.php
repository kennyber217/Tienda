<?php 
class CUsuario extends CI_Controller{

  function __construct() {
    parent::__construct();
      $this->load->model('MUsuario');
      if (!$this->session->userdata('user_id')) {
        redirect('cLogin');
      }
  }

  public function bandeja(){
    $data['title']='Tienda V';
    $this->load->view('intranet/layout/header.php');
    $this->load->view('intranet/layout/menu.php');
    $this->load->view('intranet/usuario.php',$data);
    $this->load->view('intranet/layout/footer.php');
  }
  
  public function perfil(){
    $data['title']='Tienda V';
    $this->load->view('intranet/layout/header.php');
    $this->load->view('intranet/layout/menu.php');
    $this->load->view('intranet/usuario_perfil.php',$data);
    $this->load->view('intranet/layout/footer.php');
  }

  public function getUsusario(){
    $listar = $this->MUsuario->getUsusario();
    echo json_encode($listar);
  }
  
  public function getUsuarioData(){
    $id = $this->session->userdata('user_id');
    $listar = $this->MUsuario->getUsuarioByID($id);
    echo json_encode($listar);
  }

  public function getUsuarioByID(){
    $id = $this->input->post('id');
    $listar = $this->MUsuario->getUsuarioByID($id);
    echo json_encode($listar);
  }

  public function change_estado_registro(){
    $id = $this->input->post('id');
    $estado = $this->input->post('estado');
    $data = array(
			'estado' => $estado
    );
    $listar = $this->MUsuario->updateUsuario($id,$data); 
    echo json_encode($listar);
  }
  
  public function desactivar_registro(){
    $id = $this->input->post('id');
    $data = array(
			'trash' => '1'
    );
    $listar = $this->MUsuario->updateUsuario($id,$data); 
    echo json_encode($listar);
  }
  
  public function reiniciar_password(){
    $id = $this->input->post('id');
    $data = array(
			'password' => '123456'
    );
    $listar = $this->MUsuario->updateUsuario($id,$data); 
    echo json_encode($listar);
  }

  public function updateUsuario(){
    $id = $this->input->post('txt_id');
    $data = array(
      'email' => $this->input->post('txt_email'),
      'nombre' => $this->input->post('txt_nombre'),
      'apellido_paterno' => $this->input->post('txt_apellido_paterno'),
      'apellido_materno' => $this->input->post('txt_apellido_materno'),
      'rol_id' => $this->input->post('cbo_rol')
    );
    $listar = $this->MUsuario->updateUsuario($id,$data); 
    echo json_encode($listar);
  }

  public function setUsuario(){
    $data = array(
      'email' => $this->input->post('txt_email'),
      'nombre' => $this->input->post('txt_nombre'),
      'apellido_paterno' => $this->input->post('txt_apellido_paterno'),
      'apellido_materno' => $this->input->post('txt_apellido_materno'),
      'rol_id' => $this->input->post('cbo_rol')
    );
    $listar = $this->MUsuario->setUsuario($data); 
    echo json_encode($listar);
  }

}
?>

