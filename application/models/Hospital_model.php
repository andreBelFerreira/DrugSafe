<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hospital_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listarHospitais()
    {
        return $this->db->get('hospitais')->result_array();
    }

    public function buscarHospitais($termo)
    {
        $this->db->like('nome', $termo);
        $query = $this->db->get('hospitais');
        return $query->result_array();
    }

    public function cadastrarHospital($dados)
    {
        $this->db->insert('hospitais', $dados);
        return $this->db->insert_id();
    }
}
