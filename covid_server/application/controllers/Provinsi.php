<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

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
		$this->load->model('ProvinsiModel');
        $this->load->library('form_validation');
        }
    }

	public function index()
	{
        $data['judul'] = 'Data Provinsi';
        $data['data_wilayah'] = $this->ProvinsiModel->getAllData();
		$data['content'] = 'backend/provinsi/index';

		if ( $this->input->post('keyword')) {
            $data['data_wilayah'] = $this->ProvinsiModel->searchData();
        }

		$this->load->view('backend/layout/layout', $data);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('nm_provinsi', 'Nama Provinsi', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude Provinsi', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude Provinsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data Provinsi';
			$data['content'] = 'backend/provinsi/tambah';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->ProvinsiModel->addData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('provinsi');
        }
    }
    public function hapus($id)
    {
        $this->ProvinsiModel->deleteData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('provinsi');
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nm_provinsi', 'Nama Provinsi', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude Provinsi', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude Provinsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Edit Data Provinsi';
            $data['provinsi'] = $this->ProvinsiModel->getDatabyId($id);
			$data['content'] = 'backend/provinsi/edit';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->ProvinsiModel->updateData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">1 Data Berhasil Di Update</div>');
            redirect('provinsi');
        }
    }
}
