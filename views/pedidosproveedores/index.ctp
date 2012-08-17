<div class="pedidosproveedores">
    <h2>
        <?php __('Pedidos a Proveedores'); ?>
        <?php echo $this->Html->link(__('Listar Presupuestos', true), array('controller' => 'presupuestosproveedores', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Pedidosproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Número', 'numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor', 'Presupuestosproveedore.proveedore_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor', 'Presupuestosproveedore.almacene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de repuesto', 'Presupuestosproveedore.avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de taller', 'Presupuestosproveedore.avisostallere_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden', 'Presupuestosproveedore.ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de entrega', 'fecharecepcion'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones', 'Presupuestosproveedore.observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('confirmado'); ?></th>
            <th><?php echo $this->Paginator->sort('Adjunto', 'pedidoescaneado'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado', 'estadospedidosproveedore'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($pedidosproveedores as $pedidosproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $pedidosproveedore['Pedidosproveedore']['numero']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($pedidosproveedore['Presupuestosproveedore']['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Proveedore']['id'])); ?></td>
                <td><?php echo $this->Html->link($pedidosproveedore['Presupuestosproveedore']['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Almacene']['id'])); ?></td>  
                <td><?php echo @$this->Html->link($pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['avisosrepuesto_id'])); ?></td>    
                <td><?php echo @$this->Html->link($pedidosproveedore['Presupuestosproveedore']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['avisostallere_id'])); ?></td>   
                <td><?php echo @$this->Html->link($pedidosproveedore['Presupuestosproveedore']['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['ordene_id'])); ?></td>
                <td><?php echo $pedidosproveedore['Pedidosproveedore']['fecharecepcion']; ?>&nbsp;</td>
                <td><?php echo $pedidosproveedore['Pedidosproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo!empty($pedidosproveedore['Pedidosproveedore']['confirmado']) ? 'Sí' : 'No'; ?></td>
                <td><?php if (!empty($pedidosproveedore['Pedidosproveedore']['pedidoescaneado'])) echo $this->Html->image('clip.png', array('url' => '/files/pedidosproveedore/' . $pedidosproveedore['Pedidosproveedore']['pedidoescaneado'])); ?></td>
                <td><?php echo $pedidosproveedore['Estadospedidosproveedore']['estado']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $pedidosproveedore['Pedidosproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $pedidosproveedore['Pedidosproveedore']['id'])); ?>
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