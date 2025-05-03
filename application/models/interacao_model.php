<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interacao_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Obter todos os remédios
    public function getRemedios()
    {
        $query = $this->db->get('remedios');
        return $query->result_array();
    }

    // Obter todas as interações
    public function getInteracoes()
    {
        $this->db->select('interacoes.*, remedios.nome AS nome_remedio, interacoes.descricao AS interacao, interacoes.data_interacao AS data');
        $this->db->from('interacoes');
        $this->db->join('remedios', 'remedios.id = interacoes.remedio_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function salvarInteracao($dados)
    {
        return $this->db->insert('interacoes', $dados);
    }
}
