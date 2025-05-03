<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remedios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Remedio_model');
        $this->load->model('Hospital_model');
    }

    public function adicionar()
    {
        // Tela de adicionar remédio (agora com campo de hospital via AJAX)
        $this->load->view('includes/header');
        $this->load->view('Remedios');
        $this->load->view('includes/footer');
    }

    public function salvar()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/receitas/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB máximo
        $this->upload->initialize($config);

        $imagem_receita = null;
        if (!empty($_FILES['receita_imagem']['name'])) {
            if ($this->upload->do_upload('receita_imagem')) {
                $imagem_receita = $this->upload->data('file_name');
            } else {
                $data['erro'] = $this->upload->display_errors();
                $this->load->view('includes/header');
                $this->load->view('Remedios', $data);
                $this->load->view('includes/footer');
                return;
            }
        }

        $dados = [
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'validade' => $this->input->post('validade'),
            'quantidade' => $this->input->post('quantidade'),
            'hospital_id' => $this->input->post('hospital_id'),
            'data_prescricao' => $this->input->post('data_prescricao'),
            'dosagem' => $this->input->post('dosagem'),
            'medico_responsavel' => $this->input->post('medico_responsavel'),
            'receita_imagem' => $imagem_receita
        ];

        if ($this->Remedio_model->salvarRemedio($dados)) {
            redirect('dashboard');
        } else {
            $data['erro'] = "Erro ao salvar o remédio.";
            $this->load->view('includes/header');
            $this->load->view('Remedios', $data);
            $this->load->view('includes/footer');
        }
    }

    public function buscarHospitais()
    {
        // Função chamada pelo AJAX
        $termo = $this->input->get('q');
        $resultado = $this->Hospital_model->buscarHospitais($termo);
        echo json_encode($resultado);
    }
}
