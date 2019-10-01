<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_ikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->model('Sungai_model');
        $this->load->model('Tahun_model');
	}
	
	public function index($sungai,$tahun)
	{
        $nama_sungai = $this->Sungai_model->get_by_id($sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($tahun)->tahun;
		$data['title'] = 'INPUT DATA PENANGKAPAN IKAN '.strtoupper($nama_sungai);
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Input Ikan' => '',
        ];
		$data['tahun'] = "TAHUN ".strtoupper($tahun);
        //$this->layout->set_privilege(1);
        // $data['code_js'] = 'Dashboard/codejs';
        $data['page'] = 'Input/Ikan';
		$this->load->view('template/backend', $data);
	}

}
