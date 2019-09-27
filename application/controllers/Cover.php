<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cover extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->library('form_validation');
	}
	
	public function index()
	{
        $data['options'] = array(
						'0' => '--Pilih--',
						'1' => 'Sungai Katingan',
						'2' => 'Sungai Sebangau'
						);
		$data['options2'] = array(
						'0' => '--Pilih--',
						'1' => 'Data Penangkapan Ikan',
						'2' => 'Data Ekologis/Lingkungan',
						'3' => 'Data Sosisal Ekonomi Nelayan'
						);
		$data['options3'] = array(
			'0' => '--Pilih--',
			);
		$data['attribute'] = 'class="form-control inline select2" ';
		$data['attribute2'] = 'class="form-control" placeholder="Masukkan Username" ';
		$data['attribute3'] = 'class="form-control" placeholder="Masukkan Password" ';
        $data['modal'] = 'Cover/modal';
		$this->load->view('Cover/index', $data);
	}

}
