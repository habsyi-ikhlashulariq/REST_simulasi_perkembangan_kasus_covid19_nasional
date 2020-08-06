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
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kd_user') ) {
            redirect('Login');
        }else {
			$this->load->library('form_validation');
			$this->load->model('FrontendModel');
        }
    }
	public function index()
	{
		$data['judul'] = 'Perkembangan Kasus';
		$data['content'] = 'layout/index';

		$this->load->view('layout/layout', $data);
	}
	public function logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('kd_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('avatar');
		$this->session->unset_userdata('kd_provinsi');
		redirect('Login');
	}

}
