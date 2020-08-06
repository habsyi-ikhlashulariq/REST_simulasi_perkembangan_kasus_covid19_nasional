<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->methods['index_get']['limit'] = 10;
    }
    public function index_get()
    {
        $id=$this->get('id');

        if ($id === null) {
            $User = $this->UserModel->getAllUserRest();
        }else{
            $User = $this->UserModel->getAllUserRest($id);
        }
        if ($User) {
            $this->response([
                'status' => true,
                'data' => $User
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'ID User not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data =[
            'kd_user' => $this->post('kd_user'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'status' => $this->post('status'),
            'avatar' => $this->post('avatar'),
            'kd_provinsi' => $this->post('kd_provinsi')
        ];         
        if ($this->UserModel->createdUserRest($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new User has been'
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