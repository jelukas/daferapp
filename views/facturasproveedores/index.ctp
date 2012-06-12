<div class="facturasproveedores">
    <h2>
        <?php __('Facturas de proveedores'); ?>
        <?php echo $this->Html->link(__('Listar Facturas de Proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de factura'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor'); ?></th>
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
                <td><?php echo $facturasproveedore['Facturasproveedore']['numero']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechafactura']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Proveedore']['nombre']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['baseimponible']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($facturasproveedore['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $facturasproveedore['Tiposiva']['id'])); ?></td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechalimitepago']; ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['fechapagada']; ?>&nbsp;</td>
                <td><? echo $this->Html->link($facturasproveedore['Facturasproveedore']['facturaescaneada'], array('action' => 'downloadFile', $facturasproveedore['Facturasproveedore']['id'])) ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $facturasproveedore['Facturasproveedore']['id'])); ?>
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