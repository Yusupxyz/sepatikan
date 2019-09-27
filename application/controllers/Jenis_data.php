<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jenis_data_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_data?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_data?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_data';
            $config['first_url'] = base_url() . 'jenis_data';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_data_model->total_rows($q);
        $jenis_data = $this->Jenis_data_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_data_data' => $jenis_data,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Jenis Data';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jenis Data' => '',
        ];
        $data['code_js'] = 'jenis_data/codejs';
        $data['page'] = 'jenis_data/Jenis_data_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_data_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis_data' => $row->jenis_data,
	    );
        $data['title'] = 'Jenis Data';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_data/Jenis_data_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_data'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_data/create_action'),
	    'id' => set_value('id'),
	    'jenis_data' => set_value('jenis_data'),
	);
        $data['title'] = 'Jenis Data';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_data/Jenis_data_form';
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
		'jenis_data' => $this->input->post('jenis_data',TRUE),
	    );
if(! $this->Jenis_data_model->is_exist($this->input->post('id'))){
                $this->Jenis_data_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_data'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_data_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_data/update_action'),
		'id' => set_value('id', $row->id),
		'jenis_data' => set_value('jenis_data', $row->jenis_data),
	    );
            $data['title'] = 'Jenis Data';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_data/Jenis_data_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_data'));
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
		'jenis_data' => $this->input->post('jenis_data',TRUE),
	    );

            $this->Jenis_data_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_data'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_data_model->get_by_id($id);

        if ($row) {
            $this->Jenis_data_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_data'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_data'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jenis_data_model->deletebulk();
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
	$this->form_validation->set_rules('jenis_data', 'jenis data', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_data.php */
/* Location: ./application/controllers/Jenis_data.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-27 19:58:37 */
/* http://harviacode.com */