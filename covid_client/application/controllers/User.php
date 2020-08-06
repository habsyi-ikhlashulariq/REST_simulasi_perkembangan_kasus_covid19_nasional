<?php 

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kd_user') ) {
            redirect('Login');
        }else {
        $this->load->model('UserModel');
        $this->load->library('form_validation');
        }
    }
    public function index()
	{
        $data['judul'] = 'Data User';
        $data['user'] = $this->UserModel->getAllData();
		$data['content'] = 'user/index';
        
		if ( $this->input->post('keyword')) {
            $data['user'] = $this->UserModel->searchData();
        }

		$this->load->view('layout/layout', $data);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('avatar', 'Avatar', 'required');

        
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data User';
            $data['content'] = 'user/tambah';

            $this->load->view('layout/layout', $data);
        }else{
            $this->UserModel->addData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('user');
        }
    }
    public function hapus($id)
    {
        $this->UserModel->deleteData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('User');
    }
    
}


?>