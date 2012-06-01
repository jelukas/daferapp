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
<h1>Presupuestos Proveedores</h1>
<table class="tabla">
    <tr>
        <th>Id</th>
        <th style="width: 150px">Proveedor</th>
        <th style="width: 100px">Almacén</th>
        <th>Fecha De Plazo</th>
        <th>Observaciones</th>
        <th>Confirmado</th>
    </tr>
    <?php foreach ($presupuestosproveedores as $presupuestosproveedore) : ?>
        <tr>
            <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['id'] ?></td>
            <td style="width: 150px"><?php echo $presupuestosproveedore['Proveedore']['nombre'] ?></td>
            <td style="width: 100px"><?php echo $presupuestosproveedore['Almacen']['nombre'] ?></td>
            <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo'] ?></td>
            <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones'] ?></td>
            <td><?php echo ($presupuestosproveedore['Presupuestosproveedore']['confirmado'] == 1) ? 'Sí ' : 'No' ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("InformePresupuestosProveedores.pdf", "I"); //Muestra el pdf
?>
