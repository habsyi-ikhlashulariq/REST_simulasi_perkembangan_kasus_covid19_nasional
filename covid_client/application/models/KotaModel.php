<?php 

use GuzzleHttp\Client;

class KotaModel extends CI_Model
{
  private $_client;
  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://localhost/covid_server/api/',
      'auth' =>['admin', '1234']
    ]);
  }
  public function getAllDataServer()
  {
    $response = $this->_client->request('GET', 'subprovinsi',[
      'query'=> ['key'=>'rahasia']
      ]);
      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data'];
  }
  public function getAllData()
  {
    return $this->db->get('tb_kota')->result_array();
  }
  public function getDatabyIdServer($id)
  {
    $response = $this->_client->request('GET', 'subprovinsi',[
      'query'=> ['key'=>'rahasia', 'id'=>$id]
      ]);
      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data'];
  } 
  public function getDatabyId($id)
  {
      return $this->db->get_where('tb_kota', ['id'=> $id])->row_array();
  }
  public function addData()
  {
    $data = [
      "kd_provinsi" => $this->input->post('kd_provinsi'),
      "nm_kota" => $this->input->post('nm_kota'),
      "nm_kab" => $this->input->post('nm_kab'),
      "nm_kec" => $this->input->post('nm_kec'),
      "latitude" => $this->input->post('latitude'),
      "longitude" => $this->input->post('longitude'),
      "radius" => $this->input->post('radius'),
      "warna" => $this->input->post('warna'),

      'key'=> 'rahasia'
      
    ];
    $response = $this->_client->request('POST', 'subprovinsi',[
      'form_params'=> $data]);

    $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    // $this->db->insert('tb_kota', $data);
  }
  public function addData2()
  {
    $data = [
      "nm_kota" => $this->input->post('nm_kota'),
      "nm_kab" => $this->input->post('nm_kab'),
      "nm_kec" => $this->input->post('nm_kec'),
      "latitude" => $this->input->post('latitude'),
      "longitude" => $this->input->post('longitude'),
      "radius" => $this->input->post('radius'),
      "warna" => $this->input->post('warna')    
    ];

    $this->db->insert('tb_kota', $data);
  }
  public function deleteDataServer($id)
  {
    $response = $this->_client->request('DELETE', 'subprovinsi',[
      'form_params'=> [
          'key'=>'rahasia', 
          'id'=>$id ]
      ]);
      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
    // $this->db->delete('tbl_penyebaran', ['id'=> $id]);
  }
  public function deleteData($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('tbl_kota');
  }
  public function updateData()
  {
      $data = [
          "nm_kota" => $this->input->post('nm_kota'),
          "nm_kab" => $this->input->post('nm_kab'),
          "nm_kec" => $this->input->post('nm_kec'),
          "latitude" => $this->input->post('latitude'),
          "longitude" => $this->input->post('longitude'),
          "radius" => $this->input->post('radius'),
          "warna" => $this->input->post('warna')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('tb_kota', $data);
             
  }

  public function searchData()
  {
      $keyword = $this->input->post('keyword', true);
      $this->db->like('nm_kota', $keyword);
      $this->db->or_like('nm_kab', $keyword);
      $this->db->or_like('nm_kec', $keyword);
      $this->db->or_like('warna', $keyword);


      $query = $this->db->get('tb_kota')->result_array();
      return $query;
  }
}


?>

