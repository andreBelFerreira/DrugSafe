<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hospital extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Hospital_model');
        $this->load->model('Medicamentosusuario_model');
        $this->load->model('HospitalMedicamento_model');
    }

    public function index()
    {
        $data['hospitais'] = $this->Hospital_model->listarHospitais();

        $this->load->view('includes/header');
        $this->load->view('hospital_listar', $data);
        $this->load->view('includes/footer');
    }

    public function cadastrar()
    {

        $this->load->view('includes/header');
        $this->load->view('hospital_cadastrar');
        $this->load->view('includes/footer');
    }

    public function salvar()
    {
        $dados = [
            'nome' => $this->input->post('nome'),
            'endereco' => $this->input->post('endereco'),
            'telefone' => $this->input->post('telefone'),
            'especialidades' => $this->input->post('especialidades')
        ];

        $id_hospital = $this->Hospital_model->cadastrarHospital($dados);

        $medicamentos = $this->input->post('medicamentos');
        if (!empty($medicamentos)) {
            foreach ($medicamentos as $medicamento_id) {
                $this->HospitalMedicamento_model->associarMedicamento($id_hospital, $medicamento_id);
            }
        }

        redirect('hospital');
    }
}
