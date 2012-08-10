<div class="facturasproveedores">
    <h2>
        <?php __('Factura de proveedor'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $facturasproveedore['Facturasproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Factura de proveedor', true), array('action' => 'delete', $facturasproveedore['Facturasproveedore']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $facturasproveedore['Facturasproveedore']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="3">
                <span>Número</span>
                <?php echo $facturasproveedore['Facturasproveedore']['numero']; ?>
            </td>
            <td>
                <span>Estado</span>
                <?php echo $facturasproveedore['Estadosfacturasproveedore']['estado']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Proveedor</span>
                <?php echo $this->Html->link($facturasproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $facturasproveedore['Proveedore']['id'])); ?>
            </td>
            <td>
                <span>Fecha</span>
                <?php echo $this->Time->format('d-m-Y', $facturasproveedore['Facturasproveedore']['fechafactura']); ?>
            </td>
            <td>
                <span>Fecha Pagada</span>
                <?php echo $this->Time->format('d-m-Y', $facturasproveedore['Facturasproveedore']['fechapagada']); ?>
            </td>
            <td>
                <span>Fecha Límite de Pago</span>
                <?php echo $this->Time->format('d-m-Y', $facturasproveedore['Facturasproveedore']['fechalimitepago']); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Base Imponible</span>
                <?php echo $facturasproveedore['Facturasproveedore']['baseimponible'] ?> &euro;
            </td>
            <td colspan="2">
                <span>Tipo de Iva</span>
                <?php echo $this->Html->link($facturasproveedore['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $facturasproveedore['Tiposiva']['id'])); ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php echo $facturasproveedore['Facturasproveedore']['observaciones'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Factura Escaneada</span>
                <?php echo $this->Html->link(__($facturasproveedore['Facturasproveedore']['facturaescaneada'], true), '/files/facturasproveedore/' . $facturasproveedore['Facturasproveedore']['facturaescaneada']); ?>
            </td>
            <td>
                <span>Forma de Pago</span>
                <?php echo!empty($facturasproveedore['Proveedore']['Formapago']['nombre']) ? $facturasproveedore['Proveedore']['Formapago']['nombre'] : 'El proveedor no tiene forma de Pago Establecida' ?>
            </td>
        </tr>
    </table>
    <div class="related" style="margin-top: 30px">
        <h3><?php __('Albaranes Incluidos'); ?></h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Nº Albarán</th>
                <th>Fecha</th>
                <th>Base Imponible</th>
                <th>Observaciones</th>
                <th>Albarán Escaneado</th>
                <th class="actions">Quitar de la Factura</th>
            </tr>
            <?php
            $i = 0;
            foreach ($facturasproveedore['Albaranesproveedore'] as $albaranesproveedore):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $this->Html->link(__($albaranesproveedore['numero'], true), array('controller' => 'albaranesproveedores', 'action' => 'view', $albaranesproveedore['id'])); ?></td>
                    <td><?php echo $albaranesproveedore['fecha']; ?>&nbsp;</td>
                    <td><?php echo $albaranesproveedore['baseimponible']; ?>&nbsp;</td>
                    <td><?php echo $albaranesproveedore['observaciones']; ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__($albaranesproveedore['albaranescaneado'], true), '/files/albaranesproveedore/' . $albaranesproveedore['albaranescaneado']); ?></td>
                    <td class="actions"><?php echo $this->Html->link(__('Quitar', true), array('action' => 'quitar_albaran', $albaranesproveedore['id'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="total_orden">
        <p>Base imponible: <?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible']); ?> &euro;</p>
        <p>Impuestos: <?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible'] * ($facturasproveedore['Tiposiva']['porcentaje_aplicable'] / 100)); ?> &euro;</p>
        <p>Total: <?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible']) + redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible'] * ($facturasproveedore['Tiposiva']['porcentaje_aplicable'] / 100)); ?> &euro;</p>
    </div>
</div>