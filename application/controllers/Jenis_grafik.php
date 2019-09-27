<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_grafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jenis_grafik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_grafik?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_grafik?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_grafik';
            $config['first_url'] = base_url() . 'jenis_grafik';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_grafik_model->total_rows($q);
        $jenis_grafik = $this->Jenis_grafik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_grafik_data' => $jenis_grafik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Jenis Grafik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jenis Grafik' => '',
        ];
        $data['code_js'] = 'jenis_grafik/codejs';
        $data['page'] = 'jenis_grafik/Jenis_grafik_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_grafik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_grafik' => $row->id_jenis_grafik,
		'nama_grafik' => $row->nama_grafik,
	    );
        $data['title'] = 'Jenis Grafik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_grafik/Jenis_grafik_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_grafik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_grafik/create_action'),
	    'id_jenis_grafik' => set_value('id_jenis_grafik'),
	    'nama_grafik' => set_value('nama_grafik'),
	);
        $data['title'] = 'Jenis Grafik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_grafik/Jenis_grafik_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_grafik' => $this->input->post('nama_grafik',TRUE),
	    );$this->Jenis_grafik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_grafik'));}
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_grafik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_grafik/update_action'),
		'id_jenis_grafik' => set_value('id_jenis_grafik', $row->id_jenis_grafik),
		'nama_grafik' => set_value('nama_grafik', $row->nama_grafik),
	    );
            $data['title'] = 'Jenis Grafik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_grafik/Jenis_grafik_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_grafik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_grafik', TRUE));
        } else {
            $data = array(
		'nama_grafik' => $this->input->post('nama_grafik',TRUE),
	    );

            $this->Jenis_grafik_model->update($this->input->post('id_jenis_grafik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_grafik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_grafik_model->get_by_id($id);

        if ($row) {
            $this->Jenis_grafik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_grafik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_grafik'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jenis_grafik_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_grafik', 'nama grafik', 'trim|required');

	$this->form_validation->set_rules('id_jenis_grafik', 'id_jenis_grafik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_grafik.php */
/* Location: ./application/controllers/Jenis_grafik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-06 19:02:10 */
/* http://harviacode.com */