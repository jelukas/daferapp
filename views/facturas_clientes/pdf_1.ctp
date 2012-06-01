<?php
//error_reporting(E_ALL);
App::import('Vendor','tcpdf');
$tcpdf = new TCPDF();
$textfont = 'freesans';
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor("autor");
$tcpdf->SetTitle("Título");
$tcpdf->SetSubject("Subtítulo");

$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AliasNbPages();
$tcpdf->AddPage();

$html2='';
$subtotal=0;
if($facturaCliente['Avisosrepuesto']['id']!=null && $facturaCliente['Avisosrepuesto']['id']>=0)
{
    foreach($facturaCliente['Avisosrepuesto']['Articulo'] as $articulo)
    {
        $html2.='<tr>';
        $html2.='<td>'.$articulo['ref'].'</td>';
        $html2.='<td>'.$articulo['nombre'].'</td>';
        $html2.='<td>'.$articulo['precio_sin_iva'].'</td>';
        $html2.='<td>'.$articulo['ArticulosAvisosrepuesto']['cantidad'].'</td>';
        $precio=$articulo['precio_sin_iva']*$articulo['ArticulosAvisosrepuesto']['cantidad'];
        $html2.='<td>'.$precio.'</td>';
        $html2.='</tr>';
    }
}
elseif($facturaCliente['Avisostallere']['id']!=null)
{
    foreach($facturaCliente['Avisostallere']['Articulo'] as $articulo)
    {
        $html2.='<tr>';
        $html2.='<td>'.$articulo['ref'].'</td>';
        $html2.='<td>'.$articulo['nombre'].'</td>';
        $html2.='<td>'.$articulo['precio_sin_iva'].'</td>';
        $html2.='<td>'.$articulo['ArticulosAvisostallere']['unidades'].'</td>';
        $precio=$articulo['precio_sin_iva']*$articulo['ArticulosAvisostallere']['unidades'];
        $html2.='<td>'.$precio.'</td>';
        $html2.='</tr>';
    }
}

$html ='<div>
            <p>FACTURA</p>
	</div>
	
       
            <p>Talleres Dafer</p>
            <p>Moron de la Frontera (Sevilla)</p>
        
            
        <div id="logo">
             
        </div>
		
	<div>
           
            <table border="0">
                <tr>
                    <td class="meta-head">Factura n</td>
                    <td><p>'.$facturaCliente['FacturasCliente']['id'].'</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Fecha</td>
                    <td><p id="date">'.date('d/m/Y').'</p></td>
                </tr>
                
            </table>
		
	</div>
	
        <div>
            <table border="1">
		 <tr>
		      <th>Referencia</th>
		      <th>Nombre</th>
		      <th>Precio (sin iva)</th>
		      <th>Cantidad</th>
		      <th>Precio</th>
		  </tr>'.
		  
		  $html2.
		  
		  '<tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">'.$facturaCliente['FacturasCliente']['base_imponible'].'</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">'.$facturaCliente['Tiposiva']['tipoiva'].' iva</td>
		      <td class="total-value"><div id="total">'.$facturaCliente['FacturasCliente']['iva'].'</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total</td>
		      <td class="total-value balance"><div class="due">'.$facturaCliente['FacturasCliente']['total'].'</div></td>
		  </tr>
		
            </table>
        </div>';

$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("FacturaCliente.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
