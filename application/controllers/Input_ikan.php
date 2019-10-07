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
		$this->load->model('Data_tangkapan_ikan_model');
		$this->load->model('Rata_tangkapan_ikan_model');
		$this->load->model('Alat_tangkapan_ikan_model');
		$this->load->model('Lokasi_tangkapan_ikan_model');
	}
	
	public function index($sungai,$tahun)
	{
		$data['id_tahun'] = $tahun;
        $nama_sungai = $this->Sungai_model->get_by_id($sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($tahun)->tahun;
		$data['title'] = 'INPUT DATA PENANGKAPAN IKAN '.strtoupper($nama_sungai);
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Input Ikan' => '',
        ];
		$data['tahun'] = "TAHUN ".strtoupper($tahun);
        $data['action3'] = 'Cover';
        $data['code_js'] = 'Input/codejs';
        $data['page'] = 'Input/Ikan';
		$this->load->view('template/backend', $data);
	}

	public function saveStasiun(){
		$id=uniqid();
		$data = array(
			'id' => $id,
			'stasiun'  => $this->input->post('stasiun'), 
			'desa'  => $this->input->post('desa'), 
			'koordinat' => $this->input->post('koordinat'), 
		);
		$result=$this->Stasiun_model->insert($data);
		header('Content-type: application/json');
		echo json_encode($id);
	}

	public function saveDataIkan(){
		$ikan = $this->input->post('ikan');
		$hasil = $this->input->post('hasil');
		$ukuran = $this->input->post('ukuran');
		$i=0;
		foreach($ikan as $key => $value ) {
			if ($value!='' || $value!=null){
				$data = array(
					'id_stasiun' => $this->input->post('id_st'),
					'id_periode' => $this->input->post('id_periode'),
					'ikan'  => $value, 
					'hasil'  => $hasil[$i], 
					'ukuran' => $ukuran[$i]
				);
				$result=$this->Data_tangkapan_ikan_model->insert($data);
				$i++;
			}
		}
		echo json_encode($result);
	}

	public function saveDataRata(){
		$data = array(
			'id_stasiun' => $this->input->post('id_st'),
			'id_periode' => $this->input->post('id_periode'),
			'rata_rata' => $this->input->post('rata')
		);
		$result=$this->Rata_tangkapan_ikan_model->insert($data);
		header('Content-type: application/json');
		echo json_encode($result);
	}

	public function saveDataAlat(){
		$alat = $this->input->post('alat');
		$i=0;
		foreach($alat as $key => $value ) {
			if ($value!='' || $value!=null){
				$data = array(
					'id_stasiun' => $this->input->post('id_st'),
					'id_periode' => $this->input->post('id_periode'),
					'alat'  => $value
				);
				$result=$this->Alat_tangkapan_ikan_model->insert($data);
				$i++;
			}
		}
		echo json_encode($result);
	}

	public function saveDataLokasi(){
		$lokasi = $this->input->post('lokasi');
		$i=0;
		foreach($lokasi as $key => $value ) {
			if ($value!='' || $value!=null){
				$data = array(
					'id_stasiun' => $this->input->post('id_st'),
					'id_periode' => $this->input->post('id_periode'),
					'lokasi'  => $value
				);
				$result=$this->Lokasi_tangkapan_ikan_model->insert($data);
				$i++;
			}
		}
		echo json_encode($result);
	}

}
