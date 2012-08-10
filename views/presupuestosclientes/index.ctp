<div class="presupuestosclientes">
    <h2>
        <?php __('Presupuestos a Clientes'); ?>
        <?php echo $this->Html->link(__('Nuevo Presupuesto a Cliente', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Presupuestos a Clientes', true), array( 'action' => 'index'), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Imprimir', true),'#?', array('class' => 'button_link')); ?> 
    </h2>
    
    <?php echo $this->Form->create('Presupuestoscliente', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Nº Presu.', 'numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente', 'cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('precio_mat'); ?></th>
            <th><?php echo $this->Paginator->sort('precio_obra'); ?></th>
            <th><?php echo $this->Paginator->sort('precio'); ?></th>
            <th><?php echo $this->Paginator->sort('impuestos'); ?></th>
            <th><?php echo $this->Paginator->sort('Av. Repuestos', 'avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden', 'ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Av. Taller', 'avisostallere_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado','estadospresupuestoscliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Comercial','comerciale_id'); ?></th>
            <th><?php echo $this->Paginator->sort('avisar'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($presupuestosclientes as $presupuestoscliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['numero']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($presupuestoscliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestoscliente['Cliente']['id'])); ?></td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['fecha']; ?>&nbsp;</td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['precio_mat']; ?>&nbsp;</td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['precio_obra']; ?>&nbsp;</td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['precio']; ?>&nbsp;</td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['impuestos']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($presupuestoscliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestoscliente['Avisosrepuesto']['id'])); ?></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestoscliente['Ordene']['id'])); ?></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestoscliente['Avisostallere']['id'])); ?></td>
                <td><?php echo $presupuestoscliente['Estadospresupuestoscliente']['estado']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($presupuestoscliente['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $presupuestoscliente['Comerciale']['id'])); ?></td>
                <td><?php echo $presupuestoscliente['Presupuestoscliente']['avisar']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $presupuestoscliente['Presupuestoscliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $presupuestoscliente['Presupuestoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['Presupuestoscliente']['id'])); ?>
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
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>