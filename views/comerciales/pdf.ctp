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
$tcpdf->Cell(0,10,"Informe de Comerciales",1,1,'C');

$html = '<br><br><table>';
$html .='<tr>';
$html .='<th>Nombre</th> 
	<th>Apellidos</th> 
	<th>Teléfono</th>
        <th>% Comisión</th>';
$html .='</tr>';

foreach ($comerciales as $comercial){
	$html .= '<tr>';
	$html .= '<td>'.$comercial['Comerciale']['nombre'].'</td>';
	$html .= '<td>'.$comercial['Comerciale']['apellidos'].'</td>';
	$html .= '<td>'.$comercial['Comerciale']['telefono'].'</td>';
	$html .= '<td>'.$comercial['Comerciale']['porcentaje_comision'].'</td>';
	$html .= '</tr>';
}
$html .= '</table>';
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("Comerciales.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Comerciales.pdf", "D"); //Fuerza la descarga del pdf
?>
