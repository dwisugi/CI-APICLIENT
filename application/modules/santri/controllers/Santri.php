<?php

class Santri extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Santri_m');
        $this->load->library('form_validation');
    }
  
    public function index()
    {
        $data['judul'] = 'Daftar Santri'; 
        $data['santri'] = $this->Santri_m->getDataSantri();
        $this->load->view('v_templates/header', $data);
        $this->load->view('v_santri/index', $data);
        $this->load->view('v_templates/footer'); 
    }

}
