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
        // $data['santri'] = $this->Santri_m->getAllMahasiswa();
        $this->load->view('s_templates/header', $data);
        $this->load->view('s_santri/index', $data);
        $this->load->view('s_templates/footer'); 
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['santri'] = $this->Santri_m->getDataSantriById($id);
        $this->load->view('s_templates/header', $data);
        $this->load->view('s_santri/detail', $data);
        $this->load->view('s_templates/footer');
    } 
}
