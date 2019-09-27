<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sungai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Sungai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sungai?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sungai?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sungai';
            $config['first_url'] = base_url() . 'sungai';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sungai_model->total_rows($q);
        $sungai = $this->Sungai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sungai_data' => $sungai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Sungai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Sungai' => '',
        ];
        $data['code_js'] = 'sungai/codejs';
        $data['page'] = 'sungai/Sungai_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Sungai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'sungai' => $row->sungai,
	    );
        $data['title'] = 'Sungai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'sungai/Sungai_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sungai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sungai/create_action'),
	    'id' => set_value('id'),
	    'sungai' => set_value('sungai'),
	);
        $data['title'] = 'Sungai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'sungai/Sungai_form';
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
		'sungai' => $this->input->post('sungai',TRUE),
	    );
if(! $this->Sungai_model->is_exist($this->input->post('id'))){
                $this->Sungai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sungai'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Sungai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sungai/update_action'),
		'id' => set_value('id', $row->id),
		'sungai' => set_value('sungai', $row->sungai),
	    );
            $data['title'] = 'Sungai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'sungai/Sungai_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sungai'));
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
		'sungai' => $this->input->post('sungai',TRUE),
	    );

            $this->Sungai_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sungai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sungai_model->get_by_id($id);

        if ($row) {
            $this->Sungai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sungai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sungai'));
        }
    }

    public function deletebulk(){
        $delete = $this->Sungai_model->deletebulk();
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
	$this->form_validation->set_rules('sungai', 'sungai', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sungai.php */
/* Location: ./application/controllers/Sungai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-27 19:58:50 */
/* http://harviacode.com */