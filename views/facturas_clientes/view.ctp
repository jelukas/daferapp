<div class="facturasClientes">
    <h2>
        <?php __('Factura de Cliente'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $facturasCliente['FacturasCliente']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Facturas', true), array('action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span>Número</span></td>
            <td><?php echo $facturasCliente['FacturasCliente']['numero']; ?></td>
            <td><span>Fecha</span></td>
            <td><?php echo $this->Time->format('d-m-Y', $facturasCliente['FacturasCliente']['fecha']); ?></td>
            <td><span>Cliente</span></td>
            <td><?php echo $facturasCliente['Cliente']['nombre']; ?></td>
        </tr>
        <tr>
            <td><span>Fechas de Cobros</span></td>
            <td>
                <?php if (!empty($facturasCliente['Cliente']['Formapago'])): ?>
                    <ul>
                        <li><?php echo $facturasCliente['Cliente']['Formapago']['nombre']; ?></li>
                        <li>
                            Vencimientos Fechas:
                            <?php
                            $primera_fecha_de_vencimiento = date("d-m-Y", strtotime($this->Time->format('d-m-Y', $facturasCliente['FacturasCliente']['fecha'] . " +" . $facturasCliente['Cliente']['Formapago']['dias_entre_vencimiento'] . " days")));
                            if (!empty($facturasCliente['Cliente']['Formapago']['dia_mes_fijo_vencimiento'])) {
                                if ($facturasCliente['Cliente']['Formapago']['dia_mes_fijo_vencimiento'] < (int) date("d", strtotime($primera_fecha_de_vencimiento))) {
                                    $primera_fecha_de_vencimiento = date("d-m-Y", strtotime($primera_fecha_de_vencimiento . " +1 month"));
                                    $primera_fecha_de_vencimiento = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime($primera_fecha_de_vencimiento)), $facturasCliente['Cliente']['Formapago']['dia_mes_fijo_vencimiento'], date("Y", strtotime($primera_fecha_de_vencimiento))));
                                } else {
                                    $primera_fecha_de_vencimiento = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime($primera_fecha_de_vencimiento)), $facturasCliente['Cliente']['Formapago']['dia_mes_fijo_vencimiento'], date("Y", strtotime($primera_fecha_de_vencimiento))));
                                }
                            }
                            ?>
                            <ul>
                                <?php for ($index = 0; $index < $facturasCliente['Cliente']['Formapago']['numero_vencimientos']; $index++): ?>
                                    <li><?php echo $primera_fecha_de_vencimiento; ?></li>
                                    <?php $primera_fecha_de_vencimiento = date("d-m-Y", strtotime($primera_fecha_de_vencimiento . " +" . $facturasCliente['Cliente']['Formapago']['dias_entre_vencimiento'] . " days")); ?>
                                <?php endfor; ?>
                            </ul>
                        </li>
                        <li>Nombre: <?php echo $facturasCliente['Cliente']['Cuentasbancaria']['nombre'] ?></li>
                        <li>Nº CCC: <?php echo $facturasCliente['Cliente']['Cuentasbancaria']['numero_entidad'] . $facturasCliente['Cliente']['Cuentasbancaria']['numero_sucursal'] . $facturasCliente['Cliente']['Cuentasbancaria']['numero_dc'] . $facturasCliente['Cliente']['Cuentasbancaria']['numero_cuenta'] ?></li>
                    </ul>
                <?php else: ?>
                    El cliente no tiene forma de pago establecida
                <?php endif; ?>
            </td>
            <td><span>Estado</span></td>
            <td><?php echo $facturasCliente['Estadosfacturascliente']['estado']; ?></td>
            <td><span>Total</span></td>
            <td><?php echo $facturasCliente['FacturasCliente']['total']; ?></td>
        </tr>
        <tr>
            <td><span>Observaciones</span></td>
            <td><?php echo $facturasCliente['FacturasCliente']['observaciones']; ?></td>
        </tr>
    </table>
    <fieldset>
        <legend>Albaranes de Repuestos en esta Factura</legend>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Impuestos</th>
                <th>Total</th>
                <th class="actions">Quitar de la Factura</th>
            </tr>
            <?php
            $i = 0;
            foreach ($facturasCliente['Albaranescliente'] as $albaranescliente):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $this->Html->link($albaranescliente['numero'],array('controller'=>'albaranesclientes','action'=>'view',$albaranescliente['id'])); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', $albaranescliente['fecha']); ?>&nbsp;</td>
                    <td><?php echo $albaranescliente['precio']; ?>&nbsp;</td>
                    <td><?php echo $albaranescliente['impuestos']; ?>&nbsp;</td>
                    <td><?php echo $albaranescliente['precio'] + $albaranescliente['impuestos']; ?>&nbsp;</td>
                    <td class="actions"><?php echo $this->Html->link('Quitar', array('controller' => 'facturas_clientes', 'action' => 'quitar_albaran_repuestos', $albaranescliente['id'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
    <fieldset>
        <legend>Albaranes de Reparación en esta Factura</legend>
        <table cellpadding="0" cellspacing="0">
            <tr>  
                <th>Nº</th>
                <th>Fecha</th>
                <th>Precio<br/>Mat.</th>
                <th>Precio<br/>Obra.</th>
                <th>Base<br/>Imponible</th>
                <th>Impuestos</th>
                <th>Total</th>
                <th class="actions">Quitar de la Factura</th>
            </tr>
            <?php
            $i = 0;
            foreach ($facturasCliente['Albaranesclientesreparacione'] as $albaranesclientesreparacione):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $this->Html->link($albaranesclientesreparacione['numero'],array('controller'=>'albaranesclientesreparaciones','action'=>'view',$albaranesclientesreparacione['id']) )?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', $albaranesclientesreparacione['fecha']) ?>&nbsp;</td>
                    <td><?php echo $albaranesclientesreparacione['total_materiales']; ?>&nbsp;</td>
                    <td><?php echo $albaranesclientesreparacione['total_manoobra']; ?></td>
                    <td><?php echo $albaranesclientesreparacione['baseimponible']; ?></td>
                    <td><?php echo redondear_dos_decimal($albaranesclientesreparacione['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100); ?></td>
                    <td><?php echo redondear_dos_decimal($albaranesclientesreparacione['baseimponible'] + ($albaranesclientesreparacione['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100)); ?></td>
                    <td class="actions"><?php echo $this->Html->link('Quitar', array('controller' => 'facturas_clientes', 'action' => 'quitar_albaran_reparacion', $albaranesclientesreparacione['id'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
</div>
