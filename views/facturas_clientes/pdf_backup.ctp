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
        font-size: 35px;
    }
    div.totales_albaran {border: 1px solid black;}
    div#datos_cliente {border: 1px solid black;}
    div#datos_factura {
        border: 1px solid black;
        width: 300px;
    }
    
    .parte_row td{border-bottom: 1px solid black;font-weight: bold;}
</style>
<!-- Datos del cliente -->
<div id="datos_cliente">
    <?php echo $facturaCliente['Cliente']['nombre'] ?>-<?php echo $facturaCliente['Cliente']['id'] ?> <br/>
    C.I.F.: <?php echo $facturaCliente['Cliente']['cif'] ?>
</div>
<!-- Datos de la Factura -->
<div id="datos_factura">
    <table>
        <tr>
            <td colspan="2"><h4>FACTURA</h4></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><?php echo $facturaCliente['FacturasCliente']['numero']; ?></td>
        </tr>  
        <tr>
            <td>Fecha: </td>
            <td><?php echo $facturaCliente['FacturasCliente']['fecha']; ?></td>
        </tr> 
        <tr>
            <td>Forma de Pago: </td>
            <td><?php echo $facturaCliente['Formapago']['codigo']; ?>  <?php echo $facturaCliente['Formapago']['nombre']; ?></td>
        </tr>
    </table>
</div>

<div style="border-bottom: 2px solid #f88017;"></div>
<!-- Albaranes -->
<?php foreach ($albaranes as $albaran): ?>
    <?php
    $albaran_total_manoobra = 0;
    $albaran_total_materiales = 0;
    $kilometros = 0;
    $preciodesplazamiento = 0;
    $dietas = 0;
    ?>
    <div style="border: 1px solid black;">
        <b>Albarán:</b> <?php echo $albaran['Albaranescliente']['numeroalbaran'] ?> de fecha <?php echo $albaran['Albaranescliente']['fecha'] ?><br/>
        <b>Cliente</b> <?php echo $facturaCliente['Cliente']['id'] ?><br/>
        <b>Centro de Trabajo</b> <?php echo $albaran['Centrostrabajo']['direccion'] ?> <?php echo $albaran['Centrostrabajo']['cp'] ?> <?php echo $albaran['Centrostrabajo']['poblacion'] ?> <?php echo $albaran['Centrostrabajo']['provincia'] ?><br/>
        <?php $kilometros += $albaran['Centrostrabajo']['kilometraje']; ?>
        <?php $preciodesplazamiento += $albaran['Centrostrabajo']['preciodesplazamiento']; ?>
        <?php $dietas += $albaran['Centrostrabajo']['dietas']; ?>
        <b>Observaciones:</b> <?php echo $albaran['Albaranescliente']['observaciones'] ?>
    </div>
    <!-- Tareas Asociadas a los avisos del  Albaran -->
    <?php if (!empty($albaran['Tareas'])): ?>
        <?php foreach ($albaran['Tareas'] as $tarea): ?>
            <?php if (isset($tarea["Tarea"])): ?>
                <div>
                    <h3><?php echo $tarea["Tarea"]['id'] ?>  <?php echo $tarea["Tarea"]['descripcion']; ?></h3>
                    <?php $sub_material_tarea = 0;
                    $sub_manoobra_tarea = 0; ?>
                    <!-- Partes Asociados a la Tarea  -->
                    <?php if (isset($tarea["PartesTallere"])): ?>
                        <table class="partes">
                            <!-- PARTES CENTROS -->
                            <?php foreach ($tarea['PartesTallere'] as $partestallere): ?>
                                <?php if (isset($partestallere['PartesTallere'])): ?>
                                    <tr class="parte_row"><td>Id</td><td>MANO DE OBRA</td><td>Hora</td><td>Precio</td><td style="text-align: right;">Importe</td></tr>
                                    <?php
                                    /* Calculamos las horas */
                                    $precio = 0;
                                    if (!empty($partestallere['Mecanicos']))
                                        foreach ($partestallere['Mecanicos'] as $mecanico) {
                                            $precio = $precio + $mecanico['Mecanico']['costehora'];
                                        }
                                    $importe = $partestallere['PartesTallere']["horasimputables"] * $precio;
                                    $sub_manoobra_tarea += $importe;
                                    ?>
                                    <tr><td><?php echo $partestallere['PartesTallere']["id"] ?></td><td><?php echo $partestallere['PartesTallere']["operacion"] ?></td><td><?php echo $partestallere['PartesTallere']["horasimputables"] ?></td><td><?php echo $precio; ?></td><td style="text-align: right;"><?php echo $importe ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes de Taller -->
                                <tr>
                                    <td></td>
                                    <td colspan="4">
                                        <?php if (!empty($partestallere['Articulos'])): ?>
                                            <table>
                                                <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td><td>Dto.</td><td style="text-align: right;">Importe</td></tr>
                                                <?php foreach ($partestallere['Articulos'] as $articulo): ?>
                                                    <?php
                                                    $importe = $articulo["ArticulosPartestallere"]["cantidad"] * $articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"];
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $articulo["ArticuloDetalle"]["Articulo"]["nombre"] ?></td>
                                                        <td><?php echo empty($articulo["ArticulosPartestallere"]["cantidad"]) ? "0" : $articulo["ArticulosPartestallere"]["cantidad"]; ?></td>
                                                        <td><?php echo empty($articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"]) ? "0" : $articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"]; ?></td>
                                                        <td style="text-align: right;"><?php echo $importe;
                                $sub_material_tarea += $importe; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- FIN de Materiales de Partes de Taller -->
                            <?php endforeach; ?><!-- FIN PARTES CENTROS -->
                            <!-- PARTES PARTES DE CENTRO -->

                            <!-- PARTES CENTROS -->
                            <? /* pr($tarea);
                              die(); */ ?>
                            <?php foreach ($tarea['PartesCentrotrabajo'] as $partestallere): ?>
                                <?php if (isset($partestallere['Parte'])): ?>
                                    <tr class="parte_row"><td>Id</td><td>MANO DE OBRA</td><td>Hora</td><td>Precio</td><td style="text-align: right;">Importe</td></tr>
                                    <?php
                                    /* Calculamos las horas */
                                    $precio = 0;
                                    if (!empty($partestallere['Mecanicos']))
                                        foreach ($partestallere['Mecanicos'] as $mecanico) {
                                            $precio = $precio + $mecanico['Mecanico']['costehora'];
                                        }
                                    $importe = $partestallere['Parte']["horasimputables"] * $precio;
                                    $sub_manoobra_tarea += $importe;
                                    ?>
                                    <tr><td><?php echo $partestallere['Parte']["id"] ?></td><td><?php echo $partestallere['Parte']["operacion"] ?></td><td><?php echo $partestallere['Parte']["horasimputables"] ?></td><td><?php echo $precio; ?></td><td style="text-align: right;"><?php echo $importe ?></td></tr>
                                <?php endif; ?>
                                <!-- Materiales de Partes de Taller -->
                                <tr>
                                    <td></td>
                                    <td colspan="4">
                                        <?php if (!empty($partestallere['Articulos'])): ?>
                                            <table>
                                                <tr class="parte_row"><td>Materiales</td><td>Cantidad</td><td>Precio</td><td>Dto.</td><td style="text-align: right;">Importe</td></tr>
                                                <?php foreach ($partestallere['Articulos'] as $articulo): ?>
                                                    <?php
                                                    $importe = $articulo["ArticulosParte"]["cantidad"] * $articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"];
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $articulo["ArticuloDetalle"]["Articulo"]["nombre"] ?></td>
                                                        <td><?php echo empty($articulo["ArticulosParte"]["cantidad"]) ? "0" : $articulo["ArticulosParte"]["cantidad"]; ?></td>
                                                        <td><?php echo empty($articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"]) ? "0" : $articulo["ArticuloDetalle"]["Articulo"]["precio_sin_iva"]; ?></td>
                                                        <td style="text-align: right;"><?php echo $importe;
                                $sub_material_tarea += $importe; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- FIN de Materiales de Partes de Taller -->
                            <?php endforeach; ?>
                            <!-- FIN PARTES DE CENTRO -->
                        </table>
                        <p style="text-align: right; font-weight: bold;"> Subtotal Mano de Obra <?php echo $sub_manoobra_tarea;
                    $albaran_total_manoobra += $sub_manoobra_tarea; ?></p>
                        <p style="text-align: right;font-weight: bold;"> Subtotal Materiales <?php echo $sub_material_tarea;
                    $albaran_total_materiales += $sub_material_tarea; ?></p>
                    <?php endif; ?><!-- FIN Partes Asociados a la Tarea -->
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?><!-- FIN Tareas Asociadas a los avisos del  Albaran -->
    <div class="totales_albaran">
        <h3>TOTALES ALBARAN</h3>
        <table>
            <tr>   
                <td style="text-align: justify;">Kilometros 	<?php echo $kilometros ?>	 x <?php echo $preciodesplazamiento ?>  = <?php echo $kilometros * $preciodesplazamiento ?></td>
                <td style="text-align: justify;">Total mano de Obra <?php echo $albaran_total_manoobra ?></td>
            </tr>
            <tr>
                <td style="text-align: justify;">Dietas <?php echo $dietas ?></td>
                <td style="text-align: justify;">Total materiales <?php echo $albaran_total_materiales ?></td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>
<!-- FIN alabaranes -->
<!-- Parrafo de Firma -->
<p style="text-align: center; font-size: 25px;">DOY MICONFORMIDAD ALA REPARACIÓN Y AL IMPORTE FACTURADO RECIBIENDO LA MAQUINA A MI ENTERA SATISFACIÓN:  SI    NO <br/>
   FIRMA DEL CLIENTE
</p>
<!-- FIN Parrafo de Firma -->
<div style="font-size: 39px;">
    <table>
        <tr>
            <td>Morón de La Frontera a <?php echo $facturaCliente['FacturasCliente']['fecha'] ?></td>
            <td>Base Imponible <?php echo $facturaCliente['FacturasCliente']['base_imponible'] ?> €<br/>
                Impuestos  <?php echo $facturaCliente['FacturasCliente']['iva'] ?> % <?php echo $facturaCliente['FacturasCliente']['base_imponible'] * $facturaCliente['FacturasCliente']['iva'] ?> €<br/>
                TOTAL FACTURA   <?php echo ($facturaCliente['FacturasCliente']['base_imponible'] * $facturaCliente['FacturasCliente']['iva']) + $facturaCliente['FacturasCliente']['base_imponible'] ?> €
            </td>
        </tr>
    </table>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("FacturaCliente.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
