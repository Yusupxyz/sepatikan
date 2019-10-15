<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_sen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
		$this->load->model('Parameter_sen_model');
		$this->load->model('Nilai_sen_model');
		$this->load->model('Data_sen_model');
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
		$data['title'] = 'DATA SOSIAL EKONOMI NELAYAN <br>'.strtoupper($nama_sungai).'<br>'.$tahun;
		$data['subtitle'] = 'DATA TAHUN '.$tahun;
		$data['parameter'] = $this->Parameter_sen_model->get_all();
		foreach ($data['parameter'] as $key => $value) {
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_1);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_2);
			$data['nilai_parameter'][$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_3);
		}
		$data['rata'] = $this->Data_sen_model->get_all_join();
		// print("<pre>".print_r($data['rata'],true)."</pre>");		
        $data['action2'] = 'data_tampil_ikan';
        $data['action3'] = 'data_tampil_ekologis';
        $data['action4'] = 'data_tampil_sen';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
		$this->load->view('Data/data_sen', $data);
	}

	public function download($title,$id_sungai,$id_tahun,$jenis_data)
    {
		//title
		$title = str_replace("%3Cbr%3E"," ",$title);
		$title = str_replace("%20"," ",$title);

		// Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('YH')
            ->setLastModifiedBy('YH')
            ->setTitle("Data Sosial Ekonomi Nelayan")
            ->setSubject("Data Sepatikan")
            ->setDescription("Laporan Data Sosial Ekonomi Nelayan")
            ->setKeywords("Data Sosial Ekonomi Nelayan Sepatikan");
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
	  $style_col2 = array(
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
	  $excel->getActiveSheet()->mergeCells('A1:C1'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	  // Buat header tabel nya pada baris ke 3
	  $excel->setActiveSheetIndex(0)->setCellValue('A2', "No"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('B2', "Parameter"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('C2', "Data Rata-rata"); // Set kolom A3 dengan tulisan "NO"

	  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	  $excel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	  
	  //data
	  $parameter = $this->Parameter_sen_model->get_all();
	  foreach ($parameter as $key => $value) {
		$nilai_parameter[$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_1);
		$nilai_parameter[$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_2);
		$nilai_parameter[$value->id][] = $this->Nilai_sen_model->get_by_id($value->id_nilai_3);
	  }
	  $rata = $this->Data_sen_model->get_all_join();
	  // #Data parameter
	  $no=1;
	  $i=1;
	  $k=0;
	  $numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 8
	  foreach($parameter as $data){ // Lakukan looping pada variabel siswa
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
		$temp1=$numrow;
		$temp2=$numrow+3;
		$excel->getActiveSheet()->mergeCells('A'.$temp1.':A'.$temp2); // Set Merge Cell pada kolom A1 sampai E1
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->parameter);
		foreach($nilai_parameter[$value->id] as $subdata){
			$numrow=$numrow+1;
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $i++.'. '.$subdata->nilai);
		}
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, ucfirst(isset($rata[$k++]->nilai) ? $rata[$k++]->nilai : 'Belum diketahui'));
		$excel->getActiveSheet()->mergeCells('C'.$temp1.':C'.$temp2); // Set Merge Cell pada kolom A1 sampai E1

		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A'.$temp1.':A'.$temp2)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('B'.$temp1.':B'.$temp2)->applyFromArray($style_row2);
		$excel->getActiveSheet()->getStyle('C'.$temp1.':C'.$temp2)->applyFromArray($style_row);

		$numrow++; // Tambah 1 setiap kali looping
	  }	  

	  // Set width kolom
	  $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
	  $excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); // Set width kolom B
	  $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	  
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
