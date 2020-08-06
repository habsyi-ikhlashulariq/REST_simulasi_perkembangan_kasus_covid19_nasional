<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Subprovinsi extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubProvinsiModel');
        $this->methods['index_get']['limit'] = 10;
    }
    public function index_get()
    {
        $id=$this->get('id');

        if ($id === null) {
            $subprovinsi = $this->SubProvinsiModel->getAllSubProvinsiRest();
        }else{
            $subprovinsi = $this->SubProvinsiModel->getAllSubProvinsiRest($id);
        }
        if ($subprovinsi) {
            $this->response([
                'status' => true,
                'data' => $subprovinsi
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'ID Subprovinsi not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id= $this->delete('id');
        if ($id == null) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an Id',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->SubProvinsiModel->deleteSubProvinsiRest($id) > 0) {
                $this->response([
                    'status' => true,
                    'id'=>$id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'ID Subprovinsi not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_post()
    {
        $data =[
            'kd_provinsi' => $this->post('kd_provinsi'),
            'nm_kota' => $this->post('nm_kota'),
            'nm_kab' => $this->post('nm_kab'),
            'nm_kec' => $this->post('nm_kec'),
            'latitude' => $this->post('latitude'),
            'longitude' => $this->post('longitude'),
            'radius' => $this->post('radius'),
            'warna' => $this->post('warna')
        ];         
        if ($this->SubProvinsiModel->createdSubProvinsiRest($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Subprovinsi has been'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'failed to create data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
}

?>