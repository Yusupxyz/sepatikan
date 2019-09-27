<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Download_model');
        $this->load->model('Grafik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'download?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'download?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'download';
            $config['first_url'] = base_url() . 'download';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Download_model->total_rows($q);
        $download = $this->Download_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'download_data' => $download,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Download';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Download' => '',
        ];
        $data['code_js'] = 'download/codejs';
        $data['page'] = 'download/Download_list';
        $this->load->view('template/backend', $data);
    }
    
    public function read($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_download' => $row->id_download,
		'file' => $row->file,
		'nama_tabel' => $row->nama_tabel,
		'id_kategori' => $row->id_kategori,
		'deskripsi' => $row->deskripsi,
	    );
        $data['title'] = 'Download';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'download/Download_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('download/create_action'),
	    'id_download' => set_value('id_download'),
	    'file' => set_value('file'),
        'nama_tabel' => set_value('nama_tabel'),
        'tahun' => set_value('tahun'),
        'tags' => set_value('tags'),
	    'id_kategori' => set_value('id_kategori'),
	    'deskripsi' => set_value('deskripsi'),

	);
        $data['title'] = 'Download';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['kategori'] = $this->db->get('kategori')->result();

        $data['page'] = 'download/Download_form';
        $this->load->view('template/backend', $data);
    }

    public function _uploadFile()
    {
    
    $config['upload_path']          = './statistik/file_excel/';
    $config['allowed_types']        = 'xls|xlsx';
    // $config['file_name']            = $this->input->post('filename');
    $config['overwrite']            = true;
    $config['max_size']             = 10000; 

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('filename')) {
        return $this->upload->data('file_name');
    }
    $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    // return "false";
    }

    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
            //echo "oke";
        } else {
         
        //tags
        $downloadtags = uniqid();
        $file = $this->_uploadFile();
        $nama_tabel = $this->input->post('nama_tabel',TRUE);
        $tahun = $this->input->post('tahun',TRUE);
        $id_kategori =  $this->input->post('id_kategori',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $tags = $this->input->post('tags');
        $pemisah = explode(',',$tags);
        $ta = 0;
       
        $data_grafik = array(
            'id_download' => $downloadtags,
            'id_jenis_grafik' => null,
            'nama_grafik' => $deskripsi,
            );

         //var_dump($data);
           
            if(! $this->Download_model->is_exist($this->input->post('id_download'))){
            // $this->Download_model->insert($data);
            $this->Download_model->insert($downloadtags, $file,$nama_tabel,$tahun,$id_kategori,$deskripsi);
            foreach($pemisah as $tag){
                $this->Download_model->insert_tag($downloadtags,$tag);
                $ta++;
            }
            $this->Grafik_model->insert($data_grafik);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('download'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_download is exist');
            }
     }
    }
    
    public function update($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        
        
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('download/update_action'),
		'id_download' => set_value('id_download', $row->id_download),
		'file' => set_value('file', $row->file),
        'nama_tabel' => set_value('nama_tabel', $row->nama_tabel),
        'tahun' =>set_value('tahun',$row->tahun),
       
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
	    );
        $data['title'] = 'Download';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        // $data['kategori'] = $this->db->get_where('kategori', ["id_kategori" => $id])->row();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['tags'] = $this->Download_model->get_by_id_tags($id);
        $data['page'] = 'download/Download_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_download', TRUE));
        }elseif($this->_uploadFile() == ''){
            $data = array(
                'id_download' => $this->input->post('id_download',TRUE),
                'file' => $this->_uploadFile(),
                'nama_tabel' => $this->input->post('nama_tabel',TRUE),
                'id_kategori' => $this->input->post('id_kategori',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE)
            );
            $this->Download_model->update($this->input->post('id_download', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('download'));
        } 
        else {
        $data = array(
		'id_download' => $this->input->post('id_download',TRUE),
		'nama_tabel' => $this->input->post('nama_tabel',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE)
	    );

            $this->Download_model->update($this->input->post('id_download', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function _deleteFile($id)
    {
        $filename = $this->db->get_where('download', ["id_download" => $id])->row();
        if ($filename->file != "") {
            $filename2 = explode(".", $filename->file)[0];
            return array_map('unlink', glob(FCPATH."/statistik/file_excel/$filename2.*"));
        }
    }
    public function delete($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $this->_deleteFile($id);
            $this->Download_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('download'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function deletebulk(){
        $delete = $this->Download_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	//$this->form_validation->set_rules('id_download', 'id download', 'trim|required');
	//$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('nama_tabel', 'nama tabel', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	//$this->form_validation->set_rules('id_download', 'id_download', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-04 05:43:32 */
/* http://harviacode.com */