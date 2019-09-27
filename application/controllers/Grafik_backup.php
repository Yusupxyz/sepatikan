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
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
       $this->load->library('excel');
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
   public function readExcelFile($id) {
        $data['title'] = 'Tabel Acuan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $c_url = $this->router->fetch_class();
        echo $this->layout->auth_privilege($c_url); 
        $filename = $this->db->get_where('download', ["id_download" => $id])->row();
        if ($filename->file != "") {
            $filename2 = explode(".", $filename->file)[0];
            $file_path = "statistik/file_excel/$filename2.xlsx";
            $objPHPExcel = PHPExcel_IOFactory::load($file_path);
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
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
 
            $data['header'] = $header;
            $data['values'] = $arr_data;
            $data['nama_tabel'] = $filename->deskripsi;
            $data['code_js'] = 'grafik/codejs';
            $data['page'] = 'grafik/tabel';
            $this->load->view('template/backend', $data);
        }else{
        
        //$data['code_js'] = 'grafik/codejs';
        $data['page'] = 'grafik/tabel';
        $this->load->view('template/backend', $data);
            // redirect('dashboard', 'refresh');}

    }   
     


  }//end of function 

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */