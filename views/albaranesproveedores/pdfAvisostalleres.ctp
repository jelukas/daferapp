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
    div#datos_albaran {border: 1px solid black;}
    .parte_row td{border-bottom: 1px solid black;font-weight: bold;}
</style>
<!-- Datos del cliente -->
<div id="datos_cliente">
    <?php echo $cliente['nombre'] ?>-<?php echo $cliente['id'] ?> <br/>
    C.I.F.: <?php echo $cliente['cif'] ?>
</div>
<!-- Datos del albarán -->
<div id="datos_albaran">
    <table>
        <tr>
            <td colspan="2"><h4>ALBARAN</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $albaran['Albaranesproveedore']['numeroalbaran']; ?></td>
        </tr>  
        <tr>
            <td>Fecha: </td>
            <td><?php echo $albaran['Albaranesproveedore']['fecha']; ?></td>
        </tr> 
        <tr>
            <td>Forma de Pago: </td>
            <td><?php echo $cliente['formapago_id']; ?>  <?php //echo $facturaCliente['Formapago']['nombre']; ?></td>
        </tr>
    </table>
</div>

<div style="border-bottom: 2px solid #f88017;"></div>
<?php $albaran_total_manoobra = 0 ; $albaran_total_materiales = 0 ; $kilometros = 0; $preciodesplazamiento = 0; $dietas = 0; $sub_material_tarea = 0; $sub_manoobra_tarea = 0;?>
<!-- Albaran -->
    <div style="border: 1px solid black;">
        <b>Centro de Trabajo</b> <?php echo $centrotrabajo['direccion'] ?> <?php echo $centrotrabajo['cp'] ?> <?php echo $centrotrabajo['poblacion'] ?> <?php echo $centrotrabajo['provincia'] ?><br/>
        <b>Observaciones:</b> <?php echo $albaran['Albaranesproveedore']['observaciones'] ?>
    </div>
    <!-- Tareas Asociadas a los avisos del  Albaran -->
    <?php if (!empty($tareas)): ?>
        <?php foreach ($tareas as $tarea): ?>
            <?php if (isset($tarea['Tarea'])): ?>
                <div>
                    <h3><?php echo $tarea['Tarea']['id'] ?>  <?php echo $tarea['Tarea']['descripcion']; ?></h3>
                    <!-- Partes Asociados a la Tarea  -->
                    <?php if (isset($tarea["Partestallere"])): ?>
                        <?php $sub_material_tarea = 0; ?>
                        <?php $sub_manoobra_tarea = 0; ?>
                        <table class="partes">
                            <!-- PARTES TALLERES -->
                            <?php foreach ($tarea['Partestallere'] as $partestallere): ?>
                                <?php if (isset($partestallere)): ?>
                                    <tr class="parte_row"><td>Id</td><td>MANO DE OBRA</td><td>Hora</td><td>Precio</td><td>Importe</td></tr>
                                    <?php
                                    /* Calculamos las horas */
                                    $precio = 0;
                                    if (!empty($partestallere['Mecanicos']))
                                        foreach ($partestallere['Mecanicos'] as $mecanico) {
                                            $precio = $precio + $mecanico['Mecanico']['costehora'];
                                        }
                                    $importe = $partestallere["horasimputables"] * $precio;
                                    $sub_manoobra_tarea +=$importe;
                                    ?>
                                    <tr><td><?php echo $partestallere["id"] ?></td><td><?php echo $partestallere["operacion"] ?></td><td><?php echo $partestallere["horasimputables"] ?></td><td><?php echo $precio; ?></td><td style="text-align: right;"><?php echo $importe ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes de Taller -->
                                <tr>
                                    <td></td>
                                    <td colspan="4">
                                        <?php if (!empty($partestallere['Articulo'])): ?>
                                            <table>
                                                <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td><td>Importe</td></tr>
                                                <?php $importe = 0; ?>
                                                <?php foreach ($partestallere['Articulo'] as $articulo): ?>
                                                    <?php
                                                    $importe = $articulo["ArticulosPartestallere"]["cantidad"] * $articulo["precio_sin_iva"];
                                                    $sub_material_tarea +=$importe;
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $articulo["nombre"] ?></td>
                                                        <td><?php echo empty($articulo["ArticulosPartestallere"]["cantidad"]) ? "0" : $articulo["ArticulosPartestallere"]["cantidad"]; ?></td>
                                                        <td><?php echo empty($articulo["precio_sin_iva"]) ? "0" : $articulo["precio_sin_iva"]; ?></td>
                                                        <td><?php echo $importe; ?></td>
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
                                    <tr class="parte_row"><td>Id</td><td>MANO DE OBRA</td><td>Hora</td><td>Precio</td><td>Importe</td></tr>
                                    <?php
                                    /* Calculamos las horas */
                                    $precio = 0;
                                    if (!empty($parte['Mecanico']))
                                        foreach ($parte['Mecanico'] as $mecanico) {
                                            $precio = $precio + $mecanico['costehora'];
                                        }
                                    $importe = $parte["horasimputables"] * $precio;
                                    $sub_manoobra_tarea +=$importe;
                                    ?>
                                    <tr><td><?php echo $parte["id"] ?></td><td><?php echo $parte["operacion"] ?></td><td><?php echo $parte["horasimputables"] ?></td><td><?php echo $precio; ?></td><td style="text-align: right;"><?php echo $importe ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes -->
                                <tr>
                                    <td></td>
                                    <td colspan="4">
                                        <?php if (!empty($parte['Articulo'])): ?>
                                            <table>
                                                <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td><td>Importe</td></tr>
                                                <?php $importe = 0; ?>
                                                <?php foreach ($parte['Articulo'] as $articulo): ?>
                                                    <?php
                                                    $importe = $articulo["ArticulosParte"]["cantidad"] * $articulo["precio_sin_iva"];
                                                    $sub_material_tarea +=$importe;
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $articulo["nombre"] ?></td>
                                                        <td><?php echo empty($articulo["ArticulosParte"]["cantidad"]) ? "0" : $articulo["ArticulosParte"]["cantidad"]; ?></td>
                                                        <td><?php echo empty($articulo["precio_sin_iva"]) ? "0" : $articulo["precio_sin_iva"]; ?></td>
                                                        <td><?php echo $importe; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- FIN de Materiales de Partes -->
                            <?php endforeach; ?><!-- FIN PARTES -->
                            <tr><td colspan="4" style="text-align: right;font-weight: bold;">Subtotal Mano de Obra</td><td style="text-align: right;"><?php echo $sub_manoobra_tarea; $albaran_total_manoobra += $sub_manoobra_tarea; ?></td></tr>
                            <tr><td colspan="4" style="text-align: right;font-weight: bold;">Subtotal Materiales</td><td style="text-align: right;"><?php echo $sub_material_tarea; $albaran_total_materiales += $sub_material_tarea;?></td></tr>
                        </table>
                    <?php endif; ?><!-- FIN Partes Asociados a la Tarea -->
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?><!-- FIN Tareas Asociadas a los avisos del  Albaran -->
    <div class="totales_albaran">
        <h3>TOTALES ALBARAN</h3>
        <table>
            <tr>   
                <td style="text-align: justify;">Kilometros 	<?php echo $centrotrabajo['kilometraje']  ?>	 x <?php echo $preciodesplazamiento  ?>  = <?php echo $centrotrabajo['kilometraje'] * $preciodesplazamiento  ?></td>
                <td style="text-align: justify;">Total mano de Obra <?php echo $albaran_total_manoobra ?></td>
            </tr>
            <tr>
                <td style="text-align: justify;">Dietas dietas</td>
                <td style="text-align: justify;">Total materiales <?php echo $albaran_total_materiales ?></td>
            </tr>
        </table>
    </div>
    <?php 
            $base_imponible=$albaran_total_materiales+$albaran_total_manoobra; 
            $iva=$base_imponible*0.18;
    ?>
<!-- FIN alabaran -->
<p style="text-align: center; font-size: 25px;">DOY MICONFORMIDAD ALA REPARACIÓN Y AL IMPORTE FACTURADO RECIBIENDO LA MAQUINA A MI ENTERA SATISFACIÓN:  SI    NO <br/>
   FIRMA DEL CLIENTE
</p>
<!-- FIN Parrafo de Firma -->
<div style="font-size: 39px;">
    <table>
        <tr>
            <td>Morón de La Frontera a <?php echo $albaran['Albaranesproveedore']['fecha'] ?></td>
            <td>Base Imponible <?php echo $base_imponible ?> €<br/>
                Impuestos  18 % <?php echo $iva ?> €<br/>
                TOTAL FACTURA   <?php echo $base_imponible+$iva; ?> €
            </td>
        </tr>
    </table>
</div>


<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("AlbaranCliente.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
