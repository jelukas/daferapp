<?php
ob_start();
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
?>
<style>
    div {
        font-size: 25px;
    }
    h3 {
        font-size: 28px;
    }
    div#datos_cliente {border: 1px solid black;}
    div#datos_presupuesto {border: 1px solid black;}
    div#totales_presupuesto {border: 1px solid black;}
</style>

<div id="datos_cliente">
    <?php echo $presupuesto['Avisosrepuesto']['Cliente']['nombre']; ?>-<?php echo $presupuesto['Avisosrepuesto']['Cliente']['id']; ?> <br/>
    C.I.F.: <?php echo $presupuesto['Avisosrepuesto']['Cliente']['cif'] ?>
</div>
<!-- Datos del albarán -->
<div id="datos_presupuesto">
    <table>
        <tr>
            <td colspan="2"><h4>PRESUPUESTO</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $presupuesto['Presupuestosproveedore']['id']; ?></td>
        </tr>  
        <tr>
            <td>Fecha: </td>
            <td><?php echo $presupuesto['Presupuestosproveedore']['fechaplazo']; ?></td>
        </tr> 
       <?php if (isset($presupuesto['Pedidosproveedore']['id'])): ?>
        <tr>
            <td>Pedido núm: </td>
            <td><?php echo $presupuesto['Pedidosproveedore']['id'] ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>Fecha: </td>
            <td><?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
</div>
<div style="border-bottom: 2px solid #f88017;"></div>

<div style="border: 1px solid black;">

<table>
<tr>
    <th>Ref</th>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Total</th>
</tr>
<?php $articulos=$presupuesto['Avisosrepuesto']['Articulo'];
$baseimponible=0;
foreach($articulos as $articulo): ?>
    <tr>
        <td><?php echo $articulo['ref'];?></td>
        <td><?php echo $articulo['nombre'];?></td>
        <td><?php echo $articulo['ArticulosAvisosrepuesto']['cantidad'];?></td>
        <td><?php echo $articulo['precio_sin_iva'];?></td>
        <td><?php echo $articulo['precio_sin_iva']*$articulo['ArticulosAvisosrepuesto']['cantidad'];?></td>
    </tr>
    <?php $precio=$articulo['precio_sin_iva']*$articulo['ArticulosAvisosrepuesto']['cantidad'];
    $baseimponible+=$precio; ?>

<?php endforeach;?>
<?php
$iva=$baseimponible*0.18;
$total=$baseimponible+$iva;
?>
</table>

</div>

<br/><br/>

<div class="totales_presupuesto">
    <table>
        <tr>
            <td>Base Imponible:</td>
            <td><?php echo $baseimponible; ?></td>
        </tr>
        <tr>
            <td>Impuestos:</td>
            <td><?php echo $iva; ?></td>
        </tr>
        <tr>
            <td>Total Pedido:</td>
            <td><?php echo $total; ?>€</td>
        </tr>
    </table>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("PresupuestoProveedor.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
