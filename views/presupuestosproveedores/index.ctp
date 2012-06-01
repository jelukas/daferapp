<div class="presupuestosproveedores index">
    <h2><?php __('Presupuestos de proveedores'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor'); ?></th>
            <th><?php echo $this->Paginator->sort('Almacén'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de Repuesto'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de Taler'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de plazo'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Confirmado'); ?></th>
            <th><?php echo $this->Paginator->sort('Presupuesto escaneado'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($presupuestosproveedores as $presupuestosproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['id']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?>
                </td>     
                <td>
                    <?php echo $this->Html->link($presupuestosproveedore['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?>
                </td>    
                <td>
                    <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?>
                </td>   
                <td>
                    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Ordene']['id'])); ?>
                </td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>&nbsp;</td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['confirmado']; ?>&nbsp;</td>
                <td><? echo $this->Html->link($presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado'], array('action' => 'downloadFile', $presupuestosproveedore['Presupuestosproveedore']['id'])) ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $presupuestosproveedore['Presupuestosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
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
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto Directo', true), array('controller' => 'presupuestosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Almacén', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
    </ul>
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <fieldset>
        <legend><?php __('Buscar') ?></legend>
        <?php
        echo $this->Form->input('proveedore_id', array('label' => 'Proveedor', 'style' => 'width: 220px;', 'empty' => '- Proveedor -'));
        echo $this->Form->input('almacene_id', array('label' => 'Almacén','style' => 'width: 220px;', 'empty' => '--- Seleccione un almacén ---'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('confirmado', array('Confirmado'));

        echo $this->Form->label('Fecha de plazo');
        echo $this->Form->label('Desde:');
        echo $this->Form->day('day_fechaplazo_f', isset($this->params['url']['day_fechaplazo_f']) ? $this->params['url']['day_fechaplazo_f'] : 1, array('name' => 'day_fechaplazo_f', 'empty' => false));
        echo $this->Form->month('month_fechaplazo_f', isset($this->params['url']['month_fechaplazo_f']) ? $this->params['url']['month_fechaplazo_f'] : 1, array('name' => 'month_fechaplazo_f', 'empty' => false));
        echo $this->Form->year('year_fechaplazo_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_fechaplazo_f']) ? $this->params['url']['year_fechaplazo_f'] : date('Y') - 5, array('name' => 'year_fechaplazo_f', 'empty' => false));
        echo $this->Form->label('Hasta:');
        echo $this->Form->day('day_fechaplazo_t', isset($this->params['url']['day_fechaplazo_t']) ? $this->params['url']['day_fechaplazo_t'] : date('D'), array('name' => 'day_fechaplazo_t', 'empty' => false));
        echo $this->Form->month('month_fechaplazo_t', isset($this->params['url']['month_fechaplazo_t']) ? $this->params['url']['month_fechaplazo_t'] : date('m'), array('name' => 'month_fechaplazo_t', 'empty' => false));
        echo $this->Form->year('year_fechaplazo_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_fechaplazo_t']) ? $this->params['url']['year_fechaplazo_t'] : date('Y'), array('name' => 'year_fechaplazo_t', 'empty' => false));
        ?>
        <?php echo $this->Form->submit('Ver informe PDF', array('name' => 'pdf')); ?>
        <?php echo $this->Form->end(__('Buscar', true)); ?>

    </fieldset>
</div>