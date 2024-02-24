<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_pemesanan = mysqli_query($conn, "SELECT *, bookings.id AS id_booking, bookings.status AS status_booking FROM bookings INNER JOIN users ON bookings.user_id = users.id INNER JOIN rooms ON bookings.room_id = rooms.id");
$query_hasil_pemesanan = mysqli_fetch_all($query_pemesanan, MYSQLI_ASSOC);

$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Pemesanan');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/admin/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA PEMESANAN KAMAR',0,1,'C');
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
$pdf->Cell(20,10,'No. Kamar',1,0,'C');
$pdf->Cell(30,10,'Tanggal Mulai',1,0,'C');
$pdf->Cell(30,10,'Tanggal Selesai',1,0,'C');
$pdf->Cell(20,10,'Metode',1,0,'C');
$pdf->Cell(40,10,'Status',1,0,'C');
$pdf->Cell(40,10,'Pembayaran',1,0,'C');

$pdf->SetFont('Arial','',10);
// display data pemesanan
$no = 1;
foreach($query_hasil_pemesanan as $pemesanan){
    $pdf->Ln(10);
    $pdf->Cell(11,10,$no,1,0,'C');
    $pdf->Cell(86,10,$pemesanan['nama'],1,0,'C');
    $pdf->Cell(20,10,$pemesanan['room_number'],1,0,'C');
    $pdf->Cell(30,10,$pemesanan['check_in_date'],1,0,'C');
    $pdf->Cell(30,10,$pemesanan['check_out_date'],1,0,'C');
    $pdf->Cell(20,10,$pemesanan['metode_pembayaran'],1,0,'C');
    $pdf->Cell(40,10,$pemesanan['status_booking'],1,0,'C');
    $pdf->Cell(40,10, "Rp. " . number_format($pemesanan['pembayaran'],0,',','.'),1,0,'C');
    $no++;
}

$pdf->Ln(10);

//add row total
$pdf->Cell(237,10,'Total',1,0,'C');
$pdf->Cell(40,10,'Rp. ' . number_format(array_sum(array_column($query_hasil_pemesanan, 'pembayaran')), 0, ',', '.'),1,0,'C');



$pdf->Output();
?>