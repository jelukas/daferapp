<?php
ob_start();
error_reporting(0);
App::import('Vendor', 'tcpdf');
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
?>
<style>
    .tabla {font-size: 25px;}
    .tabla th{border-bottom: 1px solid black;font-weight: bold; }   
</style>
<h1>Facturas de Proveedores</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th>Cliente</th>
        <th>Fecha De Plazo</th>
        <th>Confirmado</th>
        <th>Presupuesto</th>
        <th>Recepción</th>
    </tr>
    <?php foreach ($pedidosclientes as $pedidoscliente) : ?>
        <tr>
            <td><?php echo $pedidoscliente['Pedidoscliente']['id']; ?>&nbsp;</td>
            <td><?php if($pedidoscliente['Avisosrepuesto']['id']!=null) 
                            echo $pedidoscliente['Avisosrepuesto']['Cliente']['nombre'];
                      elseif($pedidoscliente['Avisostallere']['id']!=null)
                            echo $pedidoscliente['Avisostallere']['Cliente']['nombre'];
                ?>&nbsp;
            </td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['fecha_plazo']; ?>&nbsp;</td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['confirmado']; ?>&nbsp;</td>
            <td><?php echo $pedidoscliente['PresupuestosCliente']['id']; ?>&nbsp;</td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['recepcion']; ?>&nbsp;</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformePedidosClientes.pdf", "I"); //Muestra el pdf
?>
