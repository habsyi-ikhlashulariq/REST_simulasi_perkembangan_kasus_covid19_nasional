<?php 

use GuzzleHttp\Client;

class KasusModel extends CI_Model
{
  private $_client;
  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://localhost/covid_server/api/',
    ]);
  }
  public function getAllData()
  {
    $response = $this->_client->request('GET', 'Kasus',[
      'query'=> ['key'=>'rahasia']
      ]);
      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data'];
  }
  public function getDatabyId($id)
  {
    $response = $this->_client->request('GET', 'Kasus',[
      'query'=> ['key'=>'rahasia', 'id'=>$id]
      ]);
      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data'];
  }  


  public function updateData()
  {
    $data = [
      "positif" => $this->input->post('positif'),
      "sembuh" => $this->input->post('sembuh'),
      "meninggal" => $this->input->post('meninggal'),
      "dirawat" => $this->input->post('dirawat'),
      "pdp" => $this->input->post('pdp'),
      "odp" => $this->input->post('odp'),
      "kd_provinsi" => $this->input->post('kd_provinsi'),
      "key" => 'rahasia'
    ];
    $response = $this->_client->request('PUT', 'Kasus',[
      'form_params'=> $data]);

  $result = json_decode($response->getBody()->getContents(), true);
      return $result;
  }
  public function addData()
  {
    $data = [
      "positif" => $this->input->post('positif'),
      "sembuh" => $this->input->post('sembuh'),
      "meninggal" => $this->input->post('meninggal'),
      "dirawat" => $this->input->post('dirawat'),
      "pdp" => $this->input->post('pdp'),
      "odp" => $this->input->post('odp'),
      "update_at" => $this->input->post('update_at')
    ]; 

    $this->db->insert('tb_kasus', $data);
  }
}


?>

