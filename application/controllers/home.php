<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index() {
    $this->load->model('Remedio_model');
    $data['remedios_vencidos'] = $this->Remedio_model->buscarVencidos();
    $this->load->view('includes/header');
    $this->load->view('home', $data);
    $this->load->view('includes/footer');
  }
}
