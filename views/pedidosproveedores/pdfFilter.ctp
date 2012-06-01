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
<h1>Pedidos de Proveedores</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th>Fecha</th>
        <th>Proveedor</th>
        <th>Almacén</th>
        <th>Observaciones</th>
        <th>Fecha de recepción</th>
    </tr>
    <?php foreach ($pedidosproveedores as $pedidosproveedore) : ?>
        <tr>
            <td><?php echo $pedidosproveedore['Pedidosproveedore']['id']; ?>&nbsp;</td>
            <td><?php echo $pedidosproveedore['Pedidosproveedore']['fecha']; ?>&nbsp;</td>
            <td><?php echo $pedidosproveedore['Proveedore']['nombre']; ?>&nbsp;</td>
            <td><?php echo $pedidosproveedore['Almacene']['nombre']; ?>&nbsp;</td>
            <td><?php echo $pedidosproveedore['Pedidosproveedore']['observaciones']; ?>&nbsp;</td>
            <td><?php echo $pedidosproveedore['Pedidosproveedore']['fecharecepcion']; ?>&nbsp;</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformePedidosProveedores.pdf", "I"); //Muestra el pdf
?>
