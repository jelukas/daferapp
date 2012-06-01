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
    div#datos_tarea {border: 1px solid black;}
    .parte_row td{border-bottom: 1px solid black;font-weight: bold;}
</style>
<!-- Datos del cliente -->
<div id="datos_cliente">
    Cliente:<br>
    <?php echo $orden['Avisostallere']['Cliente']['nombre'] ?>-<?php echo $orden['Avisostallere']['Cliente']['id'] ?> <br/>
    C.I.F.: <?php echo $orden['Avisostallere']['Cliente']['cif'] ?>
</div>
<!-- Datos de tarea -->
<div id="datos_tarea">
    <table>
        <tr>
            <td colspan="2"><h4>Tarea</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $tarea['Tarea']['id']; ?></td>
        </tr>  
    </table>
</div>

<div style="border-bottom: 2px solid #f88017;"></div>
    <div style="border: 1px solid black;">
        <b>Centro de Trabajo</b> <?php echo $orden['Avisostallere']['Centrostrabajo']['direccion'] ?> <?php echo $orden['Avisostallere']['Centrostrabajo']['cp'] ?> <?php echo $orden['Avisostallere']['Centrostrabajo']['poblacion'] ?> <?php echo $orden['Avisostallere']['Centrostrabajo']['provincia'] ?><br/>
        <b>Observaciones:</b> <?php echo $orden['Ordene']['observaciones'] ?>
    </div> 
            <?php if (isset($tarea['Tarea'])): ?>
                <div>
                    <h3>Tarea: <?php echo $tarea['Tarea']['id'] ?>  <?php echo $tarea['Tarea']['descripcion']; ?></h3>
                    <!-- Partes Asociados a la Tarea  -->
                    <?php if (isset($tarea["Partestallere"])): ?>
                        <table class="partes">
                            <!-- PARTES TALLERES -->
                            <?php foreach ($tarea['Partestallere'] as $partestallere): ?>
                                <?php if (isset($partestallere)): ?>
                                    <tr><td colspan="4"><br><br>Parte de Taller: <?php echo $partestallere["id"] ?></td></tr>
                                    <tr class="parte_row"><td>Mecanicos</td><td>Operacion</td><td>Horas</td></tr>
                                    <tr>
                                        <td>
                                         <?php
                                         if (!empty($partestallere['Mecanico'])):

                                                foreach ($partestallere['Mecanico'] as $mecanico)
                                                {
                                                    echo $mecanico['nombre'];
                                                    echo "<br>";
                                                }
                                         endif; 
                                         ?>
                                        </td>
                                        <td><?php echo $partestallere["operacion"] ?></td><td><?php echo $partestallere["horasimputables"] ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes de Taller -->
                                <tr>
                                    <td colspan="4">
                                        <?php if (!empty($partestallere['Articulo'])): ?>
                                            <table>
                                                <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td></tr>
                                                <?php foreach ($partestallere['Articulo'] as $articulo): ?>
                                                    <tr>
                                                        <td><?php echo $articulo["nombre"] ?></td>
                                                        <td><?php echo empty($articulo["ArticulosPartestallere"]["cantidad"]) ? "0" : $articulo["ArticulosPartestallere"]["cantidad"]; ?></td>
                                                        <td><?php echo empty($articulo["precio_sin_iva"]) ? "0" : $articulo["precio_sin_iva"]; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- FIN de Materiales de Partes de Taller -->
                            <?php endforeach; ?><!-- FIN PARTES TALLERES -->
                            <!-- PARTES -->
                            <?php foreach ($tarea['Parte'] as $parte): ?>
                                <?php if (isset($parte)): ?>
                                    <tr><td colspan="4"><br><br>Parte Centro de trabajo: <?php echo $parte["id"] ?></td></tr>
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
                                        <td><?php echo $parte["operacion"] ?></td><td><?php echo $parte["horasimputables"] ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes -->
                                <tr>
                                    <td colspan="4">
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
                            <?php endforeach; ?><!-- FIN PARTES -->
                                                  
                        </table>
                    <?php endif; ?><!-- FIN Partes Asociados a la Tarea -->
                </div>
            <?php endif; ?>
<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("Tarea.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
