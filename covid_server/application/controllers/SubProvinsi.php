<?php 

class SubProvinsi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kd_user') ) {
            redirect('Login');
        }else {
        $this->load->model('SubProvinsiModel');
        $this->load->library('form_validation');
        }
    }
    public function index()
	{
        $data['judul'] = 'Data Kota / Kabupaten';
        $data['sub_provinsi'] = $this->SubProvinsiModel->getAllData();
		$data['content'] = 'backend/subprovinsi/index';

		if ( $this->input->post('keyword')) {
            $data['sub_provinsi'] = $this->SubProvinsiModel->searchData();
        }

		$this->load->view('backend/layout/layout', $data);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('nm_provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('nm_kota', 'KOta', 'required');
        $this->form_validation->set_rules('nm_kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('nm_kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('radius', 'Radius', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tambah Data Perkota / Kabupaten';
            $data['provinsi'] = $this->SubProvinsiModel->getDataProvinsi();
            $data['content'] = 'backend/subprovinsi/tambah';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->SubProvinsiModel->addData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Di Tambah</div>');
            redirect('subprovinsi');
        }
    }
    public function hapus($id)
    {
        $this->SubProvinsiModel->deleteData($id);
        $this->_sendEmail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Data Berhasil Di Hapus</div>');
        redirect('subprovinsi');
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nm_provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('nm_kota', 'KOta', 'required');
        $this->form_validation->set_rules('nm_kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('nm_kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('radius', 'Radius', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Edit Data Kasus';
            $data['sub_provinsi'] = $this->SubProvinsiModel->getDatabyId($id);
            $data['provinsi'] = $this->SubProvinsiModel->getDataProvinsi();
			$data['content'] = 'backend/subprovinsi/edit';

            $this->load->view('backend/layout/layout', $data);
        }else{
            $this->SubProvinsiModel->updateData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">1 Data Berhasil Di Update</div>');
            redirect('subprovinsi');
        }
    }
    private function _sendEmail($id)
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
		$this->email->subject('Hapus Kota');
		$this->email->message('Kota Dnegan id <b>'.$id.'</b> di Jawa Barat di hapus Server');

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}
    
}


?>