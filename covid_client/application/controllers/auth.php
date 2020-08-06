<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

	
	}
	public function index()
	{
		if($this->session->userdata('email')){
			redirect('welcome/login_user');
		}
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password','trim|required');

		if($this->form_validation->run() == false){
		$data['title'] = 'Login Page';
		$this->load->view('template/header', $data);
		$this->load->view('auth/form_login');
		}else{
			//validnya lolos
			$this->_login();
		}
		
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$user = $this->db->get_where('tbl_user',['email' => $email])->row_array();

		//jika user ada
		if($user){
			//jika user aktif
			if($user['is_active'] == 1){
				//cek pass
				if(password_verify($password, $user['password'])){
					$data = [
						'email' =>$user['email'],
						'role_id'=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id']==1){
						redirect('admin/dashboard_admin');
					}else{
						redirect('welcome/login_user');	
					}
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong password</div>');
		redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> This Email has not been activated</div>');
		redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Email is not registered</div>');
		redirect('auth');

		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email','email', 'required|trim|valid_email|is_unique[tbl_user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length'=> 'password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if($this->form_validation->run() == false) {
		$data['title'] = 'User Registration';
		$this->load->view('template/header',$data);
		$this->load->view('auth/registration');
	} else {
		$email = $this->input->post('email', true);
		$data = [
			'name'			=>htmlspecialchars($this->input->post('name', true)),
			'email'			=>htmlspecialchars($email),
			'image'			=> 'default.jpg',
			'password'		=>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id'		=>2,
			'is_active' 	=>0,
			'date_created'	=> time()
		];

			//siapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('tbl_user', $data);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail($token, 'verify');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation Your account has been created. please Activate your account</div>');
		redirect('auth');
	}
	}


	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'tbuku0962@gmail.com',
			'smtp_pass' => 'D181296y',
			'smtp_port' => 465,
			'mailtype' =>'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('tbuku0962@gmail.com', 'Toko Buku');
		$this->email->to($this->input->post('email'));
		if($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="'.base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
		}

		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');;

		$user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();
			if($user_token){
				if(time()-$user_token['date_created'] < (60*60*24)){
					$this->db->set('is_active', 1);
					$this->db->where('email',$email);
					$this->db->update('tbl_user');

					$this->db->delete('user_token',['email' => $email]);

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Has been activated! Please Login</div>');
		redirect('auth');
				}
					else{

						$this->db->delete('tbl_user', ['email' => $email]);
						$this->db->delete('user_token',['email'=> $email]);

						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Account activation failed ! Token Expired</div>');
		redirect('auth');
					}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Account activation failed ! wrong token</div>');
		redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Account activation failed ! wrong email</div>');
		redirect('auth');
		}
	}




	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> You have been logged out</div>');
		redirect('welcome');

	}
	
}