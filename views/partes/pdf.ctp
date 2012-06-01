<?php
ob_start();
//error_reporting(E_ALL);
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
    div {
        font-size: 25px;
    }
    h3 {
        font-size: 28px;
    }
    div#datos_cliente {border: 1px solid black;}
    div#datos_parte {border: 1px solid black;}
    .parte_row td{border-bottom: 1px solid black;font-weight: bold;}
</style>
<!-- Datos del cliente -->
<div id="datos_cliente">
    Cliente:<br>
    <?php echo $parte['Centrostrabajo']['Cliente']['nombre'] ?>-<?php echo $parte['Centrostrabajo']['Cliente']['id'] ?> <br/>
    C.I.F.: <?php echo $parte['Centrostrabajo']['Cliente']['cif'] ?>
</div>
<!-- Datos de parte -->
<div id="datos_parte">
    <table>
        <tr>
            <td colspan="2"><h4>Parte</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $parte['Parte']['id']; ?></td>
        </tr>
        <tr>
            <td colspan="2"><h4>Tarea</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $parte['Tarea']['id']; ?></td>
        </tr> 
        <tr>
            <td colspan="2"><h4>Orden</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $parte['Tarea']['Ordene']['id']; ?></td>
        </tr> 
    </table>
</div>

<div style="border-bottom: 2px solid #f88017;"></div>
    <div style="border: 1px solid black;">
        <b>Centro de Trabajo</b> <?php echo $parte['Centrostrabajo']['direccion'] ?> <?php echo $parte['Centrostrabajo']['cp'] ?> <?php echo $parte['Centrostrabajo']['poblacion'] ?> <?php echo $parte['Centrostrabajo']['provincia'] ?><br/>
        <b>Observaciones:</b> <?php echo $parte['Parte']['observaciones'] ?>
    </div> 
    <div>
    <table class="partes">
        <?php if (isset($parte)): ?>
                <tr class="parte_row"><td>Mecanicos</td><td>Operacion</td><td>Horas</td></tr>
                <tr>
                    <td>
                     <?php
                     if (!empty($parte['Mecanico'])):

                            foreach ($parte['Mecanico'] as $mecanico)
                            {
                                echo $mecanico['nombre'];
                                echo "<br>";
                            }
                     endif; 
                     ?>
                    </td>
                    <td><?php echo $parte['Parte']["operacion"] ?></td><td><?php echo $parte['Parte']["horasimputables"] ?></td></tr>
            <?php endif; ?>
            <!-- Materiales de Partes -->
            <tr>
                <td colspan="3">
                    <?php if (!empty($parte['Articulo'])): ?>
                        <table>
                            <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td></tr>
                            <?php foreach ($parte['Articulo'] as $articulo): ?>
                                <tr>
                                    <td><?php echo $articulo["nombre"] ?></td>
                                    <td><?php echo empty($articulo["ArticulosParte"]["cantidad"]) ? "0" : $articulo["ArticulosParte"]["cantidad"]; ?></td>
                                    <td><?php echo empty($articulo["precio_sin_iva"]) ? "0" : $articulo["precio_sin_iva"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </td>
            </tr>
            <!-- FIN de Materiales de Partes -->                                                  
    </table>
    </div>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("Parte.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
