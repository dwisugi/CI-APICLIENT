<?php

class Mahasiswa extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_m');
        $this->load->library('form_validation');
    }
  
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa'; 
        $data['mahasiswa'] = $this->Mahasiswa_m->getAllMahasiswa();
        if( $this->input->post('keyword') ) {
            $data['mahasiswa'] = $this->Mahasiswa_m->cariDataMahasiswa();
        }
        // $data['admin'] = $this->Mahasiswa_m->admin(); 
        $this->load->view('v_templates/header', $data);
        $this->load->view('v_mahasiswa/index', $data);
        $this->load->view('v_templates/footer'); 
    }

    public function login()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_templates/header', $data);
            $this->load->view('v_mahasiswa/adminya');
            $this->load->view('v_templates/footer');
        } else {
            // $this->Mahasiswa_m->admin();
            $data['admin'] = $this->Mahasiswa_m->admin();
            $this->session->set_flashdata('flash', $data['admin']);
            redirect('mahasiswa');
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_templates/header', $data);
            $this->load->view('v_mahasiswa/tambah');
            $this->load->view('v_templates/footer');
        } else {
            $this->Mahasiswa_m->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_m->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_m->getMahasiswaById($id);
        $this->load->view('v_templates/header', $data);
        $this->load->view('v_mahasiswa/detail', $data);
        $this->load->view('v_templates/footer');
    } 

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_m->getMahasiswaById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_templates/header', $data);
            $this->load->view('v_mahasiswa/ubah', $data);
            $this->load->view('v_templates/footer');
        } else {
            $this->Mahasiswa_m->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }

}
