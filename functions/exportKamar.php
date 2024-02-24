<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_kamar = mysqli_query($conn, "SELECT * FROM rooms");
$query_hasil_kamar = mysqli_fetch_all($query_kamar, MYSQLI_ASSOC);

$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Kamar');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/admin/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA KAMAR',0,1,'C');
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
$pdf->Cell(95,10,'Nomor Kamar',1,0,'C');
$pdf->Cell(50,10,'Harga Kamar',1,0,'C');
$pdf->Cell(120,10,'Status Kamar',1,0,'C');

$pdf->SetFont('Arial','',10);
// display data kamar
$no = 1;
foreach($query_hasil_kamar as $kamar){
    $pdf->Ln(10);
    $pdf->Cell(11,10,$no,1,0,'C');
    $pdf->Cell(95,10,$kamar['room_number'],1,0,'C');
    $pdf->Cell(50,10,number_format($kamar['harga'], 0, ',', '.'),1,0,'C');
    $pdf->Cell(120,10, $kamar['status'] == "available" ? "Tersedia" : "Tidak Tersedia",1,0,'C');
    $no++;
}

$pdf->Output();
?>