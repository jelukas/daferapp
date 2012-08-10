<div class="formapagos">
    <h2>
        <?php __('Formas de pagos'); ?>
        <?php echo $this->Html->link(__('Nueva Forma de Pago', true), array('action' => 'add'),array('class' => 'button_link')); ?>
    </h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('tipodepago'); ?></th>
            <th><?php echo $this->Paginator->sort('numero_vencimientos'); ?></th>
            <th><?php echo $this->Paginator->sort('dias_entre_vencimiento'); ?></th>
            <th><?php echo $this->Paginator->sort('dia_mes_fijo_vencimiento'); ?></th>
            <th><?php echo $this->Paginator->sort('proveedore_id'); ?></th>
            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($formapagos as $formapago):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $formapago['Formapago']['nombre']; ?>&nbsp;</td>
                <td><?php echo $formapago['Formapago']['tipodepago']; ?>&nbsp;</td>
                <td><?php echo $formapago['Formapago']['numero_vencimientos']; ?>&nbsp;</td>
                <td><?php echo $formapago['Formapago']['dias_entre_vencimiento']; ?>&nbsp;</td>
                <td><?php echo $formapago['Formapago']['dia_mes_fijo_vencimiento']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($formapago['Proveedore']['idnombre'], array('controller' => 'proveedores', 'action' => 'view', $formapago['Proveedore']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($formapago['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $formapago['Cliente']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $formapago['Formapago']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $formapago['Formapago']['id']), null, sprintf(__('¿ Seguro que deseas borrar la forma de pago # %s?', true), $formapago['Formapago']['nombre'])); ?>
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