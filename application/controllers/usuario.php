<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Usuario_model');
  }

  public function cadastrar() {
    $this->load->view('cadastro'); // sua view cadastro.php
  }

  public function salvar() {
    $dados = [
      'nome' => $this->input->post('nome'),
      'email' => $this->input->post('email'),
      'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
    ];

    $this->Usuario_model->inserir($dados);
    $this->session->set_flashdata('mensagem', 'Cadastro realizado com sucesso!');
    redirect('login');
  }
}
