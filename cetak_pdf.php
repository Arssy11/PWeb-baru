<?php
include 'koneksi.php';
require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

/* ================= JUDUL ================= */
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'LAPORAN DATA SEWA MOTOR',0,1,'C');
$pdf->Ln(5);

/* ================= HEADER ================= */
$pdf->SetFont('Arial','B',9);
$pdf->Cell(8,8,'No',1);
$pdf->Cell(35,8,'Merk',1);
$pdf->Cell(35,8,'Tipe',1);
$pdf->Cell(30,8,'Plat',1);
$pdf->Cell(30,8,'Harga',1);
$pdf->Cell(25,8,'Status',1);
$pdf->Cell(45,8,'Gambar Motor',1);
$pdf->Cell(45,8,'KTP',1);
$pdf->Ln();

/* ================= DATA ================= */
$pdf->SetFont('Arial','',9);
$no = 1;
$data = mysqli_query($conn,"SELECT * FROM motor");

while($d = mysqli_fetch_array($data)){

    $rowHeight = 25;

    $pdf->Cell(8,$rowHeight,$no++,1);
    $pdf->Cell(35,$rowHeight,$d['merk_motor'],1);
    $pdf->Cell(35,$rowHeight,$d['tipe_motor'],1);
    $pdf->Cell(30,$rowHeight,$d['plat_nomor'],1);
    $pdf->Cell(30,$rowHeight,number_format($d['harga_sewa']),1);
    $pdf->Cell(25,$rowHeight,$d['status_motor'],1);

    /* ===== GAMBAR MOTOR ===== */
    $x_motor = $pdf->GetX();
    $y_motor = $pdf->GetY();
    $pdf->Cell(45,$rowHeight,'',1);

    $path_motor = 'gambar_motor/'.$d['gambar_motor'];
    if(!empty($d['gambar_motor']) && file_exists($path_motor)){
        $info = getimagesize($path_motor);
        if($info){
            $imgW = 20;
            $imgH = 20;
            $pdf->Image(
                $path_motor,
                $x_motor + (45 - $imgW) / 2,
                $y_motor + (25 - $imgH) / 2,
                $imgW,
                $imgH,
                ($info['mime']=='image/png'?'PNG':'JPG')
            );
        }
    }

    /* ===== KTP ===== */
    $x_ktp = $pdf->GetX();
    $y_ktp = $pdf->GetY();
    $pdf->Cell(45,$rowHeight,'',1);

    $path_ktp = 'ktp/'.$d['foto_ktp'];
    if(!empty($d['foto_ktp']) && file_exists($path_ktp)){
        $info = getimagesize($path_ktp);
        if($info){
            $imgW = 20;
            $imgH = 20;
            $pdf->Image(
                $path_ktp,
                $x_ktp + (45 - $imgW) / 2,
                $y_ktp + (25 - $imgH) / 2,
                $imgW,
                $imgH,
                ($info['mime']=='image/png'?'PNG':'JPG')
            );
        }
    }

    $pdf->Ln();
}

$pdf->Output();
?>
