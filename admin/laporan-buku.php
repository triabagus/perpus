<?php
include "../conn.php";
require('../fpdf17/fpdf.php');
/**
 Judul  : Laporan PDF (portait):
 Level  : Menengah
 Author : Hakko Bio Richard
 Blog   : www.hakkoblogs.com
 Web    : www.niqoweb.com
 Email  : hakkobiorichard@gmail.com
 
 Untuk tutorial yang lainnya silahkan berkunjung ke www.hakkoblogs.com
 
 Butuh jasa pembuatan website, aplikasi, pembuatan program TA dan Skripsi.? Hubungi NiqoWeb ==>> 085694984803
 
 **/
//Menampilkan data dari tabel di database

$result=mysql_query("SELECT * FROM data_buku ORDER BY id ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
//$column_id = "";
$column_noinduk = "";
$column_nama = "";
$column_jk = "";
$column_kelas = "";
$column_ttl = "";
$column_alamat = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	//$id = $row["id"];
    $noinduk = $row["id"];
    $nama = $row["pengarang"];
    $jk = $row["th_terbit"];
    $kelas = $row["jumlah_buku"];
	$ttl = $row["penerbit"];
    $alamat = $row["lokasi"];
 
    

	//$column_id = $column_id.$id."\n";
    $column_noinduk = $column_noinduk.$noinduk."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_jk = $column_jk.$jk."\n";
    $column_kelas = $column_kelas.$kelas."\n";
    $column_ttl = $column_ttl.$ttl."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(220,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('../img/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA BUKU',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'PerPusWeb (Perpustakaan Berbasis Web)',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(20,8,'Id',1,0,'C',1);
$pdf->SetX(25);
$pdf->Cell(55,8,'Pengarang',1,0,'C',1);
$pdf->SetX(80);
$pdf->Cell(15,8,'Terbit',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(15,8,'Jumlah',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(50,8,'Penerbit',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(55,8,'Lokasi',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(20,6,$column_noinduk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(55,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(15,6,$column_jk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(15,6,$column_kelas,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(50,6,$column_ttl,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(55,6,$column_alamat,1,'C');

$pdf->Output();
?>
