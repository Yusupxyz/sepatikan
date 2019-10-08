<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parameter_sen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Parameter_sen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'parameter_sen?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'parameter_sen?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'parameter_sen';
            $config['first_url'] = base_url() . 'parameter_sen';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Parameter_sen_model->total_rows($q);
        $parameter_sen = $this->Parameter_sen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'parameter_sen_data' => $parameter_sen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Parameter Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Parameter Sen' => '',
        ];
        $data['code_js'] = 'parameter_sen/codejs';
        $data['page'] = 'parameter_sen/Parameter_sen_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Parameter_sen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'parameter' => $row->parameter,
		'id_nilai_1' => $row->id_nilai_1,
		'id_nilai_2' => $row->id_nilai_2,
		'id_nilai_3' => $row->id_nilai_3,
	    );
        $data['title'] = 'Parameter Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'parameter_sen/Parameter_sen_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter_sen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('parameter_sen/create_action'),
	    'id' => set_value('id'),
	    'parameter' => set_value('parameter'),
	    'id_nilai_1' => set_value('id_nilai_1'),
	    'id_nilai_2' => set_value('id_nilai_2'),
	    'id_nilai_3' => set_value('id_nilai_3'),
	);
        $data['title'] = 'Parameter Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'parameter_sen/Parameter_sen_form';
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
		'parameter' => $this->input->post('parameter',TRUE),
		'id_nilai_1' => $this->input->post('id_nilai_1',TRUE),
		'id_nilai_2' => $this->input->post('id_nilai_2',TRUE),
		'id_nilai_3' => $this->input->post('id_nilai_3',TRUE),
	    );
if(! $this->Parameter_sen_model->is_exist($this->input->post('id'))){
                $this->Parameter_sen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('parameter_sen'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Parameter_sen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('parameter_sen/update_action'),
		'id' => set_value('id', $row->id),
		'parameter' => set_value('parameter', $row->parameter),
		'id_nilai_1' => set_value('id_nilai_1', $row->id_nilai_1),
		'id_nilai_2' => set_value('id_nilai_2', $row->id_nilai_2),
		'id_nilai_3' => set_value('id_nilai_3', $row->id_nilai_3),
	    );
            $data['title'] = 'Parameter Sen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'parameter_sen/Parameter_sen_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter_sen'));
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
		'parameter' => $this->input->post('parameter',TRUE),
		'id_nilai_1' => $this->input->post('id_nilai_1',TRUE),
		'id_nilai_2' => $this->input->post('id_nilai_2',TRUE),
		'id_nilai_3' => $this->input->post('id_nilai_3',TRUE),
	    );

            $this->Parameter_sen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('parameter_sen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Parameter_sen_model->get_by_id($id);

        if ($row) {
            $this->Parameter_sen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('parameter_sen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter_sen'));
        }
    }

    public function deletebulk(){
        $delete = $this->Parameter_sen_model->deletebulk();
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
	$this->form_validation->set_rules('parameter', 'parameter', 'trim|required');
	$this->form_validation->set_rules('id_nilai_1', 'id nilai 1', 'trim|required');
	$this->form_validation->set_rules('id_nilai_2', 'id nilai 2', 'trim|required');
	$this->form_validation->set_rules('id_nilai_3', 'id nilai 3', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Parameter_sen.php */
/* Location: ./application/controllers/Parameter_sen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-08 15:19:55 */
/* http://harviacode.com */