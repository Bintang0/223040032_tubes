<?php 
require_once("tcpdf/tcpdf.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Icika wangy');
$pdf->setTitle('Download Pdf');
$pdf->setSubject('Data Customer');
$pdf->setKeywords('Data Customer');

$pdf->setFont('times', '', 11, '', true);
$pdf->AddPage();

$html = file_get_contents("http://localhost/pw2023_223040032/tubes/cetakpdf.php");

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Data Customer.pdf', 'I');
