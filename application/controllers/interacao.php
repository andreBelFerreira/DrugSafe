<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interacao extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Interacao_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['remedios'] = $this->Interacao_model->getRemedios();
        $data['interacoes'] = $this->Interacao_model->getInteracoes();

        $this->load->view('includes/header');
        $this->load->view('analise_interacao', $data);
        $this->load->view('includes/footer');
    }

    public function salvar()
    {
        $data_interacao = $this->input->post('data_interacao');
        $remedio_id = $this->input->post('remedio_id');
        $medico = $this->input->post('medico');
        $descricao = $this->input->post('descricao');

        if (empty($data_interacao) || empty($remedio_id) || empty($medico) || empty($descricao)) {
            $data['erro'] = "Todos os campos são obrigatórios.";
            $this->load->view('analise_interacao', $data);
            return;
        }

        $dados = array(
            'data_interacao' => $data_interacao,
            'remedio_id' => $remedio_id,
            'medico' => $medico,
            'descricao' => $descricao
        );

        if ($this->Interacao_model->salvarInteracao($dados)) {
            redirect('interacao');
        } else {
            $data['erro'] = "Erro ao salvar a interação.";
            $this->load->view('analise_interacao', $data);
        }
    }
}
