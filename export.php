<?php
include('connection.php');
require_once __DIR__ . '/vendor/autoload.php';
require('fpdf/fpdf.php');
// CSV Export
if(isset($_POST['csv'])){
    $filename = 'users.csv';
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename='.$filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Firstname', 'Lastname','Email','Password', 'Gender'));
    $sql= "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}
// Query to fetch all contacts data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();
// Set the font and size for the header row
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Id',1);
$pdf->Cell(40,10,'Firstname',1);
$pdf->Cell(40,10,'Lastname',1);
$pdf->Cell(75,10,'Email',1);
$pdf->Cell(40,10,'Password',1);
$pdf->Cell(40,10,'Gender',1);
$pdf->Ln();
// Loop through the data and add to the PDF
$pdf->SetFont('Arial','',14);
while($row = mysqli_fetch_row($result)) {
    $pdf->Cell(40,10,$row[1],1);
    $pdf->Cell(40,10,$row[1],1);
    $pdf->Cell(40,10,$row[1],1);
    $pdf->Cell(75,10,$row[3],1);
    $pdf->Cell(40,10,$row[2],1);
    $pdf->Cell(40,10,$row[4],1);
    $pdf->Ln();
}
// Output the PDF document
$pdf->Output();
?>