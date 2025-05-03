<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

  public function inserir($dados) {
    return $this->db->insert('usuarios', $dados);
  }

  public function verificar_usuario($email, $senha) {
    $this->db->where('email', $email);
    $query = $this->db->get('usuarios');

    if ($query->num_rows() == 1) {
      $usuario = $query->row();

      if (password_verify($senha, $usuario->senha)) {
        return $usuario;
      }
    }

    return false;
  }
}
