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
<h1>Albaranes de Cliente</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th>Pedido de Cliente</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Número de Albarán</th>
        <th>Observaciones</th>
    </tr>
    <?php foreach ($albaranesclientes as $albaranescliente) : ?>
        <tr>
            <td><?php echo $albaranescliente['Albaranescliente']['id'] ?></td>
            <td><?php echo $albaranescliente['Albaranescliente']['pedidoscliente_id'] ?></td>
            <td><?php echo $albaranescliente['Albaranescliente']['Pedidocliente']['Cliente']['nombre'] ?></td>
            <td><?php echo $albaranescliente['Albaranescliente']['fecha'] ?></td>
            <td><?php echo $albaranescliente['Albaranescliente']['numeroalbaran'] ?></td>
            <td><?php echo $albaranescliente['Albaranescliente']['observaciones'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformeAlbaranesCliente.pdf", "I"); //Muestra el pdf
?>
