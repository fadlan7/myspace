<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'isi' => 'v_admin'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }
}
