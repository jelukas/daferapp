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

$base_imponible = 0;
?>
<style>
    div h3 {
        font-size: 40px;
    }
    * {
        font-size: 28px;
    }
    span {
        font-weight: bold;
    }
    .first_row td {
        border: 1px solid black;
        font-weight: bold;
    }
    table.repuestos tr td{
        text-align: center;
        width: 75px;
    }
    table.partes tr td {
        text-align: center;
        width: 75px;
    }
    table.partes tr td.operacion {
        width: 350px;
    }
    .first_row_materiales td{
        border-bottom: 1px solid black;
        font-weight: bold;
    }
</style>
<!-- Datos Factura -->
<table style="border: 1px solid black;width: 400px;">
    <tr>
        <td colspan="2" style="text-align: center;font-weight: bold;background-color: #FFDB6F;">FACTURA</td>
    </tr>
    <tr>
        <td>NUMERO:</td>
        <td><?php echo $factura['FacturasCliente']['numero'] ?></td>
    </tr> 
    <tr>
        <td>FECHA:</td>
        <td><?php echo $factura['FacturasCliente']['fecha'] ?></td>
    </tr>
    <tr>
        <td>Forma de Pago:</td>
        <td><?php echo $factura['Cliente']['Formapago']['id'] ?>  <?php echo $factura['Cliente']['Formapago']['nombre'] ?></td>
    </tr>  
</table>
<!-- FIN Datos Factura -->
<!-- Cliente -->
<table style="border: 1px solid black;width: 400px;">
    <tr>
        <td colspan="2" style="text-align: center;font-weight: bold;background-color: #FFDB6F;">Cliente</td>
    </tr>
    <tr>
        <td><?php echo $factura['Cliente']['nombre'] ?></td>
        <td><?php echo $factura['Cliente']['id'] ?></td>
    </tr>
    <tr>     
        <td colspan="2"><?php echo $factura['Cliente']['direccion'] ?></td>
    </tr>
    <tr>   
        <td colspan="2">C.I.F.: <?php echo $factura['Cliente']['cif'] ?></td>
    </tr>
</table>
<!-- FIN Cliente -->
<!-- Alabranes -->
<?php foreach ($factura['Albaranes'] as $albaran): ?>
    <?php $total_albaran_manoobra = 0; ?>
    <?php $total_albaran_materiales = 0; ?>
    <?php $total_albaran_repuestos = 0; ?>
    <?php $subtotal_repuestos = 0; ?>


    <?php if (isset($albaran['AvisoRepuesto'])): ?>
        <table style="border: 1px solid black;background-color: #EFD3D3;">
            <tr>
                <td><span>Albaran: </span><?php echo $albaran['DetalleAlbaran']['numeroalbaran'] ?> de fecha <?php echo $albaran['DetalleAlbaran']['fecha'] ?></td>
                <td><span>Cliente: </span><?php echo $albaran['AvisoRepuesto']['Cliente']['id'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Centro Trabajo: </span><?php echo $albaran['AvisoRepuesto']['Centrotrabajo']['centrotrabajo'] ?> <?php echo $albaran['AvisoRepuesto']['Centrotrabajo']['direccion'] ?> <?php echo $albaran['AvisoRepuesto']['Centrotrabajo']['poblacion'] ?> <?php echo $albaran['AvisoRepuesto']['Centrotrabajo']['provincia'] ?> <?php echo $albaran['AvisoRepuesto']['Centrotrabajo']['cp'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Observaciones: </span><?php echo $albaran['DetalleAlbaran']['observaciones'] ?></td>
            </tr>
        </table>
        <table style="border: 1px solid black;width: 250px;">
            <tr>
                <td colspan="2"><span>MAQUINA</span> <?php echo $albaran['AvisoRepuesto']['Maquina']['nombre'] ?></td>
            </tr>
            <tr>
                <td colspan="2">HORAS MAQUINA <?php echo $albaran['AvisoRepuesto']['Maquina']['horas'] ?></td>
            </tr>
            <tr>
                <td colspan="2">MODELO <?php echo $albaran['AvisoRepuesto']['Maquina']['modelo_transmision'] ?></td>
            </tr>
        </table>
        <div>
            <h3>Aviso de Repuestos</h3>
            <table class="repuestos">
                <tr class="first_row">
                    <td style="width: 300px;">MATERIALES</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Dto.</td>
                    <td style="width: 150px;">Importe</td>
                </tr>
                <?php foreach ($albaran['AvisoRepuesto']['Repuestos'] as $repuesto): ?>
                    <tr>
                        <td style="width: 300px;"><?php echo $repuesto['DetalleArticulo']['nombre'] ?></td>
                        <td><?php echo $repuesto['ArticulosAvisosrepuesto']['cantidad'] ?></td>
                        <td><?php echo $repuesto['DetalleArticulo']['precio_sin_iva'] ?></td>
                        <td><?php echo $albaran['AvisoRepuesto']['Cliente']['descuentos_repuestos'] ?> %</td>
                        <td style="width: 150px;">
                            <?php
                            $importe = $repuesto['DetalleArticulo']['precio_sin_iva'] * $repuesto['ArticulosAvisosrepuesto']['cantidad'];
                            if (!empty($albaran['AvisoRepuesto']['Cliente']['descuentos_repuestos'])) {
                                $importe = $importe - ($importe * ($albaran['AvisoRepuesto']['Cliente']['descuentos_repuestos'] / 100));
                            }
                            $subtotal_repuestos += $importe;
                            echo $importe;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td style="width: 300px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="width: 150px;"><span>Subtotal Repuestos </span><?php echo $subtotal_repuestos ?></td>
                    <?php $total_albaran_repuestos += $subtotal_repuestos; ?>
                </tr>
            </table>
        </div>
    <?php endif; ?>
    <?php if (isset($albaran['AvisoTaller'])): ?> 
        <?php $subtotal_manoobra = 0;
        $sub_materiales = 0; ?>
        <table style="border: 1px solid black;background-color: #EFD3D3;">
            <tr>
                <td><span>Albaran: </span><?php echo $albaran['DetalleAlbaran']['numeroalbaran'] ?> de fecha <?php echo $albaran['DetalleAlbaran']['fecha'] ?></td>
                <td><span>Cliente: </span><?php echo $albaran['Cliente']['id'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Centro Trabajo: </span><?php echo $albaran['Centrotrabajo']['centrotrabajo'] ?> <?php echo $albaran['Centrotrabajo']['direccion'] ?> <?php echo $albaran['Centrotrabajo']['poblacion'] ?> <?php echo $albaran['Centrotrabajo']['provincia'] ?> <?php echo $albaran['Centrotrabajo']['cp'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Observaciones: </span><?php echo $albaran['DetalleAlbaran']['observaciones'] ?></td>
            </tr>
        </table>
        <table style="border: 1px solid black;width: 250px;">
            <tr>
                <td colspan="2"><span>MAQUINA</span> <?php echo $albaran['Maquina']['nombre'] ?></td>
            </tr>
            <tr>
                <td colspan="2">HORAS MAQUINA <?php echo $albaran['Maquina']['horas'] ?></td>
            </tr>
            <tr>
                <td colspan="2">MODELO <?php echo $albaran['Maquina']['modelo_transmision'] ?></td>
            </tr>
        </table>
        <?php foreach ($albaran['AvisoTaller'] as $tarea): ?>
            <div>
                <h3><?php echo $tarea['Tarea']['id'] ?>  <?php echo $tarea['Tarea']['descripcion'] ?></h3>
            </div>
            <table class="partes">
                <?php foreach ($tarea['PartesTallere'] as $parte): ?>
                    <tr class="first_row"><td>Id</td><td class="operacion">MANO DE OBRA</td><td>Hora</td><td>Precio</td><td>Importe</td></tr>
                    <tr><td><?php echo $parte['Partestallere']['id'] ?></td><td class="operacion"><?php echo $parte['Partestallere']['operacion'] ?></td><td><?php echo $parte['Partestallere']['horasimputables'] ?></td><td><?php echo empty($albaran['Centrotrabajo']['preciomanoobra']) ? "0" : $albaran['Centrotrabajo']['preciomanoobra'] ?></td><td><?php echo $parte['Partestallere']['horasimputables'] * $albaran['Centrotrabajo']['preciomanoobra']; ?></td></tr>
                    <?php $subtotal_manoobra += $parte['Partestallere']['horasimputables'] * $albaran['Centrotrabajo']['preciomanoobra'] ?>
                    <!-- <tr><td><?php echo $parte['Partestallere']['id'] ?></td><td class="operacion"><?php echo $parte['Partestallere']['operacion'] ?></td><td><?php echo $parte['Partestallere']['horasimputables'] ?></td><td><?php echo empty($albaran['Cliente']['precio_mano_obra']) ? "0" : $albaran['Centrotrabajo']['preciomanoobra'] ?></td><td><?php echo $parte['Partestallere']['horasimputables'] * $albaran['Centrotrabajo']['preciomanoobra'] ?></td></tr> -->
                    <?php if (!empty($parte['Articulos'])): ?>
                        <tr>
                            <td style="width: 680px">
                                <table>
                                    <tr class="first_row_materiales" ><td style="width: 250px">MATERIALES</td><td style="width: 50px">Cantidad</td><td style="width: 50px">Precio</td><td>Dto.</td><td>Importe</td></tr>
                                    <?php foreach ($parte['Articulos'] as $articulo): ?>
                                        <tr><td style="width: 250px"><?php echo $articulo['Articulo']['nombre'] ?></td><td style="width: 50px"><?php echo $articulo['ArticulosPartestallere']['cantidad'] ?></td><td style="width: 50px"><?php echo $articulo['Articulo']['precio_sin_iva'] ?></td><td><?php echo $albaran['Clienta']['descuentos_materiales'] ?></td><td><?php echo ($articulo['Articulo']['precio_sin_iva'] * $articulo['ArticulosPartestallere']['cantidad']) ?></td></tr>
                                        <?php $sub_materiales += $articulo['Articulo']['precio_sin_iva'] * $articulo['ArticulosPartestallere']['cantidad'] ?>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                        </tr>
                    <?php endif; ?> 
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
        <p style="text-align: right;font-weight: bold;">Subtotal Mano de Obra: <?php echo $subtotal_manoobra ?></p>
        <p style="text-align: right;font-weight: bold;">Subtotal Materiales: <?php echo $sub_materiales ?></p>
        <?php $total_albaran_manoobra += $subtotal_manoobra; ?>
        <?php $total_albaran_materiales += $sub_materiales; ?>
    <?php endif; ?>
    <div style="border: 1px solid black; background-color: #ffc;">
        <span>TOTALES ALBARAN</span><br/>
        <?php
        if (isset ($albaran['AvisoRepuesto']['Centrotrabajo'])) {
            $kilometraje = $albaran['AvisoRepuesto']['Centrotrabajo']['kilometraje'];
            $preciodesplazamiento = $albaran['AvisoRepuesto']['Centrotrabajo']['preciodesplazamiento'];
            $dietas =  $albaran['AvisoRepuesto']['Centrotrabajo']['dietas'];
        } else {
            $kilometraje = $albaran['Centrotrabajo']['kilometraje'];
            $preciodesplazamiento = $albaran['Centrotrabajo']['preciodesplazamiento'];
            $dietas =  $albaran['Centrotrabajo']['dietas'];
        }
        ?> 
        Kilometros: <?php echo $kilometraje ?> x <?php echo $preciodesplazamiento ?> = <?php echo $kilometraje*$preciodesplazamiento ?><br/>
        Dietas: <?php echo $dietas ?><br/>
        Total Mano de Obra <?php echo $total_albaran_manoobra ?><br/>
        Total Materiales <?php echo $total_albaran_materiales ?><br/>
        Total Repuestos <?php echo $total_albaran_repuestos ?>
    </div><br/>
    <?php 
    $base_imponible += ($kilometraje*$preciodesplazamiento) +  $dietas + $total_albaran_manoobra + $total_albaran_materiales + $total_albaran_repuestos;
    ?>
<?php endforeach; ?>
<!-- FIN Alabranes -->
<p>DOY MI CONFORMIDAD A LA REPARACION Y AL IMPORTE FACTURADO RECIBIENDO LA MAQUINA A MI ENTERA SATISFACCION:  <br/>[SI]   [NO]</p>
<p>FIRMA DEL CLIENTE</p>
<div style="border: 1px solid black">
    <p>Base Imponible: <?php echo $base_imponible ?> &euro;</p>
    <p>Impuestos: <?php echo $factura['Tiposiva']['tipoiva'] ?>  <?php $total_iva =  ($base_imponible*(int)str_replace('%', '', $factura['Tiposiva']['tipoiva'])/100); echo $total_iva; ?> &euro;</p>
    <p><span>TOTAL FACTURA:</span> <?php echo $base_imponible + $total_iva ?> &euro;</p>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("FacturaCliente.pdf", "I"); //Muestra el pdf
?>
