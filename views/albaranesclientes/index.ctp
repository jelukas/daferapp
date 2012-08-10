<div class="albaranesclientes">
    <h2>
        <?php __('Albaranes a Clientes'); ?>
        <?php echo $this->Html->link(__('Nuevo Albarán Directo', true), array('action' => 'add'), array('class' => 'button_link')); ?> 

    </h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('numero'); ?></th>
            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('precio'); ?></th>
            <th><?php echo $this->Paginator->sort('impuestos'); ?></th>
            <th>Total</th>
            <th><?php echo $this->Paginator->sort('comerciale_id'); ?></th>
            <th><?php echo $this->Paginator->sort('comision'); ?></th>
            <th><?php echo $this->Paginator->sort('avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('pedidoscliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('albaranescaneado'); ?></th>
            <th><?php echo $this->Paginator->sort('facturable'); ?></th>
            <th><?php echo $this->Paginator->sort('estadosalbaranescliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('facturas_cliente_id'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
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
                <td><?php echo $albaranescliente['Albaranescliente']['numero']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Cliente']['nombre']; ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y', $albaranescliente['Albaranescliente']['fecha']); ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['precio']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['impuestos']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['precio']+$albaranescliente['Albaranescliente']['impuestos']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Comerciale']['nombre']; ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($albaranescliente['Albaranescliente']['comision']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id'])); ?>
                </td>
                <td><?php echo $this->Html->link($albaranescliente['Pedidoscliente']['id'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?></td>
                <td><?php echo $albaranescliente['Albaranescliente']['albaranescaneado']; ?>&nbsp;</td>
                <td><?php echo $albaranescliente['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                <td><?php echo $albaranescliente['Estadosalbaranescliente']['estado'] ?></td>
                <td>
                    <?php if (!empty($albaranescliente['Albaranescliente']['facturas_cliente_id'])): ?>
                        <?php echo $this->Html->link($albaranescliente['FacturasCliente']['numero'], array('controller' => 'facturas_clientes', 'action' => 'view',$albaranescliente['Albaranescliente']['facturas_cliente_id'])); ?></td>
                <?php else: ?>
                    No Facturado
                <?php endif; ?>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranescliente['Albaranescliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranescliente['Albaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranescliente['Albaranescliente']['numero'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>	
    </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>|
        <?php echo $this->Paginator->numbers(); ?> |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>