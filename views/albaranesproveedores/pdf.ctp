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
$html='<table border="1" align="center">';
$html .='<tr>';
$html .='<td><p>'.$albaran['Pedidosproveedore']['Proveedore']['nombre'].'</p>';
$html .='<p>Cif: '.$albaran['Pedidosproveedore']['Proveedore']['cif'].'</p></td>';
$html .='</tr>';
$html .='</table>';

$html .='<br><br>';
$html .='<table border="1" align="center">';
$html .='<tr>';
$html .='<td>Almacén: '.$albaran['Pedidosproveedore']['Almacene']['nombre'].'</td>';
$html .='</tr>';
$html .='</table>';

$html .='<br/><br/><table>';
$html .='<tr>';
$html .='<td>';
$html .='Pedido núm: '.$albaran['Pedidosproveedore']['id'];
$html .='</td>';
$html .='</tr>';
$html .='<tr>';
$html .='<td>Fecha: '.date('d/m/Y').'</td>';
$html .='</tr>';
$html .='</table>';
$html .='<br/><br/>';

$html .='<table border="1">';
$html .='<tr>';
$html .='<th>Ref</th>';
$html .='<th>Nombre</th>';
$html .='<th>Cantidad</th>';
$html .='<th>Precio</th>';
$html .='<th>Total</th>';
$html .='</tr>';
$articulos=$albaran['Avisosrepuesto']['Articulo'];
$baseimponible=0;
foreach($articulos as $articulo)
{
    $html .='<tr>';
    $html .='<td>'.$articulo['ref'].'</td>';
    $html .='<td>'.$articulo['nombre'].'</td>';
    $html .='<td>'.$articulo['ArticulosAvisosrepuesto']['cantidad'].'</td>';
    $html .='<td>'.$articulo['precio_sin_iva'].'</td>';
    $html .='<td>'.$articulo['precio_sin_iva']*$articulo['ArticulosAvisosrepuesto']['cantidad'].'</td>';
    $html .='</tr>';
    $precio=$articulo['precio_sin_iva']*$articulo['ArticulosAvisosrepuesto']['cantidad'];
    $baseimponible+=$precio;
}
$iva=$baseimponible*0.18;
$total=$baseimponible+$iva;
$html .='</table>';
$html .='<br/><br/><br/><br/>';

$html .='<table>';
$html .='<tr>';
$html .='<td>Base Imponible:</td>';
$html .='<td>'.$baseimponible.'</td>';
$html .='</tr>';
$html .='<tr>';
$html .='<td>Impuestos:</td>';
$html .='<td>'.$iva.'</td>';
$html .='</tr>';
$html .='<tr>';
$html .='<td>Total Pedido:</td>';
$html .='<td>'.$total.'€</td>';
$html .='</tr>';
$html .='</table>';

$tcpdf->writeHTML($html, true, false, true, false, '');

$tcpdf->Output("Albaran.pdf","I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
