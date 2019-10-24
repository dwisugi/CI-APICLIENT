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
                'Auth' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
        // return $this->db->get('mahasiswa')->result_array();
    }

        public function getDataSantriById($id)
    {
        // $client = new Client();

        $response = $this->_client->request('GET', 'rest', [
            'query' => [
                'id' => $id,
                'Auth' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
        // return $this->db->get_where('mahasiswaas', ['id' => $id])->row_array();
    }
}