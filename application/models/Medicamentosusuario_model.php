<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medicamentosusuario_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listarRemediosPorUsuario($id_usuario)
    {
        $this->db->where('usuario_id', $id_usuario);
        $query = $this->db->get('medicamentos_usuarios');
        return $query->result_array();
    }

    public function cadastrarRemedio($dados)
    {
        return $this->db->insert('medicamentos_usuarios', $dados);
    }
}
