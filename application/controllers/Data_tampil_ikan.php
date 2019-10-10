<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_ikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
        $this->load->model('Rata_tangkapan_ikan_model');
        $this->load->model('Data_tangkapan_ikan_model');
        $this->load->model('Alat_tangkapan_ikan_model');
        $this->load->model('Lokasi_tangkapan_ikan_model');
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
		$data['title'] = 'Data Penangkapan Ikan '.ucfirst($nama_sungai).' Tahun '.$tahun;
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		// print("<pre>".print_r($data['data_alat_hujan'],true)."</pre>");
        $data['codejs'] = 'cover/codejs';
        $data['action'] = 'auth';
        $data['action'] = 'data';
		$this->load->view('Data/data_penangkapan_ikan', $data);
	}

}
