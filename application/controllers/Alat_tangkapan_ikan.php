<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alat_tangkapan_ikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Alat_tangkapan_ikan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'alat_tangkapan_ikan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'alat_tangkapan_ikan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'alat_tangkapan_ikan';
            $config['first_url'] = base_url() . 'alat_tangkapan_ikan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Alat_tangkapan_ikan_model->total_rows($q);
        $alat_tangkapan_ikan = $this->Alat_tangkapan_ikan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'alat_tangkapan_ikan_data' => $alat_tangkapan_ikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Alat Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Alat Tangkapan Ikan' => '',
        ];
        $data['code_js'] = 'alat_tangkapan_ikan/codejs';
        $data['page'] = 'alat_tangkapan_ikan/Alat_tangkapan_ikan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Alat_tangkapan_ikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_stasiun' => $row->id_stasiun,
		'id_periode' => $row->id_periode,
		'alat' => $row->alat,
	    );
        $data['title'] = 'Alat Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alat_tangkapan_ikan/Alat_tangkapan_ikan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alat_tangkapan_ikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('alat_tangkapan_ikan/create_action'),
	    'id' => set_value('id'),
	    'id_stasiun' => set_value('id_stasiun'),
	    'id_periode' => set_value('id_periode'),
	    'alat' => set_value('alat'),
	);
        $data['title'] = 'Alat Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alat_tangkapan_ikan/Alat_tangkapan_ikan_form';
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
		'id_periode' => $this->input->post('id_periode',TRUE),
		'alat' => $this->input->post('alat',TRUE),
	    );
if(! $this->Alat_tangkapan_ikan_model->is_exist($this->input->post('id'))){
                $this->Alat_tangkapan_ikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('alat_tangkapan_ikan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Alat_tangkapan_ikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('alat_tangkapan_ikan/update_action'),
		'id' => set_value('id', $row->id),
		'id_stasiun' => set_value('id_stasiun', $row->id_stasiun),
		'id_periode' => set_value('id_periode', $row->id_periode),
		'alat' => set_value('alat', $row->alat),
	    );
            $data['title'] = 'Alat Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alat_tangkapan_ikan/Alat_tangkapan_ikan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alat_tangkapan_ikan'));
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
		'id_periode' => $this->input->post('id_periode',TRUE),
		'alat' => $this->input->post('alat',TRUE),
	    );

            $this->Alat_tangkapan_ikan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('alat_tangkapan_ikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Alat_tangkapan_ikan_model->get_by_id($id);

        if ($row) {
            $this->Alat_tangkapan_ikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('alat_tangkapan_ikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alat_tangkapan_ikan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Alat_tangkapan_ikan_model->deletebulk();
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
	$this->form_validation->set_rules('id_periode', 'id periode', 'trim|required');
	$this->form_validation->set_rules('alat', 'alat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Alat_tangkapan_ikan.php */
/* Location: ./application/controllers/Alat_tangkapan_ikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-07 06:10:56 */
/* http://harviacode.com */