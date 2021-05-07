<?php
class cLogin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('mUsuario');
  }

	public function index(){   
    $data['title']='Tienda V';
		$this->load->view('login',$data);
	}

  public function login(){
    $param['email'] = $this->input->post('email');
    $param['password'] = $this->input->post('password');
    $listar=  $this->mUsuario->login($param);
    if(count($listar)==1){
      $array = json_decode(json_encode($listar[0]), true);
			$s_usuario = array(
				'user_id' => $array['usuario_id'], 
				'persona' => $array['persona']
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