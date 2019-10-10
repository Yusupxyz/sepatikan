<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deskripsi_sistem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Deskripsi_model');
	}
	
	public function index()
	{
		$data['deskripsi'] = $this->Deskripsi_model->get_all();
		$data['title'] = 'DESKRIPSI SISTEM';
		$this->load->view('Deskripsi_sistem/index', $data);
	}

}
