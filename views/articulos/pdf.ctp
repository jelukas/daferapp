<?php
error_reporting(E_ALL);
App::import('Vendor','tcpdf');
$tcpdf = new TCPDF();
$textfont = 'freesans';
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor("autor");
$tcpdf->SetTitle("Título");
$tcpdf->SetSubject("Subtítulo");
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AliasNbPages();
$tcpdf->AddPage();
$tcpdf->SetFont("freesans", "B", 9);
$tcpdf->Cell(0,10,"Informe de Artículos",1,1,'C');

$html = '<br><br><table>';
$html .='<tr>';
$html .='<th>Ref</th>   
	<th>Nombre</th> 
	<th>Código de barras</th> 
	<th>Precio (sin iva)</th>
        <th>Família</th>
	<th>Localización</th>
	<th>Existencias</th>
	<th>Almacén</th>';
$html .='</tr>';

foreach ($articulos as $articulo){
	$html .= '<tr>';
	$html .= '<td>'.$articulo['Articulo']['ref'].'</td>';
	$html .= '<td>'.$articulo['Articulo']['nombre'].'</td>';
	$html .= '<td>'.$articulo['Articulo']['codigobarras'].'</td>';
	$html .= '<td>'.$articulo['Articulo']['precio_sin_iva'].'</td>';
	$html .= '<td>'.$articulo['Familia']['nombre'].'</td>';
	$html .= '<td>'.$articulo['Articulo']['localizacion'].'</td>';
	$html .= '<td>'.$articulo['Articulo']['existencias'].'</td>';
	$html .= '<td>'.$articulo['Almacene']['nombre'].'</td>';
	$html .= '</tr>';
}
$html .= '</table>';
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("Articulos.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
