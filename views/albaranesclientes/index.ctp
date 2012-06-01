<div class="albaranesclientes index">
    <h2><?php __('Albaranesclientes'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('numeroalbaran'); ?></th>
            <th><?php echo $this->Paginator->sort('facturable'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('albaranescaneado'); ?></th>
            <th><?php echo $this->Paginator->sort('avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('pedidoscliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('facturas_cliente_id'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($albaranesclientes as $albaranescliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $albaranescliente['Albaranescliente']['id']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['fecha']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['numeroalbaran']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                <td><?php echo $albaranescliente['Albaranescliente']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['albaranescaneado']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($albaranescliente['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $albaranescliente['Ordene']['id'])); ?>
                </td>
                <td><?php echo $this->Html->link($albaranescliente['Pedidoscliente']['id'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?></td>
                <td>
                    <?php if (!empty($albaranescliente['Albaranescliente']['facturas_cliente_id'])): ?>
                        <?php echo $this->Html->link($albaranescliente['Albaranescliente']['facturas_cliente_id'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?></td>
                <?php else: ?>
                    No Facturado
                <?php endif; ?>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $albaranescliente['Albaranescliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $albaranescliente['Albaranescliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $albaranescliente['Albaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranescliente['Albaranescliente']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>|
        <?php echo $this->Paginator->numbers(); ?> |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Albaranescliente', true), array('action' => 'add', 'directo')); ?></li>
        <li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Pedidosclientes', true), array('controller' => 'pedidosclientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Pedidoscliente', true), array('controller' => 'pedidosclientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Facturas Clientes', true), array('controller' => 'facturas_clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Facturas Cliente', true), array('controller' => 'facturas_clientes', 'action' => 'add')); ?> </li>
    </ul>
</div>