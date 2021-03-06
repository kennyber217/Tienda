<?php
class CLogin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('MUsuario');
  }

	public function index(){   
    $data['title']='Tienda V';
		$this->load->view('login',$data);
	}

  public function login(){
    $param['email'] = $this->input->post('email');
    $param['password'] = $this->input->post('password');
    $listar=  $this->MUsuario->login($param);
    if(count($listar)==1){
      $array = json_decode(json_encode($listar[0]), true);
			$s_usuario = array(
				'user_id' => $array['usuario_id'],
        'rol_id' => $array['rol_id'],
        'apellido_paterno' => $array['apellido_paterno'],
        'apellido_materno' => $array['apellido_materno'],
        'nombre' => $array['nombre']
      );
			$this->session->set_userdata($s_usuario);
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('cLogin');
  }

}
?>