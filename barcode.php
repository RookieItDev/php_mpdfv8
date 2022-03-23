<?php


use Mpdf\QrCode\QrCode;

require_once __DIR__ . '/vendor/autoload.php';
$product = $_POST['product'];
$product_id = $_POST['product_id'];
$rate = $_POST['rate'];


ob_start();


		for($i=1;$i<=$_POST['print_qty'];$i++){
			$html .= '<table>';
			$html .= '<tr>';
			$html .= '<th></th>';
			$html .= '<th></th>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td><barcode  code='.$product_id.' type="QR"  class="barcode" disableborder="1" /><p style="text-indent: 20; font-size: 10px;">'.$product_id.'</p></td>';
			$html .= '<td><p style="text-indent: 20; font-size: 10px;">'.$product.'  
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</p><p style="text-indent: 20; font-size: 10px;">'.$product.'  '.$product_id.'</p>
						</td>';
			
			$html .= '</tr>';
		
			$html .= '</table>';
			// $html .= "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($_POST['product_id']))."<span ><b>Price: ".$rate." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		}


// $html = '<div class="row row-cols-2">';
// $html .= '<div class="col">   <div class="barcodecell"><barcode code="'.$id_barcode.'" type="UPCE" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
// $html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="UPCE" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
// $html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="UPCE" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
// $html .= '<div class="col">  <div class="barcodecell"><barcode code="'.$id_barcode.'" type="UPCE" class="barcode" size="0.8" error="M" disableborder="1" /></div> </div>';
// $html .= '</div>';
// $html .=' <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div>';
// $html .=' <div class="barcodecell"><barcode code="'.$id_barcode.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1" /></div>';

try {

	$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf(	['mode' => 'utf-8', 'format' => [100, 67],
[
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]
]);
	// $mpdf = new \Mpdf\Mpdf(
	// 	['mode' => 'utf-8', 'format' => [100, 67]
		
		
		
	// 	]
		
	// 	);
	$mpdf->WriteHTML($html);
	// $mpdf ->SetAutoPageBreak(true,60);

} catch (\Mpdf\MpdfException $e) {

	die ($e->getMessage());

}

$mpdf->Output();

?>






<!-- <html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</TIDY_TAG_STYLE>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style=>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php

		// include 'barcode128.php';
		// $product = $_POST['product'];
		// $product_id = $_POST['product_id'];
		// $rate = $_POST['rate'];

		// for($i=1;$i<=$_POST['print_qty'];$i++){
		// 	echo "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($_POST['product_id']))."<span ><b>Price: ".$rate." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		// }

		?>
	</div>
</body>
</html> -->


