<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Usuario_model');
  }

  public function index() {
    $this->load->view('login'); // sua view login.php
  }

  public function autenticar() {
    $email = $this->input->post('email');
    $senha = $this->input->post('senha');

    $usuario = $this->Usuario_model->verificar_usuario($email, $senha);

    if ($usuario) {
      $this->session->set_userdata('usuario_id', $usuario->id);
      $this->session->set_userdata('usuario_nome', $usuario->nome);
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('erro', 'Email ou senha inválidos');
      redirect('login');
    }
  }

  public function sair() {
    $this->session->sess_destroy();
    redirect('login');
  }
}
