<div class="facturasClientes">
    <h2><?php __('Factura de Cliente'); ?> <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $facturasCliente['FacturasCliente']['id']), array('class' => 'button_link')); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Numero'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['numero']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['fecha']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['Cliente']['nombre']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de Cobro'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['cobrado']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Factura Escaneada'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link(__($facturasCliente['FacturasCliente']['facturaescaneada'], true), '/files/facturascliente/' . $facturasCliente['FacturasCliente']['facturaescaneada']); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Total'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $facturasCliente['FacturasCliente']['total']; ?>
            &nbsp;
        </dd>
    </dl>

    <fieldset>
        <legend>Albaranes en esta Factura</legend>
        <table>
            <tr>
                <th><?php echo __('id'); ?></th>
                <th><?php echo __('fecha'); ?></th>
                <th><?php echo __('numeroalbaran'); ?></th>
                <th><?php echo __('observaciones'); ?></th>
                <th><?php echo __('albaranescaneado'); ?></th>
                <th><?php echo __('avisosrepuesto_id'); ?></th>
                <th><?php echo __('ordene_id'); ?></th>
                <th><?php echo __('pedidoscliente_id'); ?></th>
                <th><?php echo __('Precio'); ?></th>
                <th><?php echo __('Quitar de la Factura'); ?></th>
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
                    <td><?php echo $this->Html->link($albaranescliente['id'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaranescliente['id'])); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($albaranescliente['fecha'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaranescliente['id'])); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($albaranescliente['numeroalbaran'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaranescliente['id'])); ?>&nbsp;</td>
                    <td><?php echo $albaranescliente['observaciones']; ?>&nbsp;</td>
                    <td><?php echo $albaranescliente['albaranescaneado']; ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($albaranescliente['avisosrepuesto_id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['avisosrepuesto_id'])); ?></td>
                    <td><?php echo $this->Html->link($albaranescliente['ordene_id'], array('controller' => 'ordenes', 'action' => 'view', $albaranescliente['ordene_id'])); ?></td>
                    <td><?php echo $this->Html->link($albaranescliente['pedidoscliente_id'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['pedidoscliente_id'])); ?></td>
                    <td><?php echo $albaranescliente['precio']; ?>&nbsp;</td>
                    <td class="actions"><?php echo $this->Html->link('Quitar', array('controller' => 'facturas_clientes', 'action' => 'quitar_albaran', $albaranescliente['id'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
</div>
