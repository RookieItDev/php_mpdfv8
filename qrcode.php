<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$id_barcode = '1';

$html = '<div class="row row-cols-2">';
$html .= '<div class="col">   <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
$html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
$html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
$html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
$html .= '</div>';
$html .=' <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div>';
$html .=' <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div>';

try {

	$mpdf->WriteHTML($html);

} catch (\Mpdf\MpdfException $e) {

	die ($e->getMessage());

}

$mpdf->Output();

?>