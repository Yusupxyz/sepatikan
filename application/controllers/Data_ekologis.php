<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_ekologis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Data_ekologis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_ekologis?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_ekologis?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_ekologis';
            $config['first_url'] = base_url() . 'data_ekologis';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_ekologis_model->total_rows($q);
        $data_ekologis = $this->Data_ekologis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_ekologis_data' => $data_ekologis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Data Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Data Ekologis' => '',
        ];
        $data['code_js'] = 'data_ekologis/codejs';
        $data['page'] = 'data_ekologis/Data_ekologis_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_ekologis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ekologis' => $row->id_ekologis,
		'id_stasiun' => $row->id_stasiun,
		'id_parameter' => $row->id_parameter,
		'data' => $row->data,
	    );
        $data['title'] = 'Data Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_ekologis/Data_ekologis_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_ekologis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_ekologis/create_action'),
	    'id_ekologis' => set_value('id_ekologis'),
	    'id_stasiun' => set_value('id_stasiun'),
	    'id_parameter' => set_value('id_parameter'),
	    'data' => set_value('data'),
	);
        $data['title'] = 'Data Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_ekologis/Data_ekologis_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ekologis' => $this->input->post('id_ekologis',TRUE),
		'id_stasiun' => $this->input->post('id_stasiun',TRUE),
		'id_parameter' => $this->input->post('id_parameter',TRUE),
		'data' => $this->input->post('data',TRUE),
	    );
if(! $this->Data_ekologis_model->is_exist($this->input->post('id_ekologis'))){
                $this->Data_ekologis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_ekologis'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_ekologis is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Data_ekologis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_ekologis/update_action'),
		'id_ekologis' => set_value('id_ekologis', $row->id_ekologis),
		'id_stasiun' => set_value('id_stasiun', $row->id_stasiun),
		'id_parameter' => set_value('id_parameter', $row->id_parameter),
		'data' => set_value('data', $row->data),
	    );
            $data['title'] = 'Data Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'data_ekologis/Data_ekologis_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_ekologis'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ekologis', TRUE));
        } else {
            $data = array(
		'id_ekologis' => $this->input->post('id_ekologis',TRUE),
		'id_stasiun' => $this->input->post('id_stasiun',TRUE),
		'id_parameter' => $this->input->post('id_parameter',TRUE),
		'data' => $this->input->post('data',TRUE),
	    );

            $this->Data_ekologis_model->update($this->input->post('id_ekologis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_ekologis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_ekologis_model->get_by_id($id);

        if ($row) {
            $this->Data_ekologis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_ekologis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_ekologis'));
        }
    }

    public function deletebulk(){
        $delete = $this->Data_ekologis_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_ekologis', 'id ekologis', 'trim|required');
	$this->form_validation->set_rules('id_stasiun', 'id stasiun', 'trim|required');
	$this->form_validation->set_rules('id_parameter', 'id parameter', 'trim|required');
	$this->form_validation->set_rules('data', 'data', 'trim|required');

	$this->form_validation->set_rules('id_ekologis', 'id_ekologis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_ekologis.php */
/* Location: ./application/controllers/Data_ekologis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-07 19:49:22 */
/* http://harviacode.com */