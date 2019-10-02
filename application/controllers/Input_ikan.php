<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_ikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->model('Sungai_model');
		$this->load->model('Tahun_model');
		$this->load->model('Stasiun_model');
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
        $data['action3'] = 'Cover';
        $data['code_js'] = 'Input/codejs';
        $data['page'] = 'Input/Ikan';
		$this->load->view('template/backend', $data);
	}

	public function saveStasiun(){
		$data = array(
			'stasiun'  => $this->input->post('stasiun'), 
			'desa'  => $this->input->post('desa'), 
			'koordinat' => $this->input->post('koordinat'), 
		);
		$result=$this->Stasiun_model->insert($data);
		echo json_encode($result);
	}

	public function saveDataIkan(){
		$name = $this->input->post('name');

		foreach($name as $key ) {
			$data = array(
				'id_stasiun' => $id,
				'id_periode' => $id,
				'stasiun'  => $name, 
				'desa'  => $this->input->post('desa'), 
				'koordinat' => $this->input->post('koordinat'), 
			);
			$result=$this->Stasiun_model->insert($data);
		}
		echo json_encode($result);
	}

}
