<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Variabel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Variabel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'variabel?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'variabel?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'variabel';
            $config['first_url'] = base_url() . 'variabel';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Variabel_model->total_rows($q);
        $variabel = $this->Variabel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'variabel_data' => $variabel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Variabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Variabel' => '',
        ];
        $data['code_js'] = 'variabel/codejs';
        $data['page'] = 'variabel/Variabel_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Variabel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_variabel' => $row->id_variabel,
		'id_grafik' => $row->id_grafik,
		'nilai' => $row->nilai,
	    );
        $data['title'] = 'Variabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'variabel/Variabel_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('variabel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('variabel/create_action'),
	    'id_variabel' => set_value('id_variabel'),
	    'id_grafik' => set_value('id_grafik'),
	    'nilai' => set_value('nilai'),
	);
        $data['title'] = 'Variabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'variabel/Variabel_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_variabel' => $this->input->post('id_variabel',TRUE),
		'id_grafik' => $this->input->post('id_grafik',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );
if(! $this->Variabel_model->is_exist($this->input->post('id_variabel'))){
                $this->Variabel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('variabel'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_variabel is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Variabel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('variabel/update_action'),
		'id_variabel' => set_value('id_variabel', $row->id_variabel),
		'id_grafik' => set_value('id_grafik', $row->id_grafik),
		'nilai' => set_value('nilai', $row->nilai),
	    );
            $data['title'] = 'Variabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'variabel/Variabel_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('variabel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_variabel', TRUE));
        } else {
            $data = array(
		'id_variabel' => $this->input->post('id_variabel',TRUE),
		'id_grafik' => $this->input->post('id_grafik',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Variabel_model->update($this->input->post('id_variabel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('variabel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Variabel_model->get_by_id($id);

        if ($row) {
            $this->Variabel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('variabel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('variabel'));
        }
    }

    public function deletebulk(){
        $delete = $this->Variabel_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_variabel', 'id variabel', 'trim|required');
	$this->form_validation->set_rules('id_grafik', 'id grafik', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');

	$this->form_validation->set_rules('id_variabel', 'id_variabel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Variabel.php */
/* Location: ./application/controllers/Variabel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-11 00:55:09 */
/* http://harviacode.com */