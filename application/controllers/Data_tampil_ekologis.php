<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_ekologis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
        $this->load->model('Paramter_ekologis_model');
        $this->load->model('Data_ekologis_model');
	}
	
	public function index($id_sungai,$jenis_data,$id_tahun)
	{
		$data['id_sungai'] = $id_sungai;
		$data['jenis_data'] = $jenis_data;
		$data['id_tahun'] = $id_tahun;
		$data['options'] = $this->Sungai_model->get_option();
		$data['options2'] = $this->Jenis_data_model->get_option();
		$data['options3'] = $this->Tahun_model->get_option();
		$data['attribute'] = 'class="form-control inline" id="sungai"';
		$data['attribute2'] = 'class="form-control inline" id="jenis_data"';
		$data['attribute3'] = 'class="form-control inline" id="lokasi"';
		$data['attribute4'] = 'class="form-control inline" id="jd"';
		$data['attribute5'] = 'class="form-control inline" id="tahun"';
        $nama_sungai = $this->Sungai_model->get_by_id($id_sungai)->sungai;
        $tahun = $this->Tahun_model->get_by_id($id_tahun)->tahun;
		$data['title'] = 'DATA EKOLOGIS '.$tahun.'<br>'.strtoupper($nama_sungai);
		$data['subtitle'] = 'DATA TAHUN '.$tahun;
		$data['parameter'] = $this->Paramter_ekologis_model->get_all();
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data1'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data2'][] = $this->Data_ekologis_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		// print("<pre>".print_r($data['data1'],true)."</pre>");		
        $data['action2'] = 'data_tampil_ikan';
        $data['action3'] = 'data_tampil_ekologis';
        $data['action4'] = 'data_tampil_sen';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
		$this->load->view('Data/data_ekologis', $data);
	}

	public function download($title,$id_sungai,$id_tahun,$jenis_data)
    {
		//title
		$title = str_replace("%3Cbr%3"," ",$title);
		$title = str_replace("%20"," ",$title);

		// Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('YH')
            ->setLastModifiedBy('YH')
            ->setTitle("Data Ekologis")
            ->setSubject("Data Sepatikan")
            ->setDescription("Laporan Data Ekologis")
            ->setKeywords("Data Ekologis Sepatikan");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    	$style_col = array(
		'font' => array('bold' => true), // Set font nya jadi bold
		'alignment' => array(
		  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
		  'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		  'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		  'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		  'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
	  );
	  // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	  $style_row = array(
		'alignment' => array(
		  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
		  'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		  'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		  'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		  'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
	  );
	  // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	  $style_row2 = array(
		'borders' => array(
		  'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		  'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		  'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		  'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
	  );
	  $excel->setActiveSheetIndex(0)->setCellValue('A1', $title ); // Set kolom A1 dengan tulisan "DATA SISWA"
	  $excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	  // Buat header tabel nya pada baris ke 3
	  $excel->setActiveSheetIndex(0)->setCellValue('A2', "DATA TAHUN 2019"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('A2:K2'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('A3', "PARAMETER"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('A3:A5'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('B3', "PERIODE 1 (musim hujan)"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('B3:F3'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('G3', "PERIODE 2 (musim kemarau)"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('G3:K3'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('B4', "STASIUN"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('B4:F4'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('G4', "STASIUN"); // Set kolom A3 dengan tulisan "NO"
	  $excel->getActiveSheet()->mergeCells('G4:K4'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->setActiveSheetIndex(0)->setCellValue('B5', "1"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('C5', "2"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('D5', "3"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('E5', "4"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('F5', "5"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('G5', "1"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('H5', "2"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('I5', "3"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('J5', "4"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('K5', "5"); // Set kolom A3 dengan tulisan "NO"

	  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	  $excel->getActiveSheet()->getStyle('A2:K2')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('B3:F3')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('G3:K3')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('B4:F4')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('G4:K4')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
	  
	  //data
	  $parameter = $this->Paramter_ekologis_model->get_all();
	  // #Data parameter
	  $i=0;
	  $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 8
	  foreach($parameter as $data){ // Lakukan looping pada variabel siswa
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->parameter);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $n1= isset($data1[0][$i]->data) ? $data1[0][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $n2= isset($data1[1][$i]->data) ? $data1[1][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $n3= isset($data1[2][$i]->data) ? $data1[2][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $n4= isset($data1[3][$i]->data) ? $data1[3][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, ($n1+$n2+$n3+$n4)/4);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $n1= isset($data2[0][$i]->data) ? $data2[0][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $n2= isset($data2[1][$i]->data) ? $data2[1][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $n3= isset($data2[2][$i]->data) ? $data2[2][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $n4= isset($data2[3][$i]->data) ? $data2[3][$i++]->data : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, ($n1+$n2+$n3+$n4)/4);

		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);

		$numrow++; // Tambah 1 setiap kali looping
	  }	  

	  // Set width kolom
	  $excel->getActiveSheet()->getColumnDimension('A')->setWidth(60); // Set width kolom A
	  $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
	  $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	  $excel->getActiveSheet()->getColumnDimension('E')->setWidth(5); // Set width kolom A
	  $excel->getActiveSheet()->getColumnDimension('F')->setWidth(12); // Set width kolom B
	  $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom C
	  $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom C
	  $excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom B
	  $excel->getActiveSheet()->getColumnDimension('K')->setWidth(55); // Set width kolom C
	  
	  // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	  $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	  // Set orientasi kertas jadi LANDSCAPE
	  $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	  // Set judul file excel nya
	  $excel->getActiveSheet(0)->setTitle("Laporan Data Penangkapan Ikan");
	  $excel->setActiveSheetIndex(0);
	  // Proses file excel
	  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	  header('Content-Disposition: attachment; filename="Data Sepatikan Penangkapan Ikan.xlsx"'); // Set nama file excel nya
	  header('Cache-Control: max-age=0');
	  $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	  $write->save('php://output');
    }

}
