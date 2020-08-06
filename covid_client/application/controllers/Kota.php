<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

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
			$this->load->model('KotaModel');
        	$this->load->library('form_validation');
        }
    }
	public function index()
	{
		$data['judul'] = 'Kota Yang Terpapar';
		$data['sub_provinsi'] = $this->KotaModel->getAllData();
		$data['content'] = 'kota/index';
		if ( $this->input->post('keyword')) {
			$data['sub_provinsi'] = $this->KotaModel->searchData();
		}

		$this->load->view('layout/layout', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('kd_provinsi', 'Provinsi', '');
        $this->form_validation->set_rules('nm_kota', 'Kota', 'required');
        $this->form_validation->set_rules('nm_kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('nm_kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('radius', 'Radius', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
		
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data Kota';
            $data['content'] = 'kota/tambah';
			$data['radius'] = [5000, 10000, 15000, 20000];
            $data['warna'] = ['red','yellow', 'blue', 'green'];

            $this->load->view('layout/layout', $data);
        }else{
			$this->KotaModel->addData();
			$this->KotaModel->addData2();
			$this->_sendEmail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('kota');
		}
	}
	public function hapus($id)
	{
		$this->KotaModel->deleteDataServer($id);
		$this->KotaModel->deleteData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Di Hapus</div>');
        redirect('Kota');
	}
	private function _sendEmail()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'jabarkorona@gmail.com',
			'smtp_pass' => '01092000@',
			'smtp_port' => 465,
			'mailtype' =>'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('jabarkorona@gmail.com', 'Covid Jawa Barat');
		$this->email->to('apdetkorona@gmail.com');
		$this->email->subject('Kota Baru');
		$this->email->message('Kota Baru Di Indonesia Di Provinsi Jawa Barat Berhasil Ditambahkan<br>'.'Kota : '.$this->input->post('nm_kota').'<br>Kabupaten : '.$this->input->post('nm_kab').'<br>Kecamatan : '.$this->input->post('nm_kec').'<br>Zona Warna : '.$this->input->post('warna'));

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}
	public function edit($id)
    {
        $this->form_validation->set_rules('kd_provinsi', 'Kode provinsi', 'required');
        $this->form_validation->set_rules('nm_kota', 'Nama Kota', 'required');
        $this->form_validation->set_rules('nm_kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('nm_kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude Wilayah', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude Wilayah', 'required');
        $this->form_validation->set_rules('radius', 'Radius', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');

        if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Edit Data Kota';
			$data['radius'] = [5000, 10000, 15000, 20000];
            $data['warna'] = ['red','yellow', 'blue', 'green'];
            $data['data_kota'] = $this->KotaModel->getDatabyId($id);
            $data['content'] = 'kota/edit';

            $this->load->view('layout/layout', $data);
        }else{
			$data=$this->KotaModel->updateData();
			$this->_sendEmailUpdate();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Update</div>');
            redirect('kota');
        }
	}
	private function _sendEmailUpdate()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'jabarkorona@gmail.com',
			'smtp_pass' => '01092000@',
			'smtp_port' => 465,
			'mailtype' =>'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('jabarkorona@gmail.com', 'Covid Jawa Barat');
		$this->email->to('apdetkorona@gmail.com');
		$this->email->subject('Update Kota');
		$this->email->message('Update Kota Indonesia Di Provinsi Jawa Barat Berhasil Ditambahkan<br>'.'Kota : '.$this->input->post('nm_kota').'<br>Kabupaten : '.$this->input->post('nm_kab').'<br>Kecamatan : '.$this->input->post('nm_kec').'<br>Zona Warna : '.$this->input->post('warna'));

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}
    
}
