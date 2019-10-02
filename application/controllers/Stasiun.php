<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stasiun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Stasiun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stasiun?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stasiun?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stasiun';
            $config['first_url'] = base_url() . 'stasiun';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stasiun_model->total_rows($q);
        $stasiun = $this->Stasiun_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stasiun_data' => $stasiun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Stasiun';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Stasiun' => '',
        ];
        $data['code_js'] = 'stasiun/codejs';
        $data['page'] = 'stasiun/Stasiun_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Stasiun_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'stasiun' => $row->stasiun,
		'desa' => $row->desa,
		'koordinat' => $row->koordinat,
	    );
        $data['title'] = 'Stasiun';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'stasiun/Stasiun_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stasiun'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stasiun/create_action'),
	    'id' => set_value('id'),
	    'stasiun' => set_value('stasiun'),
	    'desa' => set_value('desa'),
	    'koordinat' => set_value('koordinat'),
	);
        $data['title'] = 'Stasiun';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'stasiun/Stasiun_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'stasiun' => $this->input->post('stasiun',TRUE),
		'desa' => $this->input->post('desa',TRUE),
		'koordinat' => $this->input->post('koordinat',TRUE),
	    );
if(! $this->Stasiun_model->is_exist($this->input->post('id'))){
                $this->Stasiun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stasiun'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Stasiun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stasiun/update_action'),
		'id' => set_value('id', $row->id),
		'stasiun' => set_value('stasiun', $row->stasiun),
		'desa' => set_value('desa', $row->desa),
		'koordinat' => set_value('koordinat', $row->koordinat),
	    );
            $data['title'] = 'Stasiun';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'stasiun/Stasiun_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stasiun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'stasiun' => $this->input->post('stasiun',TRUE),
		'desa' => $this->input->post('desa',TRUE),
		'koordinat' => $this->input->post('koordinat',TRUE),
	    );

            $this->Stasiun_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stasiun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stasiun_model->get_by_id($id);

        if ($row) {
            $this->Stasiun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stasiun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stasiun'));
        }
    }

    public function deletebulk(){
        $delete = $this->Stasiun_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('stasiun', 'stasiun', 'trim|required');
	$this->form_validation->set_rules('desa', 'desa', 'trim|required');
	$this->form_validation->set_rules('koordinat', 'koordinat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stasiun.php */
/* Location: ./application/controllers/Stasiun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-01 21:03:25 */
/* http://harviacode.com */