<?php
error_reporting(0);
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
$html .='<td><p>Cliente: '.$orden['Avisostallere']['Cliente']['nombre'].' &nbsp;&nbsp; Num: '.$orden['Avisostallere']['Cliente']['id'].'</p>';
$html .='<p>Máquina: '.$orden['Avisostallere']['Maquina']['nombre'].'</p>';
$html .='<p>Serie del motor: '.$orden['Avisostallere']['Maquina']['serie_motor'].'</p>';
$html .='<p>Serie de transmisión: '.$orden['Avisostallere']['Maquina']['serie_transmision'].'</p></td>';
$html .='</tr>';
$html .='</table>';

$html .='<br><br>';
$html .='<table border="1" align="center">';
$html .='<tr>';
$html .='<td>Albarán: '.$orden['Avisostallere']['Albaranescliente'][0]['numeroalbaran'].'</td>';
$html .='</tr>';
$html .='</table>';

$html .='<br/><br/><table>';
$html .='<tr>';
$html .='<td>';
$html .='Orden num: '.$orden['Ordene']['id'];
$html .='</td>';
$html .='</tr>';
$html .='<tr>';
$html .='<td>Fecha: '.date('d/m/Y').'</td>';
$html .='</tr>';
$html .='</table>';
$html .='<br/><br/>';
$html .='<table border="1">';
$tareas=$orden['Tarea'];
foreach($tareas as $tarea)
{
    $html .='<tr>';
    $html .='<td>Tarea: '.$tarea['id'].'</td>';
    $html .='<td>Descripción: '.$tarea['descripcion'].'</td>';
    $html .='</tr>';
}
$html .='</table>';

$tcpdf->writeHTML($html, true, false, true, false, '');

$tcpdf->Output("Orden.pdf","I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
