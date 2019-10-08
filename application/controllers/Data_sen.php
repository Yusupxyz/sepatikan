<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_sen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Data_sen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_sen?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_sen?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_sen';
            $config['first_url'] = base_url() . 'data_sen';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_sen_model->total_rows($q);
        $data_sen = $this->Data_sen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_sen_data' => $data_sen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Data Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Data Sen' => '',
        ];
        $data['code_js'] = 'data_sen/codejs';
        $data['page'] = 'data_sen/Data_sen_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_sen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_stasiun' => $row->id_stasiun,
		'id_parameter' => $row->id_parameter,
		'id_nilai' => $row->id_nilai,
	    );
        $data['title'] = 'Data Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_sen/Data_sen_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_sen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_sen/create_action'),
	    'id' => set_value('id'),
	    'id_stasiun' => set_value('id_stasiun'),
	    'id_parameter' => set_value('id_parameter'),
	    'id_nilai' => set_value('id_nilai'),
	);
        $data['title'] = 'Data Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_sen/Data_sen_form';
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
		'id_stasiun' => $this->input->post('id_stasiun',TRUE),
		'id_parameter' => $this->input->post('id_parameter',TRUE),
		'id_nilai' => $this->input->post('id_nilai',TRUE),
	    );
if(! $this->Data_sen_model->is_exist($this->input->post('id'))){
                $this->Data_sen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_sen'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Data_sen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_sen/update_action'),
		'id' => set_value('id', $row->id),
		'id_stasiun' => set_value('id_stasiun', $row->id_stasiun),
		'id_parameter' => set_value('id_parameter', $row->id_parameter),
		'id_nilai' => set_value('id_nilai', $row->id_nilai),
	    );
            $data['title'] = 'Data Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_sen/Data_sen_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_sen'));
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
		'id_stasiun' => $this->input->post('id_stasiun',TRUE),
		'id_parameter' => $this->input->post('id_parameter',TRUE),
		'id_nilai' => $this->input->post('id_nilai',TRUE),
	    );

            $this->Data_sen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_sen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_sen_model->get_by_id($id);

        if ($row) {
            $this->Data_sen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_sen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_sen'));
        }
    }

    public function deletebulk(){
        $delete = $this->Data_sen_model->deletebulk();
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
	$this->form_validation->set_rules('id_stasiun', 'id stasiun', 'trim|required');
	$this->form_validation->set_rules('id_parameter', 'id parameter', 'trim|required');
	$this->form_validation->set_rules('id_nilai', 'id nilai', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_sen.php */
/* Location: ./application/controllers/Data_sen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-08 22:52:23 */
/* http://harviacode.com */