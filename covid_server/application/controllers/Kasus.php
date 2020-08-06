<?php 

class Kasus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kd_user') ) {
            redirect('Login');
        }else {
        $this->load->model('KasusModel');
        $this->load->library('form_validation');
        }
    }
    public function index()
	{
        $data['judul'] = 'Data Kasus';
        $data['data_kasus'] = $this->KasusModel->getAllData();
		$data['content'] = 'backend/kasus/index';

		if ( $this->input->post('keyword')) {
            $data['data_kasus'] = $this->KasusModel->searchData();
        }

		$this->load->view('backend/layout/layout', $data);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('positif', 'Positif', 'required');
        $this->form_validation->set_rules('sembuh', 'Sembuh', 'required');
        $this->form_validation->set_rules('meninggal', 'Meninggal', 'required');
        $this->form_validation->set_rules('dirawat', 'Dirawat', 'required');
        $this->form_validation->set_rules('pdp', 'PDP', 'required');
        $this->form_validation->set_rules('odp', 'ODP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data Kasus';
            $data['provinsi'] = $this->KasusModel->getDataProvinsi();
            $data['content'] = 'backend/kasus/tambah';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->KasusModel->addData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('kasus');
        }
    }
    public function hapus($id)
    {
        $this->KasusModel->deleteData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('kasus');
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('positif', 'Positif', 'required');
        $this->form_validation->set_rules('sembuh', 'Sembuh', 'required');
        $this->form_validation->set_rules('meninggal', 'Meninggal', 'required');
        $this->form_validation->set_rules('dirawat', 'Dirawat', 'required');
        $this->form_validation->set_rules('pdp', 'PDP', 'required');
        $this->form_validation->set_rules('odp', 'ODP', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Edit Data Kasus';
            $data['kasus'] = $this->KasusModel->getDatabyId($id);
            $data['provinsi'] = $this->KasusModel->getDataProvinsi();
			$data['content'] = 'backend/kasus/edit';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->KasusModel->updateData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">1 Data Berhasil Di Update</div>');
            redirect('Kasus');
        }
    }
    
}


?>