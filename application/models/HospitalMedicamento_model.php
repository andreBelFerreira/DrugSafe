<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HospitalMedicamento_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function associarMedicamento($hospital_id, $medicamento_id) {
    $dados = [
      'hospital_id' => $hospital_id,
      'medicamento_id' => $medicamento_id
    ];
    return $this->db->insert('hospitais_medicamentos', $dados);
  }
}
