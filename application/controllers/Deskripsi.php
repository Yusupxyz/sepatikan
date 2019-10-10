<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deskripsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Deskripsi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'deskripsi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'deskripsi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'deskripsi';
            $config['first_url'] = base_url() . 'deskripsi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Deskripsi_model->total_rows($q);
        $deskripsi = $this->Deskripsi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'deskripsi_data' => $deskripsi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Deskripsi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Deskripsi' => '',
        ];
        $data['code_js'] = 'deskripsi/codejs';
        $data['page'] = 'deskripsi/Deskripsi_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Deskripsi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'deskripsi' => $row->deskripsi,
	    );
        $data['title'] = 'Deskripsi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'deskripsi/Deskripsi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deskripsi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('deskripsi/create_action'),
	    'id' => set_value('id'),
	    'deskripsi' => set_value('deskripsi'),
	);
        $data['title'] = 'Deskripsi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'deskripsi/Deskripsi_form';
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
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );
if(! $this->Deskripsi_model->is_exist($this->input->post('id'))){
                $this->Deskripsi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('deskripsi'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Deskripsi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('deskripsi/update_action'),
		'id' => set_value('id', $row->id),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
	    );
            $data['title'] = 'Deskripsi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'deskripsi/Deskripsi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deskripsi'));
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
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->Deskripsi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('deskripsi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Deskripsi_model->get_by_id($id);

        if ($row) {
            $this->Deskripsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('deskripsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deskripsi'));
        }
    }

    public function deletebulk(){
        $delete = $this->Deskripsi_model->deletebulk();
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
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Deskripsi.php */
/* Location: ./application/controllers/Deskripsi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-10 21:41:20 */
/* http://harviacode.com */