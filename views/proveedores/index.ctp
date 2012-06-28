<div class="proveedores">
    <h2>
        <?php __('Proveedores'); ?>
        <?php echo $this->Html->link(__('Nuevo proveedor', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <?php
    echo $form->create('', array('action' => 'search'));
    echo $form->input('Buscar', array('type' => 'text'));
    echo $form->end('Buscar');
    ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('CIF', 'cif'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre', 'nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedores de', 'proveedoresde'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones', 'observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Teléfono', 'telefono'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($proveedores as $proveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $proveedore['Proveedore']['cif']; ?>&nbsp;</td>
                <td><?php echo $proveedore['Proveedore']['nombre']; ?>&nbsp;</td>
                <td><?php echo $proveedore['Proveedore']['proveedoresde']; ?>&nbsp;</td>
                <td><?php echo $proveedore['Proveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $proveedore['Proveedore']['telefono']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $proveedore['Proveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $proveedore['Proveedore']['id']), null, sprintf(__('Está seguro que desea eliminar el proveedor # %s?', true), $proveedore['Proveedore']['id'])); ?>
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
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>