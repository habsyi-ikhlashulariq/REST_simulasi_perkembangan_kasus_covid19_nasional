<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus extends CI_Controller {

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
		$this->load->model('KasusModel');
		
        }
    }
	public function index()
	{
		$id= $this->session->userdata('kd_provinsi'); 
		$data['judul'] = 'Perkembangan Kasus';
		$data['data_kasus'] = $this->KasusModel->getDatabyId($id);
		$data['content'] = 'kasus/index';
		$this->load->view('layout/layout', $data);
	}
	public function edit($id)
    {
        $this->form_validation->set_rules('kd_provinsi', 'Jumlah Positif', 'required');
        $this->form_validation->set_rules('positif', 'Jumlah Positif', 'required');
        $this->form_validation->set_rules('sembuh', 'Jumlah Sembuh', 'required');
        $this->form_validation->set_rules('meninggal', 'Jumlah Meninggal', 'required');
        $this->form_validation->set_rules('dirawat', 'Jumlah Dirawat', 'required');
        $this->form_validation->set_rules('pdp', 'Jumlah PDP', 'required');
        $this->form_validation->set_rules('odp', 'Jumlah ODP', 'required');
        $this->form_validation->set_rules('update_at', 'Tanggal Update', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Update Data Kasus';
            $data['kasus'] = $this->KasusModel->getDatabyId($id);
			$data['content'] = 'kasus/edit';

            $this->load->view('layout/layout', $data);
        }else{

            $this->KasusModel->updateData();
			$this->KasusModel->addData();
			$this->_sendEmail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Update</div>');
            redirect('kasus');
        }
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

		$this->email->from('jabarkorona@gmail.com', 'Apdate Data Korona Provinsi');
		$this->email->to('apdetkorona@gmail.com');
		$this->email->subject('Update Kasus');
		$this->email->message('Update Terbaru Kasus Covid Di Jawa Barat per tanggal '.$this->input->post('update_at').': <br>'.'Jumlah Positif : '.$this->input->post('positif').'<br>Jumlah Sembuh : '.$this->input->post('sembuh').'<br>Jumlah Meninggal : '.$this->input->post('meninggal').'<br>Jumlah PDP : '.$this->input->post('pdp').'<br>Jumlah ODP : '.$this->input->post('odp'));

		
		if($this->email->send()) {
			return true;
		}else{

			echo $this->email->print_debugger();
			die;
			
		}
	}
    
}
