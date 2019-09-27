<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_asli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Grafik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'grafik_asli?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'grafik_asli?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'grafik_asli';
            $config['first_url'] = base_url() . 'grafik_asli';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Grafik_model->total_rows($q);
        $grafik_asli = $this->Grafik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'grafik_asli_data' => $grafik_asli,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Grafik Asli';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Grafik Asli' => '',
        ];
        $data['code_js'] = 'grafik_asli/codejs';
        $data['page'] = 'grafik_asli/Grafik_asli_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_grafik' => $row->id_grafik,
		'id_download' => $row->id_download,
		'id_jenis_grafik' => $row->id_jenis_grafik,
		'nama_grafik' => $row->nama_grafik,
		'variabel_1' => $row->variabel_1,
		'variabel_2' => $row->variabel_2,
		'variabel_3' => $row->variabel_3,
		'variabel_4' => $row->variabel_4,
		'variabel_5' => $row->variabel_5,
	    );
        $data['title'] = 'Grafik Asli';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'grafik_asli/Grafik_asli_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik_asli'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grafik_asli/create_action'),
	    'id_grafik' => set_value('id_grafik'),
	    'id_download' => set_value('id_download'),
	    'id_jenis_grafik' => set_value('id_jenis_grafik'),
	    'nama_grafik' => set_value('nama_grafik'),
	    'variabel_1' => set_value('variabel_1'),
	    'variabel_2' => set_value('variabel_2'),
	    'variabel_3' => set_value('variabel_3'),
	    'variabel_4' => set_value('variabel_4'),
	    'variabel_5' => set_value('variabel_5'),
	);
        $data['title'] = 'Grafik Asli';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'grafik_asli/Grafik_asli_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_grafik' => $this->input->post('id_grafik',TRUE),
		'id_download' => $this->input->post('id_download',TRUE),
		'id_jenis_grafik' => $this->input->post('id_jenis_grafik',TRUE),
		'nama_grafik' => $this->input->post('nama_grafik',TRUE),
		'variabel_1' => $this->input->post('variabel_1',TRUE),
		'variabel_2' => $this->input->post('variabel_2',TRUE),
		'variabel_3' => $this->input->post('variabel_3',TRUE),
		'variabel_4' => $this->input->post('variabel_4',TRUE),
		'variabel_5' => $this->input->post('variabel_5',TRUE),
	    );
if(! $this->Grafik_model->is_exist($this->input->post('id_grafik'))){
                $this->Grafik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grafik_asli'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_grafik is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grafik_asli/update_action'),
		'id_grafik' => set_value('id_grafik', $row->id_grafik),
		'id_download' => set_value('id_download', $row->id_download),
		'id_jenis_grafik' => set_value('id_jenis_grafik', $row->id_jenis_grafik),
		'nama_grafik' => set_value('nama_grafik', $row->nama_grafik),
		'variabel_1' => set_value('variabel_1', $row->variabel_1),
		'variabel_2' => set_value('variabel_2', $row->variabel_2),
		'variabel_3' => set_value('variabel_3', $row->variabel_3),
		'variabel_4' => set_value('variabel_4', $row->variabel_4),
		'variabel_5' => set_value('variabel_5', $row->variabel_5),
	    );
            $data['title'] = 'Grafik Asli';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'grafik_asli/Grafik_asli_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik_asli'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_grafik', TRUE));
        } else {
            $data = array(
		'id_grafik' => $this->input->post('id_grafik',TRUE),
		'id_download' => $this->input->post('id_download',TRUE),
		'id_jenis_grafik' => $this->input->post('id_jenis_grafik',TRUE),
		'nama_grafik' => $this->input->post('nama_grafik',TRUE),
		'variabel_1' => $this->input->post('variabel_1',TRUE),
		'variabel_2' => $this->input->post('variabel_2',TRUE),
		'variabel_3' => $this->input->post('variabel_3',TRUE),
		'variabel_4' => $this->input->post('variabel_4',TRUE),
		'variabel_5' => $this->input->post('variabel_5',TRUE),
	    );

            $this->Grafik_model->update($this->input->post('id_grafik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grafik_asli'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);

        if ($row) {
            $this->Grafik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grafik_asli'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik_asli'));
        }
    }

    public function deletebulk(){
        $delete = $this->Grafik_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_grafik', 'id grafik', 'trim|required');
	$this->form_validation->set_rules('id_download', 'id download', 'trim|required');
	$this->form_validation->set_rules('id_jenis_grafik', 'id jenis grafik', 'trim|required');
	$this->form_validation->set_rules('nama_grafik', 'nama grafik', 'trim|required');
	$this->form_validation->set_rules('variabel_1', 'variabel 1', 'trim|required');
	$this->form_validation->set_rules('variabel_2', 'variabel 2', 'trim|required');
	$this->form_validation->set_rules('variabel_3', 'variabel 3', 'trim|required');
	$this->form_validation->set_rules('variabel_4', 'variabel 4', 'trim|required');
	$this->form_validation->set_rules('variabel_5', 'variabel 5', 'trim|required');

	$this->form_validation->set_rules('id_grafik', 'id_grafik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Grafik_asli.php */
/* Location: ./application/controllers/Grafik_asli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-11 00:11:36 */
/* http://harviacode.com */