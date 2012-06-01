<div class="facturasproveedores index">
    <h2><?php __('Facturas de proveedores'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de factura'); ?></th>
            <th><?php echo $this->Paginator->sort('Base imponible'); ?></th>
            <th><?php echo $this->Paginator->sort('Tipo de IVA'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha limite de pago'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de pago'); ?></th>
            <th><?php echo $this->Paginator->sort('Factura escaneada'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($facturasproveedores as $facturasproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $facturasproveedore['Facturasproveedore']['id']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechafactura']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['baseimponible']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($facturasproveedore['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $facturasproveedore['Tiposiva']['id'])); ?></td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechalimitepago']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechapagada']; ?>&nbsp;</td>
                <td><? echo $this->Html->link($facturasproveedore['Facturasproveedore']['facturaescaneada'], array('action' => 'downloadFile', $facturasproveedore['Facturasproveedore']['id'])) ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $facturasproveedore['Facturasproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $facturasproveedore['Facturasproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $facturasproveedore['Facturasproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $facturasproveedore['Facturasproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $facturasproveedore['Facturasproveedore']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, empezando en la fila %start%, finalizando en %end%', true)
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
        <li><?php echo $this->Html->link(__('Listar Albaranes de proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
    </ul>
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <fieldset>
        <legend><?php __('Buscar') ?></legend>
        <?php
        echo $this->Form->label('Fecha de Factura ');
        echo $this->Form->label('Desde:');
        echo $this->Form->day('day_factura_f', isset($this->params['url']['day_factura_f']) ? $this->params['url']['day_factura_f'] : 1, array('name' => 'day_factura_f', 'empty' => false));
        echo $this->Form->month('month_factura_f', isset($this->params['url']['month_factura_f']) ? $this->params['url']['month_factura_f'] : 1, array('name' => 'month_factura_f', 'empty' => false));
        echo $this->Form->year('year_factura_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_factura_f']) ? $this->params['url']['year_factura_f'] : date('Y') - 5, array('name' => 'year_factura_f', 'empty' => false));
        echo $this->Form->label('Hasta:');
        echo $this->Form->day('day_factura_t', isset($this->params['url']['day_factura_t']) ? $this->params['url']['day_factura_t'] : date('D'), array('name' => 'day_factura_t', 'empty' => false));
        echo $this->Form->month('month_factura_t', isset($this->params['url']['month_factura_t']) ? $this->params['url']['month_factura_t'] : date('m'), array('name' => 'month_factura_t', 'empty' => false));
        echo $this->Form->year('year_factura_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_factura_t']) ? $this->params['url']['year_factura_t'] : date('Y'), array('name' => 'year_factura_t', 'empty' => false));
        echo $this->Form->input('tiposiva_id', array('label' => 'Tipo de IVA'));
        echo $this->Form->label('Fecha límite de Pago ');
        echo $this->Form->label('Desde:');
        echo $this->Form->day('day_limite_f', isset($this->params['url']['day_limite_f']) ? $this->params['url']['day_limite_f'] : 1, array('name' => 'day_limite_f', 'empty' => false));
        echo $this->Form->month('month_limite_f', isset($this->params['url']['month_limite_f']) ? $this->params['url']['month_limite_f'] : 1, array('name' => 'month_limite_f', 'empty' => false));
        echo $this->Form->year('year_limite_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_limite_f']) ? $this->params['url']['year_limite_f'] : date('Y') - 5, array('name' => 'year_limite_f', 'empty' => false));
        echo $this->Form->label('Hasta:');
        echo $this->Form->day('day_limite_t', isset($this->params['url']['day_limite_t']) ? $this->params['url']['day_limite_t'] : date('D'), array('name' => 'day_limite_t', 'empty' => false));
        echo $this->Form->month('month_limite_t', isset($this->params['url']['month_limite_t']) ? $this->params['url']['month_limite_t'] : date('m'), array('name' => 'month_limite_t', 'empty' => false));
        echo $this->Form->year('year_limite_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_limite_t']) ? $this->params['url']['year_limite_t'] : date('Y'), array('name' => 'year_limite_t', 'empty' => false));
        echo $this->Form->label('Fecha de Pago ');
        echo $this->Form->label('Desde:');
        echo $this->Form->day('day_fechapagada_f', isset($this->params['url']['day_fechapagada_f']) ? $this->params['url']['day_fechapagada_f'] : 1, array('name' => 'day_fechapagada_f', 'empty' => false));
        echo $this->Form->month('month_fechapagada_f', isset($this->params['url']['month_fechapagada_f']) ? $this->params['url']['month_fechapagada_f'] : 1, array('name' => 'month_fechapagada_f', 'empty' => false));
        echo $this->Form->year('year_fechapagada_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_fechapagada_f']) ? $this->params['url']['year_fechapagada_f'] : date('Y') - 5, array('name' => 'year_fechapagada_f', 'empty' => false));
        echo $this->Form->label('Hasta:');
        echo $this->Form->day('day_fechapagada_t', isset($this->params['url']['day_fechapagada_t']) ? $this->params['url']['day_fechapagada_t'] : date('D'), array('name' => 'day_fechapagada_t', 'empty' => false));
        echo $this->Form->month('month_fechapagada_t', isset($this->params['url']['month_fechapagada_t']) ? $this->params['url']['month_fechapagada_t'] : date('m'), array('name' => 'month_fechapagada_t', 'empty' => false));
        echo $this->Form->year('year_fechapagada_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_fechapagada_t']) ? $this->params['url']['year_fechapagada_t'] : date('Y'), array('name' => 'year_fechapagada_t', 'empty' => false));
        echo $this->Form->submit('Ver informe PDF', array('name' => 'pdf'));
        echo $this->Form->end(__('Buscar', true));
        ?>
    </fieldset>

</div>