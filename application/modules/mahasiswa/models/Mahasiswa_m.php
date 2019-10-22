<?php 
use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

class Mahasiswa_m extends CI_model {

    private $_client; 
    private $_admin;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/RestApiCiEdit/api/',
            'auth' => ['admin', '1234']
        ]);
    }

    public function admin()
    {
        $this->_admin = new Client([
            'base_uri' => 'http://localhost/newjwt/api/api/',
        ]);
        $response = $this->_admin->request('POST', 'login', [
            'form_params' => [
            "email" => $this->input->post('email'),
            "password" => $this->input->post('password'),
            // "email" => $this->input->post('email'),
            // "jurusan" => $this->input->post('jurusan'),
            // 'WPU-KEY' => 'wpu123'
                // 'id' => $id
            ]
        ]);
        $token = JWT::decode($_POST['token'], 'secret_server_key');
        echo $token->id;
        $result = json_decode($response->getBody(), true);

        return $result['token'];   
    }

    public function getAllMahasiswa()
    {
        // $client = new Client();

        $response = $this->_client->request('GET', 'mahasiswa', [
            'query' => [
                'WPU-KEY' => 'wpu123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
        // return $this->db->get('mahasiswa')->result_array();
    }

    public function getMahasiswaById($id)
    {
        // $client = new Client();

        $response = $this->_client->request('GET', 'mahasiswa', [
            'query' => [
                'WPU-KEY' => 'wpu123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
        // return $this->db->get_where('mahasiswaas', ['id' => $id])->row_array();
    }

    public function tambahDataMahasiswa() 
    {
        $response = $this->_client->request('POST', 'mahasiswa', [
            'form_params' => [
            "nama" => $this->input->post('nama'),
            "nrp" => $this->input->post('nrp'),
            "email" => $this->input->post('email'),
            "jurusan" => $this->input->post('jurusan'),
            'WPU-KEY' => 'wpu123'
                // 'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;

        // $data = [
        //     "nama" => $this->input->post('nama', true),
        //     "nrp" => $this->input->post('nrp', true),
        //     "email" => $this->input->post('email', true),
        //     "jurusan" => $this->input->post('jurusan', true)
        // ];

        // $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'WPU-KEY' => 'wpu123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa', ['id' => $id]);
    }
 


    public function ubahDataMahasiswa()
    {
        $response = $this->_client->request('PUT', 'mahasiswa', [
            'form_params' => [
            "id"    => $this->input->post('id'),
            "nama" => $this->input->post('nama'),
            "nrp" => $this->input->post('nrp'),
            "email" => $this->input->post('email'),
            "jurusan" => $this->input->post('jurusan'),
            'WPU-KEY' => 'wpu123'
                // 'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        // $data = [
        //     "nama" => $this->input->post('nama', true),
        //     "nrp" => $this->input->post('nrp', true),
        //     "email" => $this->input->post('email', true),
        //     "jurusan" => $this->input->post('jurusan', true)
        // ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}