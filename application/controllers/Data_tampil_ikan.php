<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tampil_ikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Jenis_data_model');
        $this->load->model('Tahun_model');
        $this->load->model('Sungai_model');
        $this->load->model('Rata_tangkapan_ikan_model');
        $this->load->model('Data_tangkapan_ikan_model');
        $this->load->model('Alat_tangkapan_ikan_model');
        $this->load->model('Lokasi_tangkapan_ikan_model');
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
		$data['title'] = 'Data Penangkapan Ikan '.ucfirst($nama_sungai).' Tahun '.$tahun;
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['rata_hujan'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['rata_kemarau'][] = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_ikan_hujan'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_ikan_kemarau'][] =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_alat_hujan'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_alat_kemarau'][] =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
		$data['data_lokasi_hujan'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		$data['data_lokasi_kemarau'][] =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		// print("<pre>".print_r($data['data_alat_hujan'],true)."</pre>");		
        $data['action2'] = 'data_tampil_ikan';
        $data['action3'] = 'data_tampil_ekologis';
        $data['action4'] = 'data_tampil_sen';
        $data['modal'] = 'cover/modal';
        $data['codejs'] = 'cover/codejs';
		$this->load->view('Data/data_penangkapan_ikan', $data);
	}

	public function download($jenis,$title,$id_sungai,$id_tahun,$jenis_data)
    {
		if ($jenis==0){
			$sub = '(Rekap)';
			$rata_hujan = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
			$rata_kemarau = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
			$data_ikan_hujan =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
			$data_ikan_kemarau =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
			$data_alat_hujan =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
			$data_alat_kemarau =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
			$data_lokasi_hujan =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1');
			$data_lokasi_kemarau =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2');
		}elseif ($jenis==1){
			$sub = '(Stasiun 1)';
			$rata_hujan = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
			$rata_kemarau = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
			$data_ikan_hujan =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
			$data_ikan_kemarau =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
			$data_alat_hujan =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
			$data_alat_kemarau =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
			$data_lokasi_hujan =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','1');
			$data_lokasi_kemarau =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','1');
		}elseif ($jenis==2){
			$sub = '(Stasiun 2)';
			$rata_hujan = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
			$rata_kemarau = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
			$data_ikan_hujan =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
			$data_ikan_kemarau =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
			$data_alat_hujan =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
			$data_alat_kemarau =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
			$data_lokasi_hujan =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','2');
			$data_lokasi_kemarau =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','2');
		}elseif ($jenis==3){
			$sub = '(Stasiun 3)';
			$rata_hujan = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
			$rata_kemarau = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
			$data_ikan_hujan =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
			$data_ikan_kemarau =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
			$data_alat_hujan =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
			$data_alat_kemarau =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
			$data_lokasi_hujan =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','3');
			$data_lokasi_kemarau =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','3');
		}elseif ($jenis==4){
			$sub = '(Stasiun 4)';
			$rata_hujan = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
			$rata_kemarau = $this->Rata_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
			$data_ikan_hujan =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
			$data_ikan_kemarau =$this->Data_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
			$data_alat_hujan =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
			$data_alat_kemarau =$this->Alat_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
			$data_lokasi_hujan =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'1','4');
			$data_lokasi_kemarau =$this->Lokasi_tangkapan_ikan_model->get_data($id_sungai,$jenis_data,$id_tahun,'2','4');
		}
		// Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('YH')
            ->setLastModifiedBy('YH')
            ->setTitle("Data Tangkapan Ikan")
            ->setSubject("Data Sepatikan")
            ->setDescription("Laporan Data Tangkapan Ikan")
            ->setKeywords("Data Tangkapan Ikan Sepatikan");
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
	  $excel->setActiveSheetIndex(0)->setCellValue('A1', str_replace("%20"," ",$title).' '.$sub); // Set kolom A1 dengan tulisan "DATA SISWA"
	  $excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	  $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	  // Buat header tabel nya pada baris ke 3
	  $excel->setActiveSheetIndex(0)->setCellValue('A2', "Parameter"); // Set kolom A3 dengan tulisan "NO"
	  $excel->setActiveSheetIndex(0)->setCellValue('B2', "Periode 1 (Musim Hujan)"); // Set kolom B3 dengan tulisan "NIS"
	  $excel->setActiveSheetIndex(0)->setCellValue('C2', "Periode 2 (Musim Kemarau)"); // Set kolom C3 dengan tulisan "NAMA"
	  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	  $excel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	  $excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	  // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	  //#Rata-rata tangkapan
		// print("<pre>".print_r($rata_hujan[0]->rata_rata,true)."</pre>");		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', 'Rata rata hasil tangkapan total per nelayan per hari (kg/hari/nelayan)');
		$excel->setActiveSheetIndex(0)->setCellValue('B3', !isset($rata_hujan[0]->rata_rata) ? $rata_hujan[0]->rata_rata : '0');
		$excel->setActiveSheetIndex(0)->setCellValue('C3', !isset($rata_kemarau[0]->rata_rata) ? $rata_hujan[0]->rata_rata : '0');
		
		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_row);
		
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('E2', "Hasil tangkapan ikan di sungai berdasarkan jenis ikan"); // Set kolom A3 dengan tulisan "NO"
		$excel->getActiveSheet()->mergeCells('E2:H2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Periode 1 (musim hujan)"); // Set kolom A3 dengan tulisan "NO"
		$excel->getActiveSheet()->mergeCells('E3:H3'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "No."); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Nama Ikan"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Hasil Tangkapan (kg/hari/nelayan)"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "Ukuran Ikan Rata-rata (gram/ekor)"); // Set kolom C3 dengan tulisan "NAMA"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('E2:H4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// #Data tangkapan ikan
		  $no = 1; // Untuk penomoran tabel, di awal set dengan 1
		  $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 8
		  foreach($data_ikan_hujan as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ikan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->hasil);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->ukuran);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		  }	  
		
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, "Periode 2 (musim kemarau)"); // Set kolom A3 dengan tulisan "NO"
		$excel->getActiveSheet()->mergeCells('E'.$numrow.':H'.$numrow); // Set Merge Cell pada kolom A1 sampai E1
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('E'.$numrow.':H'.$numrow)->applyFromArray($style_col);
		  foreach($data_ikan_kemarau as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ikan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->hasil);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->ukuran);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		  }

		$excel->setActiveSheetIndex(0)->setCellValue('J2', "Data penggunaan alat tangkap dan lokasi"); // Set kolom A3 dengan tulisan "NO"
		$excel->getActiveSheet()->mergeCells('J2:L2'); // Set Merge Cell pada kolom A1 sampai E1
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('J2:L2')->applyFromArray($style_col);
		  // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		  // #Alat dan lokasi tangkapan ikan
			$excel->setActiveSheetIndex(0)->setCellValue('J3', '1');
			$excel->setActiveSheetIndex(0)->setCellValue('K3', 'Alat tangkap ikan yang digunakan pada periode 1 (musim hujan)');
			$no = 1;
			$numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 8
			foreach($data_alat_hujan as $data){ // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $no++.' '.$data->alat);
				$numrow++;
			}
			if (empty($data_alat_hujan)) $numrow++;

			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, '2');
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, 'Alat tangkap ikan yang digunakan pada periode 2 (musim kemarau)');
			$no = 1;
			foreach($data_alat_kemarau as $data){ // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $no++.' '.$data->alat);
				$numrow++;
			}
			if (empty($data_alat_kemarau)) $numrow++;

			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, '3');
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, 'Lokasi penangkapan pada periode 1 (musim hujan)');
			$no = 1;
			foreach($data_lokasi_hujan as $data){ // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $no++.' '.$data->alat);
				$numrow++;
			}
			if (empty($data_lokasi_hujan)) $numrow++;

			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, '4');
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, 'Lokasi penangkapan pada periode 2 (musim kemarau)');
			$no = 1;
			foreach($data_lokasi_kemarau as $data){ // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $no++.' '.$data->alat);
				$numrow++;
			}
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('J3:J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K3:K'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('L3:L'.$numrow)->applyFromArray($style_row2);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('J2')->applyFromArray($style_col);

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
	  $excel->getActiveSheet()->getColumnDimension('L')->setWidth(12); // Set width kolom C
	  
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
