<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('verificar_login')) {
    function verificar_login($nivel = null)
    {
        $CI = &get_instance();
        $CI->load->library('session');

        if (!$CI->session->userdata('usuario_id')) {
            redirect('login');
        }

        if ($nivel && $CI->session->userdata('nivel') !== $nivel) {
            redirect('acesso_negado'); // A gente pode criar essa view também se quiser.
        }
    }
}
