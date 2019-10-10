<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_ekologis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
        $this->load->model('Paramter_ekologis_model');
        $this->load->model('Data_ekologis_model');
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
		$data['title'] = 'DATA EKOLOGIS '.$tahun.'<br>'.strtoupper($nama_sungai);
		$data['subtitle'] = 'DATA TAHUN '.$tahun;
		$data['parameter'] = $this->Paramter_ekologis_model->get_all();
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		// print("<pre>".print_r($data['data1'],true)."</pre>");		
        $data['action2'] = 'data_tampil_ikan';
        $data['action3'] = 'data_tampil_ekologis';
        $data['action4'] = 'data_tampil_sen';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
		$this->load->view('Data/data_ekologis', $data);
	}

}
