<?php 

class Tampilan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('TampilanModel');
        $this->load->library('form_validation');
    }
    public function index()
	{
        $data['judul'] = 'Dashboard';
        $data['data_kasus'] = $this->TampilanModel->getAllData();
        $data['content'] = 'frontend/data/index';
        $data['countPositif'] = $this->TampilanModel->countPositif();
        $data['countSembuh'] = $this->TampilanModel->countSembuh();
        $data['countMeninggal'] = $this->TampilanModel->countMeninggal();
        $data['countDirawat'] = $this->TampilanModel->countDirawat();
        $data['countPDP'] = $this->TampilanModel->countPDP();
        $data['countODP'] = $this->TampilanModel->countODP();

		if ( $this->input->post('keyword')) {
            $data['data_wilayah'] = $this->TampilanModel->searchData();
        }

		$this->load->view('frontend/layout/layout', $data);
	}
     public function pemetaan()
     {
        $data['pemetaan'] = $this->TampilanModel->getAllData();
		$data['content'] = 'frontend/data/pemetaan';
        $this->load->view('frontend/layout/layout', $data);
     }
}


?>