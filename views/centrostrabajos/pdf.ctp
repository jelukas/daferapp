<?php
error_reporting(E_ALL);
App::import('Vendor','tcpdf');
$tcpdf = new TCPDF();
$textfont = 'freesans';
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor("autor");
$tcpdf->SetTitle("Título");
$tcpdf->SetSubject("Subtítulo");
$tcpdf->SetKeywords("TCPDF, PDF, cakePHP, ejemplo");
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AliasNbPages();
$tcpdf->AddPage();
$tcpdf->SetFont("freesans", "B", 9);
$tcpdf->Cell(0,10,"Informe de Centros de Trabajo",1,1,'C');

$html = '<br><br><table>';
$html .='<tr>';
$html .='<th>Centro de trabajo</th>   
	<th>Cliente</th>'; 

$html .='</tr>';

foreach ($centrostrabajos as $centro){
	$html .= '<tr>';
	$html .= '<td>'.$centro['Centrostrabajo']['centrotrabajo'].'</td>';
	$html .= '<td>'.$centro['Cliente']['nombre'].'</td>';
	$html .= '</tr>';
}
$html .= '</table>';
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("Centros_Trabajo.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Centros_Trabajo.pdf", "D"); //Fuerza la descarga del pdf
?>
