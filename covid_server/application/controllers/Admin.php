<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function index()
	{        if (!$this->session->userdata('kd_user') ) {
		redirect('Login');
	}else {
        $data['judul'] = 'Dashboard';
        $data['content'] = 'backend/layout/index';

		$this->load->view('backend/layout/layout', $data);
	}
	}
	public function logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('kd_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('avatar');
		redirect('Login');
	}

}
