<div class="pedidosclientes">
    <h2><?php __('Pedidos cliente'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('numero'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha_plazo'); ?></th>
            <th><?php echo $this->Paginator->sort('confirmado'); ?></th>
            <th><?php echo $this->Paginator->sort('presupuestoscliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('recepcion'); ?></th>
            <th><?php echo $this->Paginator->sort('pedidoescaneado'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($pedidosclientes as $pedidoscliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $pedidoscliente['Pedidoscliente']['numero']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['fecha_plazo']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['confirmado']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['id'], array('controller' => 'presupuestosclientes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['id'])); ?></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['recepcion']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['pedidoescaneado'], array('action' => 'downloadFile', $pedidoscliente['Pedidoscliente']['id'])) ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $pedidoscliente['Pedidoscliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $pedidoscliente['Pedidoscliente']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
        ));
        ?>	
    </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>