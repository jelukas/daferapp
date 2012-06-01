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
<h1>Facturas de Clientes</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th>Cliente</th>
        <th>Número De Factura</th>
        <th>Fecha De Factura</th>
        <th>Base Imponible</th>
        <th>Tipo De IVA</th>
        <th>IVA</th>
        <th>Total</th>
    </tr>
    <?php foreach ($facturasClientes as $facturasCliente) : ?>
        <tr>
            <td><?php echo $facturasCliente['FacturasCliente']['id']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['Cliente']['nombre']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['FacturasCliente']['numero']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['FacturasCliente']['fecha']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['FacturasCliente']['base_imponible']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['Tiposiva']['tipoiva'];?>&nbsp;</td>
            <td><?php echo $facturasCliente['FacturasCliente']['iva']; ?>&nbsp;</td>
            <td><?php echo $facturasCliente['FacturasCliente']['total']; ?>&nbsp;</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformeFacturaCliente.pdf", "I"); //Muestra el pdf
?>
