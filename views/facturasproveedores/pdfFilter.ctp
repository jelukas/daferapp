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
        <th>Proveedor</th>
        <th>Número De Factura</th>
        <th>Fecha De Factura</th>
        <th>Base Imponible</th>
        <th>Tipo De IVA</th>
        <th>IVA</th>
        <th>Total</th>
        <th>Fecha Limite De Pago</th>
        <th>Fecha De Pago</th>
    </tr>
    <?php foreach ($facturasproveedores as $factura) : ?>
        <tr>
            <td><?php echo $factura['Facturasproveedore']['id'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['nombre'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['numerofactura'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['fechafactura'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['baseimponible'] ?></td>
            <td><?php echo $factura['Tiposiva']['tipoiva'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['iva'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['total'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['fechalimitepago'] ?></td>
            <td><?php echo $factura['Facturasproveedore']['fechapagada'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformeFacturaProveedor.pdf", "I"); //Muestra el pdf
?>
