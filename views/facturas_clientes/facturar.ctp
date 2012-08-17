<div class="facturasClientes">
    <h2><?php __('Facturas Clientes Creadas'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Numero'); ?></th>
            <th><?php echo __('Cliente'); ?></th>
            <th><?php echo __('Fecha'); ?></th>
            <th><?php echo __('Observaciones'); ?></th>
            <th><?php echo __('Base Imponible'); ?></th>
            <th><?php echo __('Impuestos'); ?></th>
            <th><?php echo __('Total'); ?></th>
            <th><?php echo __('Factura escaneada'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($facturasClientes as $facturasCliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $facturasCliente['FacturasCliente']['numero']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($facturasCliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $facturasCliente['Cliente']['id'])); ?></td>
                <td><?php echo $this->Time->format('d-m-Y', $facturasCliente['FacturasCliente']['fecha']); ?>&nbsp;</td>
                <td><?php echo $facturasCliente['FacturasCliente']['observaciones']; ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasCliente['FacturasCliente']['baseimponible']); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasCliente['FacturasCliente']['impuestos']); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasCliente['FacturasCliente']['total']); ?></td>
                <td><?php if (!empty($facturasCliente['FacturasCliente']['facturaescaneada']))echo $this->Html->image('clip.png',array('url' => array('action' => 'downloadFile', $facturasCliente['FacturasCliente']['id']))); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $facturasCliente['FacturasCliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $facturasCliente['FacturasCliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $facturasCliente['FacturasCliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $facturasCliente['FacturasCliente']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>