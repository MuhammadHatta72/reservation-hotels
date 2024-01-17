<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_pengguna = mysqli_query($conn, "SELECT * FROM users WHERE NOT role = 'admin'");
$query_hasil_pengguna = mysqli_fetch_all($query_pengguna, MYSQLI_ASSOC);

$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Pengguna');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/admin/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA PENGGUNA',0,1,'C');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'UPT PELABUHAN PERIKANAN PANTAI BULU',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,'Dinas Kelautan dan Perikanan Provinsi Jawa Timur - UPT Pelabuhan Perikanan Pantai Bulu',0,1,'C');

//add break line
$pdf->Ln(10);


// add line
$pdf->Line(10,38,287,38);
$pdf->SetLineWidth(1);
$pdf->Line(10,39,287,39);
$pdf->SetLineWidth(0);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(11,10,'No',1,0,'C');
$pdf->Cell(86,10,'Nama',1,0,'C');
$pdf->Cell(50,10,'Username',1,0,'C');
$pdf->Cell(50,10,'Email',1,0,'C');
$pdf->Cell(40,10,'Nomor Telepon',1,0,'C');
$pdf->Cell(40,10,'Verifikasi Admin',1,0,'C');

$pdf->SetFont('Arial','',10);
// display data pengguna
$no = 1;
foreach($query_hasil_pengguna as $pengguna){
    $pdf->Ln(10);
    $pdf->Cell(11,10,$no,1,0,'C');
    $pdf->Cell(86,10,$pengguna['nama'],1,0,'C');
    $pdf->Cell(50,10,$pengguna['username'],1,0,'C');
    $pdf->Cell(50,10,$pengguna['email'],1,0,'C');
    $pdf->Cell(40,10,$pengguna['no_telp'],1,0,'C');
    $pdf->Cell(40,10,$pengguna['status_verifikasi_admin'] == 'sudah_verifikasi' ? 'Sudah Verifikasi' : 'Belum Verifikasi',1,0,'C');
    $no++;
}

$pdf->Output();
?>