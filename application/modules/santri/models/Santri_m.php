<?php 
use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

class Santri_m extends CI_model {

    private $_client;
 
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/api/rest/'
            // 'base_uri' => 'http://localhost/RestApiCiEdit/api/',
            // 'auth' => ['admin', '1234']
        ]);
    }


    public function getDataSantri()
    {
        // $client = new Client();
        $response = $this->_client->request('GET', 'rest', [
            'query' => [
                'Auth' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIyIl0.-JlfhRqxoMRu8uyVgdUHI0rAbezYFIq9GyPLJ4EF08o'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        // return $this->db->get('mahasiswa')->result_array();
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
}