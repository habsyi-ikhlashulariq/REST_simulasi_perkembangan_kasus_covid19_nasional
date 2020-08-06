<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasusHarian extends CI_Controller {

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
		$this->load->model('KasusharianModel');
		
        }
    }
	public function index()
	{
		$id= $this->session->userdata('kd_provinsi'); 
		$data['judul'] = 'Perkembangan Kasus';
		$data['kasus_harian'] = $this->KasusharianModel->getAllData();
		$data['content'] = 'kasus_harian/index';
		$this->load->view('layout/layout', $data);
	}
	public function hapus($id)
    {
        $this->KasusharianModel->deleteData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('kasusharian');
    }
}
