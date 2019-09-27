<?php

// MEMBUAT OBJEK READER BARU
$objReader = PHPExcel_IOFactory::createReader("Excel2007"); //untuk Excel 2007 ke atas (format xml)
$objReader = PHPExcel_IOFactory::createReader("Excel5"); //untuk Excel 2003 ke bawah (format BIFF / binary)

//MEMUAT FILE
$inputFileName = "/lokasi_file/test.xls";
$objPHPExcel = $objReader->load($inputFileName);

//MENGAMBIL WORKSHEET YANG AKTIF
$sheet = $phpExcel->getActiveSheet();

//MENGAMBIL JUMLAH BARIS DALAM FILE
$total_baris = $objPHPExcel->getActiveSheet()->getHighestRow();

//MENGAMBIL KOLOM PALING AKHIR
$kolom_terakhir = $objPHPExcel->getActiveSheet()->getHighestColumn();

//MENGAMBIL SEBUAH SEL
$cell = $objPHPExcel->getActiveSheet()->getCell("A1");

//MENGAMBIL NILAI/ISI DARI SEBUAH SEL
$cellValue = $objPHPExcel->getActiveSheet()->getCell("A1")->getValue();
//A1 adalah contoh. A untuk column dan 1 untuk row

//MENGAMBIL NILAI YANG SUDAH DIKALKULASI DI SEBUAH SEL
$cell_calc = $objPHPExcel->getActiveSheet()->getCell("A1")->getCalculatedValue();

//MENGAMBIL NILAI DARI SEBUAH SEL KE FORMAT YANG DIINGINKAN, misalnya format waktu hh:mm:ss
$cell_calc = $objPHPExcel->getActiveSheet()->getCell("A1")->getCalculatedValue();
$time = PHPExcel_Style_NumberFormat::toFormattedString($cell_calc->getCalculatedValue(), 'hh:mm:ss');

//MENGECEK APAKAH SEBUAH FORMAT SEBUAH SEL ADAKAH DATE
$is_date = PHPExcel_Shared_Date::isDateTime($objPHPExcel->getActiveSheet()->getCell("A1"))

//MENGKONVERSI KOLOM DARI HURUF KE ANGKA
$colNumber = PHPExcel_Cell::columnIndexFromString($colString);

//MENGKONVERSI KOLOM DARI ANGKA KE HURUF
$colString = PHPExcel_Cell::stringFromColumnIndex($colNumber);

//MEMBERSIHKAN OBJEK PHPEXCEL DARI MEMORY
$objPHPExcel->disconnectWorksheets();
unset($objPHPExcel);

?>