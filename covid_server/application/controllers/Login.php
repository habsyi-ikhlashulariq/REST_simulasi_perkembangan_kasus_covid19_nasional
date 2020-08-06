<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('backend/login/index');
		}else {
			$this->_login();
		}

	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tbl_login', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'kd_user' => $user['kd_user'],
					'avatar' => $user['avatar']
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('flash', 'Selamat Datang ');
				redirect('admin');
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
				role="alert">Password Salah</div>');
				redirect('Login');
			}
		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
			role="alert">Email Tidak Terdaftar </div>');
			redirect('Login');
		}
	}


}
