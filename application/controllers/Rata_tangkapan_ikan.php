<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rata_tangkapan_ikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Rata_tangkapan_ikan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rata_tangkapan_ikan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rata_tangkapan_ikan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rata_tangkapan_ikan';
            $config['first_url'] = base_url() . 'rata_tangkapan_ikan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rata_tangkapan_ikan_model->total_rows($q);
        $rata_tangkapan_ikan = $this->Rata_tangkapan_ikan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rata_tangkapan_ikan_data' => $rata_tangkapan_ikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Rata Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Rata Tangkapan Ikan' => '',
        ];
        $data['code_js'] = 'rata_tangkapan_ikan/codejs';
        $data['page'] = 'rata_tangkapan_ikan/Rata_tangkapan_ikan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Rata_tangkapan_ikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_stasiun' => $row->id_stasiun,
		'id_periode' => $row->id_periode,
		'rata_rata' => $row->rata_rata,
	    );
        $data['title'] = 'Rata Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'rata_tangkapan_ikan/Rata_tangkapan_ikan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rata_tangkapan_ikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rata_tangkapan_ikan/create_action'),
	    'id' => set_value('id'),
	    'id_stasiun' => set_value('id_stasiun'),
	    'id_periode' => set_value('id_periode'),
	    'rata_rata' => set_value('rata_rata'),
	);
        $data['title'] = 'Rata Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'rata_tangkapan_ikan/Rata_tangkapan_ikan_form';
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
		'rata_rata' => $this->input->post('rata_rata',TRUE),
	    );
if(! $this->Rata_tangkapan_ikan_model->is_exist($this->input->post('id'))){
                $this->Rata_tangkapan_ikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rata_tangkapan_ikan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Rata_tangkapan_ikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rata_tangkapan_ikan/update_action'),
		'id' => set_value('id', $row->id),
		'id_stasiun' => set_value('id_stasiun', $row->id_stasiun),
		'id_periode' => set_value('id_periode', $row->id_periode),
		'rata_rata' => set_value('rata_rata', $row->rata_rata),
	    );
            $data['title'] = 'Rata Tangkapan Ikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'rata_tangkapan_ikan/Rata_tangkapan_ikan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rata_tangkapan_ikan'));
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
		'rata_rata' => $this->input->post('rata_rata',TRUE),
	    );

            $this->Rata_tangkapan_ikan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rata_tangkapan_ikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rata_tangkapan_ikan_model->get_by_id($id);

        if ($row) {
            $this->Rata_tangkapan_ikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rata_tangkapan_ikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rata_tangkapan_ikan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Rata_tangkapan_ikan_model->deletebulk();
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
	$this->form_validation->set_rules('rata_rata', 'rata rata', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rata_tangkapan_ikan.php */
/* Location: ./application/controllers/Rata_tangkapan_ikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-07 05:34:33 */
/* http://harviacode.com */