<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Remedio_model');
    }

    public function index()
    {
        $data['remedios'] = $this->Remedio_model->buscarTodos();
        $this->load->view('includes/header');
        $this->load->view('dashboard', $data);
        $this->load->view('includes/footer');
    }
}
