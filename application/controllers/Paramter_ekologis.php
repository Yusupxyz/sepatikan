<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paramter_ekologis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Paramter_ekologis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paramter_ekologis?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paramter_ekologis?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paramter_ekologis';
            $config['first_url'] = base_url() . 'paramter_ekologis';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Paramter_ekologis_model->total_rows($q);
        $paramter_ekologis = $this->Paramter_ekologis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'paramter_ekologis_data' => $paramter_ekologis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Paramter Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Paramter Ekologis' => '',
        ];
        $data['code_js'] = 'paramter_ekologis/codejs';
        $data['page'] = 'paramter_ekologis/Paramter_ekologis_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Paramter_ekologis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'parameter' => $row->parameter,
		'jenis' => $row->jenis,
	    );
        $data['title'] = 'Paramter Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'paramter_ekologis/Paramter_ekologis_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paramter_ekologis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paramter_ekologis/create_action'),
	    'id' => set_value('id'),
	    'parameter' => set_value('parameter'),
	    'jenis' => set_value('jenis'),
	);
        $data['title'] = 'Paramter Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'paramter_ekologis/Paramter_ekologis_form';
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
		'jenis' => $this->input->post('jenis',TRUE),
	    );
if(! $this->Paramter_ekologis_model->is_exist($this->input->post('id'))){
                $this->Paramter_ekologis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paramter_ekologis'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Paramter_ekologis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paramter_ekologis/update_action'),
		'id' => set_value('id', $row->id),
		'parameter' => set_value('parameter', $row->parameter),
		'jenis' => set_value('jenis', $row->jenis),
	    );
            $data['title'] = 'Paramter Ekologis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'paramter_ekologis/Paramter_ekologis_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paramter_ekologis'));
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
		'jenis' => $this->input->post('jenis',TRUE),
	    );

            $this->Paramter_ekologis_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paramter_ekologis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paramter_ekologis_model->get_by_id($id);

        if ($row) {
            $this->Paramter_ekologis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paramter_ekologis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paramter_ekologis'));
        }
    }

    public function deletebulk(){
        $delete = $this->Paramter_ekologis_model->deletebulk();
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
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Paramter_ekologis.php */
/* Location: ./application/controllers/Paramter_ekologis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-07 19:49:18 */
/* http://harviacode.com */