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
		$data['content'] = 'backend/user/index';
        
		if ( $this->input->post('keyword')) {
            $data['user'] = $this->UserModel->searchData();
        }

		$this->load->view('backend/layout/layout', $data);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('avatar', 'Avatar', 'required');

        
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data User';
            $data['content'] = 'backend/user/tambah';
            $data['provinsi'] = $this->UserModel->getAllDataProvinsi();

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->UserModel->addData();
            $this->_sendEmail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('user');
        }
    }
    public function hapus($id)
    {
        $this->UserModel->deleteData($id);
        $this->_sendEmailUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('User');
    }
    private function _sendEmail()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'apdetkorona@gmail.com',
			'smtp_pass' => '01092000@',
			'smtp_port' => 465,
			'mailtype' =>'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('apdetkorona@gmail.com', 'Covid Nasional');
		$this->email->to($this->input->post('username'));
		$this->email->subject('Aktifaksi Akun');
		$this->email->message('Aktifasi untuk wilayah anda dengan<br>Email : '.$this->input->post('username').'<br>Password Default : 12345');

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
    }
    private function _sendEmailUser($id)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'apdetkorona@gmail.com',
			'smtp_pass' => '01092000@',
			'smtp_port' => 465,
			'mailtype' =>'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('apdetkorona@gmail.com', 'Covid Nasional');
		$this->email->to('jabarkorona@gmail.com');
		$this->email->subject('Hapus Akun');
        $this->email->message('Hapus Akun dengan Id <b>'.$id.'</b> Jawa Barat Di Hapus Dari Pengumpulan Data Covid Nasional');

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}
    
}


?>