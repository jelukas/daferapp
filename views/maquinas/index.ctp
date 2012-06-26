<div class="maquinas ">
    <h2>
        <?php __('Máquinas'); ?>
        <?php echo $this->Html->link(__('Nueva Maquina', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php
    echo $form->create('', array('action' => 'search'));
    echo $form->input('Buscar', array('type' => 'text'));
    echo $form->end('Buscar');
    ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Código Máquina', 'codigo'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre', 'nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('Nº serie Máquina', 'serie_maquina'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente', 'Centrostrabajo.cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Centro Trabajo', 'centrostrabajo_id'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($maquinas as $maquina):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $maquina['Maquina']['codigo']; ?>&nbsp;</td>
                <td><?php echo $maquina['Maquina']['nombre']; ?>&nbsp;</td>
                <td><?php echo $maquina['Maquina']['serie_maquina']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($maquina['Centrostrabajo']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $maquina['Centrostrabajo']['Cliente']['id'])); ?></td>
                <?php if (!empty($maquina['Centrostrabajo']['centrotrabajo'])): ?>
                    <td><?php echo $this->Html->link($maquina['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $maquina['Centrostrabajo']['id'])); ?></td>
                <?php else : ?>
                    <td><?php echo $this->Html->link($maquina['Centrostrabajo']['direccion'], array('controller' => 'centrostrabajos', 'action' => 'view', $maquina['Centrostrabajo']['id'])); ?></td>
                <?php endif; ?>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $maquina['Maquina']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $maquina['Maquina']['id']), null, sprintf(__('¿Está seguro que desea eliminar # %s?', true), $maquina['Maquina']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
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