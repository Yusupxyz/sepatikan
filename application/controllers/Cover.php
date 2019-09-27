<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cover extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		// $data['subtitle'] = '';
        // $data['crumb'] = [
        //     'Dashboard' => '',
        // ];
        //$this->layout->set_privilege(1);
        // $data['page'] = 'Cover/index';
		$this->load->view('Cover/index', $data);
	}

}
