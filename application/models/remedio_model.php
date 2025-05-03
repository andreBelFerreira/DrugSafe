<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remedio_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function salvarRemedio($dados)
    {
        return $this->db->insert('remedios', $dados);
    }

    public function buscarTodos()
    {
        $this->db->select('remedios.*, hospitais.nome AS hospital_nome');
        $this->db->from('remedios');
        $this->db->join('hospitais', 'hospitais.id = remedios.hospital_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_all()
    {
        return $this->db->get('remedios')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('remedios', $data);
    }
    public function buscarVencidos()
    {
        $hoje = date('Y-m-d');
        $this->db->where('validade <', $hoje);
        $query = $this->db->get('remedios');
        return $query->result_array();
    }
}
