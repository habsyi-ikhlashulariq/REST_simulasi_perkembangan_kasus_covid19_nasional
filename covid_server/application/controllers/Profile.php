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
    public function index()
    {
        $data['judul'] = 'My Profil';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_user' => $this->session->userdata('kd_user')])->row_array();
        $data['content'] = 'backend/profile/index';

        $this->load->view('backend/layout/layout', $data);
    }
    public function uploadPhoto()
    {
        $data['judul'] = 'Upload Photo';
        $data['pegawai'] = $this->db->get_where('tbl_pegawai', ['kd_user' => $this->session->userdata('kd_user')])->row_array();
        $data['user'] = $this->db->get_where('tbl_pegawai', ['kd_user' => $this->session->userdata('kd_user')])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('profil/uploadPhoto', $data);
            $this->load->view('templates/footer');
        }else {
            $this->ProfileModel->addPhoto();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('profil');
        }
    }
    public function changePass()
    {
        $data['judul'] = 'Change Password';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_user' => $this->session->userdata('kd_user')])->row_array();

        $this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', 'Ulangi Password', 'required|trim|matches[pass_baru]');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'backend/profile/changePass';

            $this->load->view('backend/layout/layout', $data);
        }else {
            $password_lama = $this->input->post('pass_lama');
            $password_baru = $this->input->post('pass_baru');

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
                redirect('profil/changePass');
            }else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                    role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama</div>');
                    redirect('profil/changePass');
                }else {
                    //pass
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('kd_user', $this->session->userdata('kd_user'));
                    $this->db->update('tbl_user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Anda Berhasil Mengganti Password</div>');
                    redirect('profil');
                }

            }

        }
    }

      
}


?>
