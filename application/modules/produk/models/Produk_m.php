<?php 

class Produk_m extends CI_model {

    private $_client;
 
    public function __construct()
    {

    }


    public function getData()
    {
            // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "http://localhost/api/rest?Auth=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $result = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      
    $profile = json_decode($result, TRUE);
    // menampilkan hasil curl
    return $profile['data'];
        // // $client = new Client();
        // $response = $this->_client->request('GET', 'rest', [
        //     'query' => [
        //         'Auth' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0'
        //     ]
        // ]);

        // $result = json_decode($response->getBody()->getContents(), true);

        // return $result['data'];
        // return $this->db->get('mahasiswa')->result_array();
    }

        public function getDataById($id)
    {
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://localhost/api/rest?id=".$id."&Auth=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0");
    
        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
        // $output contains the output string 
        $result = curl_exec($ch); 
    
        // tutup curl 
        curl_close($ch);      
        $profile = json_decode($result, TRUE);
        // menampilkan hasil curl
        return $profile['data'][0];
        // $client = new Client();

        // $response = $this->_client->request('GET', 'rest', [
        //     'query' => [
        //         'id' => $id,
        //         'Auth' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyIxIl0.99fx5G2WyWK9DVyGPljG3eIJgz1y5f5bwnqMkgXd6c0'
        //     ]
        // ]);

        // $result = json_decode($response->getBody()->getContents(), true);

        // return $result['data'][0];
        // return $this->db->get_where('mahasiswaas', ['id' => $id])->row_array();
    }
}