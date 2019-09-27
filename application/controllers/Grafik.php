<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/third_party/PHPExcel/PHPExcel.php';

//lets Use the Spout Namespaces
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
class Grafik extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->layout->auth();
        $c_url = $this->router->fetch_class();
        $this->layout->auth_privilege($c_url); 
        $this->load->model('Menu_model');
        $this->load->model('Grafik_model');
        $this->load->model('Jenis_grafik_model');
        $this->load->model('Variabel_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->library('excel');
        $this->load->helper('form');
	    //$this->load->library('Spreadsheet_Excel_Reader');
    }

    public function index()
    {
        $data['title'] = 'Tabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
        'Dashboard' => '',
        ];
        $c_url = $this->router->fetch_class();
        echo $this->layout->auth_privilege($c_url); 
        echo "tes";
        $excel = new Spreadsheet_Excel_Reader();
        $excel->read('public/sample.xls'); // set the excel file name here   
        $data['data_excell']=$excel->sheets[0]['cells'];
        $this->load->view('excell',$data);
        $data['page'] = 'grafik/tabel';
        $this->load->view('template/backend', $data);
            // redirect('dashboard', 'refresh');

    }
    public function tabel($id)
    {
        $data['title'] = 'Tabel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $c_url = $this->router->fetch_class();
        echo $this->layout->auth_privilege($c_url); 
        // echo "tes";

        $filename = $this->db->get_where('download', ["id_download" => $id])->row();
        if ($filename->file != "") {
            $filename2 = explode(".", $filename->file)[0];
            //return array_map('unlink', glob(FCPATH."/statistik/file_excel/$filename2.*"));
            $excel = new Spreadsheet_Excel_Reader();
			$excel->read("statistik/file_excel/$filename2.xls"); // set the excel file name here   
			$data['data_excell']=$excel->sheets[0]['cells'];
			$data['page'] = 'grafik/tabel';
        	$this->load->view('template/backend', $data);
        }else{
        
        
        $data['page'] = 'grafik/tabel';
        $this->load->view('template/backend', $data);
            // redirect('dashboard', 'refresh');}

    }   
   } 

   //membaca excel
   public function readExcelFile($id) {
        $c_url = $this->router->fetch_class();
        echo $this->layout->auth_privilege($c_url); 
        $filename = $this->db->get_where('download', ["id_download" => $id])->row();
        $id_grafik = $this->Grafik_model->get_by_id_download($id)->id_grafik;
        if ($filename->file != "") {
            $filename2 = explode(".", $filename->file)[0];
            $file_path = "statistik/file_excel/$filename2.xlsx";
            $objPHPExcel = PHPExcel_IOFactory::load($file_path);
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

            //ambil data per variabel semuanya untuk dimasukkan kedalam tabel
            $lastColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $arrayCount = count($allDataInSheet);  
            for ( $column='B'; $column<=$lastColumn; $column++ )
            {
                for( $i=2; $i<=$arrayCount; $i++ )
                {
                    $value_dalam[$column][] = trim($allDataInSheet[$i][$column]);       
                }
            }

            //ambil data variabel dari B 
            $row = 1;
            $lastColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
            $lastColumn++;
            for ($column1 = 'B'; $column1 != $lastColumn; $column1++) {
                $variabel = $objPHPExcel->getActiveSheet()->getCell($column1.$row)->getCalculatedValue();
                $variabel_new[$column1]['nama'] = $variabel; 
                $variabel_new[$column1]['kolom'] = $column1; 
            }  


            if (!$this->Variabel_model->is_exist($id)){
                for ($i=0; $i < count($variabel_new) ; $i++) { 
                    $data = array(
                        'id_grafik' => $id_grafik,
                        'nilai' => null,
                        );
                        $this->Variabel_model->insert($data);     
                }
            }
            
            
            // semua data dalam excel
                
            foreach ($cell_collection as $cell) {

                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue();
                 if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }

                //halaman tabel   
                $config['per_page'] = 10;
                $config['page_query_string'] = TRUE;
                $config['total_rows'] = $objPHPExcel->getActiveSheet()->getHighestRow();
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                // echo "<pre>"; var_dump($value_dalam); echo "</pre>";

                $data = array(
                    'button' => 'Create',
                    'action' => site_url('grafik/update_action/'.$id),
                    'pagination' => $this->pagination->create_links(),
                    'total_rows' => $config['total_rows'],
                    'header'     => $header,
                    'values'     => $arr_data,
                    'variabel'   => $variabel_new, 
                    'selected_variabel'   => $this->Variabel_model->get_by_id_grafik_all($id_grafik),   
                    'nama_tabel' => $filename->deskripsi,
                    'id_grafik'  => $id_grafik,
                    'id_jenis_grafik'  => $this->Grafik_model->get_by_id($id_grafik)->id_jenis_grafik,
                    'title'      => 'Tabel Acuan',
                    'subtitle'   => '',
                    );
                
                $data['jenis_grafik'] = $this->db->get('jenis_grafik')->result();
                $data['crumb'] = [
                    'Dashboard' => '',
                ];
                $data['code_js'] = 'grafik/codejs';
                $data['page'] = 'grafik/tabel';
                $this->load->view('template/backend', $data);
    }else{

        $data['code_js'] = 'grafik/codejs';
        $data['page'] = 'grafik/tabel';
        $this->load->view('template/backend', $data);
        redirect('dashboard', 'refresh');

    }   
     
}

    //update grafik

    public function update_action($id) 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_grafik', TRUE));
        } else {
            $data = array(
                'id_download' => $id,
                'id_jenis_grafik' => $this->input->post('id_jenis_grafik',TRUE),
                'nama_grafik' => $this->input->post('nama_grafik',TRUE),
                );

            $this->Grafik_model->update($this->input->post('id_grafik', TRUE), $data);
            $id_grafik = $this->Grafik_model->get_by_id_download($id)->id_grafik;

            for ($i=0; $i < $this->input->post('total_variabel')-1; $i++) {
                $j=$i+1;
                $id_variabel=$this->Variabel_model->get_by_id_grafik($id_grafik,$i)->id_variabel; 
                $data = array(
                    'nilai' => $this->input->post('variabel'.$j,TRUE),
                    );
                $this->Variabel_model->update($id_variabel, $data);
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grafik/grafik/'.$id));
        }
    }

    public function grafik($id){
        $c_url = $this->router->fetch_class();
        echo $this->layout->auth_privilege($c_url); 
        $filename = $this->db->get_where('download', ["id_download" => $id])->row();
        $id_grafik = $this->Grafik_model->get_by_id_download($id)->id_grafik;
        if ($filename->file != "") {
            $filename2 = explode(".", $filename->file)[0];
            $file_path = "statistik/file_excel/$filename2.xlsx";
            $objPHPExcel = PHPExcel_IOFactory::load($file_path);
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

            //ambil data per variabel semuanya untuk dimasukkan kedalam grafik
            $lastColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $arrayCount = count($allDataInSheet);  
            for ( $column='B'; $column<=$lastColumn; $column++ )
            {
                for( $i=2; $i<=$arrayCount; $i++ )
                {
                    $value_dalam[$column][] = trim($allDataInSheet[$i][$column]);       
                }
            }

            //ambil data variabel kolom A untuk label chart
            for( $i=2; $i<=$arrayCount; $i++ )
            {
                $value_a['A'][] = trim($allDataInSheet[$i]['A']);       
            }

            //ambil data variabel untuk dropdown variabel
            $row = 1;
            $lastColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
            $lastColumn++;
            for ($column1 = 'B'; $column1 != $lastColumn; $column1++) {
                $variabel = $objPHPExcel->getActiveSheet()->getCell($column1.$row)->getCalculatedValue();
                $variabel_new[$column1]['nama'] = $variabel; 
                $variabel_new[$column1]['kolom'] = $column1; 
            }  


            if (!$this->Variabel_model->is_exist($id)){
                for ($i=0; $i < count($variabel_new) ; $i++) { 
                    $data = array(
                        'id_grafik' => $id_grafik,
                        'nilai' => null,
                        );
                        $this->Variabel_model->insert($data);     
                }
            }
            
            // semua data dalam excel
            foreach ($cell_collection as $cell) {

                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue();
                 if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }

                //halaman tabel   
                $config['per_page'] = 10;
                $config['page_query_string'] = TRUE;
                $config['total_rows'] = $objPHPExcel->getActiveSheet()->getHighestRow();
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                // echo "<pre>"; var_dump($value_dalam); echo "</pre>";

                $data = array(
                    'button' => 'Create',
                    'action' => site_url('grafik/update_action/'.$id),
                    'pagination' => $this->pagination->create_links(),
                    'total_rows' => $config['total_rows'],
                    'header'     => $header,
                    'values'     => $arr_data,
                    'value2'     => $value_dalam,
                    'label'     => $value_a,
                    'variabel'   => $variabel_new, 
                    'selected_variabel'   => $this->Variabel_model->get_by_id_grafik_all($id_grafik),   
                    'nama_tabel' => $filename->deskripsi,
                    'id_grafik'  => $id_grafik,
                    'id_jenis_grafik'  => $this->Grafik_model->get_by_id($id_grafik)->id_jenis_grafik,
                    'title'      => 'Grafik',
                    'subtitle'   => '',
                    );
                $data['color']=array('#e6194b', '#3cb44b', '#ffe119', '#4363d8', '#f58231', '#911eb4', '#46f0f0', '#f032e6', '#bcf60c', 
                                    '#fabebe', '#008080', '#e6beff', '#9a6324', '#fffac8', '#800000', '#aaffc3', '#808000', '#ffd8b1', 
                                    '#000075', '#808080', '#ffffff', '#000000');
                $data['jenis_grafik'] = $this->db->get('jenis_grafik')->result();
                $data['crumb'] = [
                    'Dashboard' => '',
                ];
                if ($this->Grafik_model->get_by_id($id_grafik)->id_jenis_grafik=='3'){
                    $data['code_js'] = 'grafik/piejs';
                }else{
                    $data['code_js'] = 'grafik/codejs';
                }
                $data['page'] = 'grafik/grafik';
                $this->load->view('template/backend', $data);
        }else{

            $data['code_js'] = 'grafik/codejs';
            $data['page'] = 'grafik/tabel';
            $this->load->view('template/backend', $data);
            redirect('dashboard', 'refresh');

        }   
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('nama_grafik', 'nama grafik', 'trim|required');

        $this->form_validation->set_rules('id_grafik', 'id_grafik', 'trim');
        // $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
  }//end of function 



/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */