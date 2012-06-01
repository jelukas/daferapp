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
<h1>Albaranes de Proveedores</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th>Pedido de Proveedor</th>
        <th>Proveedor</th>
        <th>Fecha</th>
        <th>Numero De Albarán</th>
        <th>Observaciones</th>
    </tr>
    <?php foreach ($albaranesproveedores as $albaranesproveedore) : ?>
        <tr>
            <td><?php echo $albaranesproveedore['Albaranesproveedore']['id'] ?></td>
            <td><?php echo $albaranesproveedore['Albaranesproveedore']['pedidosproveedore_id'] ?></td>
            <td><?php echo $albaranesproveedore['Pedidosproveedore']['Proveedore']['nombre'] ?></td>
            <td><?php echo $albaranesproveedore['Albaranesproveedore']['fecha'] ?></td>
            <td><?php echo $albaranesproveedore['Albaranesproveedore']['numeroalbaran'] ?></td>
            <td><?php echo $albaranesproveedore['Albaranesproveedore']['observaciones'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformeAlbaranesProveedores.pdf", "I"); //Muestra el pdf
?>
