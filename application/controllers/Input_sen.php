<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_sen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->model('Sungai_model');
		$this->load->model('Tahun_model');
		$this->load->model('Stasiun_model');
		$this->load->model('Data_sen_model');
		$this->load->model('Parameter_sen_model');
		$this->load->model('Nilai_sen_model');
	}
	
	public function index($sungai,$tahun)
	{
		$data['id_tahun'] = $tahun;
		$data['id_sungai'] = $sungai;
        $nama_sungai = $this->Sungai_model->get_by_id($sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($tahun)->tahun;
		$data['title'] = 'INPUT DATA SOSIAL EKONOMI NELAYAN '.strtoupper($nama_sungai);
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Input SOSIAL EKONOMI NELAYAN' => '',
        ];
		$data['tahun'] = "TAHUN ".strtoupper($tahun);
		$data['parameter'] = $this->Parameter_sen_model->get_all();
		foreach ($data['parameter'] as $key => $value) {
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_1);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_2);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_3);
		}
		// print("<pre>".print_r($data['nilai_parameter'],true)."</pre>");
        $data['action3'] = 'Cover';
        $data['code_js'] = 'Input_sen/codejs';
        $data['page'] = 'Input_sen/sen';
		$this->load->view('template/backend', $data);
	}

	public function saveStasiun(){
		$id=uniqid();
		$data = array(
			'id' => $id,
			'id_jenis_data' => '2',
			'stasiun'  => $this->input->post('stasiun'), 
			'desa'  => $this->input->post('desa'), 
			'koordinat' => $this->input->post('koordinat'), 
			'id_sungai' => $this->input->post('id_sungai'), 
			'id_tahun' => $this->input->post('id_tahun'), 
			'id_periode' => $this->input->post('id_periode'), 
		);
		$result=$this->Stasiun_model->insert($data);
		header('Content-type: application/json');
		echo json_encode($id);
	}

	public function saveDataSen(){
		$data = $this->input->post('data');
		$id_parameter = $this->input->post('id_parameter');
		$i=0;
		foreach($data as $key => $value ) {
			if ($value!='' || $value!=null){
				$data_sen = array(
					'id_stasiun' => $this->input->post('id_st'),
					'id_parameter'  => $id_parameter[$i],
					'id_nilai'  => $value
				);
				$result=$this->Data_sen_model->insert($data_sen);
				$i++;
			}
		}
		echo json_encode($result);
	}

}
