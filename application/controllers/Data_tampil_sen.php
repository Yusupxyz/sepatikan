<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_sen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
		$this->load->model('Parameter_sen_model');
		$this->load->model('Nilai_sen_model');
		$this->load->model('Data_sen_model');
	}
	
	public function index($id_sungai,$jenis_data,$id_tahun)
	{
		$data['options'] = $this->Sungai_model->get_option();
		$data['options2'] = $this->Jenis_data_model->get_option();
		$data['options3'] = $this->Tahun_model->get_option();
		$data['attribute'] = 'class="form-control inline" id="sungai"';
		$data['attribute2'] = 'class="form-control inline" id="jenis_data"';
		$data['attribute3'] = 'class="form-control inline" id="lokasi"';
		$data['attribute4'] = 'class="form-control inline" id="jd"';
		$data['attribute5'] = 'class="form-control inline" id="tahun"';
        $nama_sungai = $this->Sungai_model->get_by_id($id_sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($id_tahun)->tahun;
		$data['title'] = 'DATA SOSIAL EKONOMI NELAYAN <br>'.strtoupper($nama_sungai).'<br>'.$tahun;
		$data['subtitle'] = 'DATA TAHUN '.$tahun;
		$data['parameter'] = $this->Parameter_sen_model->get_all();
		foreach ($data['parameter'] as $key => $value) {
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_1);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_2);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_3);
		}
		$data['rata'] = $this->Data_sen_model->get_all_join();
		// print("<pre>".print_r($data['rata'],true)."</pre>");		
        $data['action2'] = 'data_tampil_ikan';
        $data['action3'] = 'data_tampil_ekologis';
        $data['action4'] = 'data_tampil_sen';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
		$this->load->view('Data/data_sen', $data);
	}

}
