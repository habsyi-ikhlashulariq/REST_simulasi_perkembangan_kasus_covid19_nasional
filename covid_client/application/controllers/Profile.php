<?php 


class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kd_user') ) {
            redirect('Login');
        }else {
        $this->load->model('ProfileModel');
        $this->load->library('form_validation');
        }
    }
    public function index($id)
    {
        $data['judul'] = 'Profile';
        $data['content'] = '/profile/index';
        $data['profile'] = $this->ProfileModel->getProfile($id);

        $this->load->view('/layout/layout', $data);
    }
}


?>