<div class="albaranesproveedores index">
    <h2><?php __('Albaranes de proveedores'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Id'); ?></th>
            <th><?php echo $this->Paginator->sort('Pedido de proveedor'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Albarán Escaneado'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($albaranesproveedores as $albaranesproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $albaranesproveedore['Albaranesproveedore']['id']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['id'])); ?>
                </td>
                <td><?php echo $albaranesproveedore['Albaranesproveedore']['fecha']; ?>&nbsp;</td>
                <td><?php echo $albaranesproveedore['Albaranesproveedore']['observaciones']; ?>&nbsp;</td>
                <td><? echo $this->Html->link($albaranesproveedore['Albaranesproveedore']['albaranescaneado'], array('action' => 'downloadFile', $albaranesproveedore['Albaranesproveedore']['id'])) ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesproveedore['Albaranesproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Albarán de proveedor', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Pedidos de proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido de proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Factura de proveedor', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
    </ul>
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <fieldset>
        <legend><?php __('Buscar') ?></legend>
        <?php
        echo $this->Form->input('pedidosproveedore_id', array('label' => 'Id Pedidos de Proveedores', 'empty' => '- Id de Pedido -'));
        echo $this->Form->input('numeroalbaran', array('label' => 'Número de albarán'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('Proveedore', array('label' => 'Proveedor', 'name' => 'proveedore_id', 'style' => 'width: 220px;', 'empty' => '- Proveedor -'));
        
        echo $this->Form->label('Fecha de Alabran de Proveedor ');
        echo $this->Form->label('Desde:');
        echo $this->Form->day('day_fecha_f', isset($this->params['url']['day_fecha_f']) ? $this->params['url']['day_fecha_f'] : 1, array('name' => 'day_fecha_f', 'empty' => false));
        echo $this->Form->month('month_fecha_f', isset($this->params['url']['month_fecha_f']) ? $this->params['url']['month_fecha_f'] : 1, array('name' => 'month_fecha_f', 'empty' => false));
        echo $this->Form->year('year_fecha_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_fecha_f']) ? $this->params['url']['year_fecha_f'] : date('Y') - 5, array('name' => 'year_fecha_f', 'empty' => false));
        echo $this->Form->label('Hasta:');
        echo $this->Form->day('day_fecha_t', isset($this->params['url']['day_fecha_t']) ? $this->params['url']['day_fecha_t'] : date('D'), array('name' => 'day_fecha_t', 'empty' => false));
        echo $this->Form->month('month_fecha_t', isset($this->params['url']['month_fecha_t']) ? $this->params['url']['month_fecha_t'] : date('m'), array('name' => 'month_fecha_t', 'empty' => false));
        echo $this->Form->year('year_fecha_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_fecha_t']) ? $this->params['url']['year_fecha_t'] : date('Y'), array('name' => 'year_fecha_t', 'empty' => false));
        ?>
        <?php echo $this->Form->submit('Ver informe PDF', array('name' => 'pdf')); ?>
        <?php echo $this->Form->end(__('Buscar', true)); ?>

    </fieldset>
</div>