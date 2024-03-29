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
	
	public function index($id_user,$sungai,$id_tahun)
	{
		$status=false;
		$data['id_tahun'] = $id_tahun;
		$data['id_sungai'] = $sungai;
		$data['id_user'] = $id_user;
        $nama_sungai = $this->Sungai_model->get_by_id($sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($id_tahun)->tahun;
		$data['title'] = 'INPUT DATA PENANGKAPAN IKAN '.strtoupper($nama_sungai);
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Input Ikan' => '',
		];
		for ($i=1; $i < 5; $i++) { 
			$stasiun[]=$this->Stasiun_model->get_by('1',$sungai,$id_tahun,$id_user,$i);
		}
		foreach ($stasiun as $key => $value) {
			if (isset($value->id)){
				$ikan=$this->Data_tangkapan_ikan_model->get_by_id_stasiun($value->id);
				$rata=$this->Rata_tangkapan_ikan_model->get_by_id_stasiun($value->id);
				$alat=$this->Alat_tangkapan_ikan_model->get_by_id_stasiun($value->id);
				$lokasi=$this->Lokasi_tangkapan_ikan_model->get_by_id_stasiun($value->id);
				$status=true;
			}
		}
		if (isset($stasiun))
			$data['stasiun'] = $stasiun;
		if (isset($ikan))		
			$data['ikan'] = $ikan;
		if (isset($rata))
			$data['rata'] = $rata;
		if (isset($alat))	
			$data['alat'] = $alat;
		if (isset($lokasi))	
			$data['lokasi'] = $lokasi;
		// print("<pre>".print_r($data['ikan'],true)."</pre>");		
		$data['tahun'] = "TAHUN ".strtoupper($tahun);
		$data['action3'] = 'Cover';
		if ($status){
			$data['code_js'] = 'Input_ikan/codejs_update';
			$data['page'] = 'Input_ikan/Ikan_update';
		}else{
			$data['code_js'] = 'Input_ikan/codejs';
        	$data['page'] = 'Input_ikan/Ikan';
		}
        
		$this->load->view('template/backend', $data);
	}

	public function saveStasiun(){
		$id=uniqid();
		$data = array(
			'id' => $id, 
			'id_jenis_data' => '1',
			'stasiun'  => $this->input->post('stasiun'), 
			'desa'  => $this->input->post('desa'), 
			'koordinat' => $this->input->post('koordinat'), 
			'id_sungai' => $this->input->post('id_sungai'), 
			'id_tahun' => $this->input->post('id_tahun'), 
			'id_periode' => $this->input->post('id_periode'), 
			'id_user' => $this->input->post('id_user')
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
					'lokasi'  => $value
				);
				$result=$this->Lokasi_tangkapan_ikan_model->insert($data);
				$i++;
			}
		}
		echo json_encode($result);
	}

}
