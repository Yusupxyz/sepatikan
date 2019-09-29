<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cover extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
	}
	
	public function index()
	{
        $data['options'] = $this->Sungai_model->get_option();
		$data['options2'] = $this->Jenis_data_model->get_option();
		$data['attribute'] = 'class="form-control inline" id="sungai"';
		$data['attribute2'] = 'class="form-control inline" id="jenis_data"';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
        $data['action'] = 'auth';
		$this->load->view('Cover/index', $data);
	}

}
