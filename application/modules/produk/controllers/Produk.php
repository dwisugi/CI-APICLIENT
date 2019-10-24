<?php

class Produk extends MX_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Produk_m');
        $this->load->library('form_validation');
    }
  
    public function index()
    {
        $data['judul'] = 'Daftar Produk'; 
        $data['produk'] = $this->Produk_m->getData();
        // $data['santri'] = $this->Santri_m->getAllMahasiswa();
        $this->load->view('p_templates/header', $data);
        $this->load->view('p_produk/index', $data);
        $this->load->view('p_templates/footer'); 
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Produk';
        $data['produk'] = $this->Produk_m->getDataById($id);
        $this->load->view('p_templates/header', $data);
        $this->load->view('p_produk/detail', $data);
        $this->load->view('p_templates/footer');
    } 
}
