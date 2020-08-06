<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';



class Kasus extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KasusModel');
    }
    public function index_get()
    {
        $id=$this->get('id');

        if ($id === null) {
            $kasus = $this->KasusModel->getAllKasusRest();
        }else{
            $kasus = $this->KasusModel->getAllKasusRest($id);
        }
        if ($kasus) {
            $this->response([
                'status' => true,
                'data' => $kasus
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'ID Kasus not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $kd_provinsi= $this->put('kd_provinsi');
            $data =[
                'positif' => $this->put('positif'),
                'sembuh' => $this->put('sembuh'),
                'meninggal' => $this->put('meninggal'),
                'dirawat' => $this->put('dirawat'),
                'pdp' => $this->put('pdp'),
                'odp' => $this->put('odp')
            ]; 
     
        if ($this->KasusModel->updateKasusRest($data, $kd_provinsi) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Kasus has been updated'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }
    
}



?>