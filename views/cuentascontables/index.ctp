<div class="cuentascontables">
    <h2>
        <?php __('Cuentas Contables'); ?>
        <?php echo $this->Html->link(__('Nueva Cuenta Contable', true), array('action' => 'add'),array('class' =>'button_link')); ?>
    </h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('codigo'); ?></th>
            <th><?php echo $this->Paginator->sort('nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('nombre_cuenta_abierta'); ?></th>
            <th><?php echo $this->Paginator->sort('nombre_cuenta_externa'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($cuentascontables as $cuentascontable):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $cuentascontable['Cuentascontable']['codigo']; ?>&nbsp;</td>
                <td><?php echo $cuentascontable['Cuentascontable']['nombre']; ?>&nbsp;</td>
                <td><?php echo $cuentascontable['Cuentascontable']['nombre_cuenta_abierta']; ?>&nbsp;</td>
                <td><?php echo $cuentascontable['Cuentascontable']['nombre_cuenta_externa']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $cuentascontable['Cuentascontable']['id'])); ?>
                    <?php echo $this->Html->link(__('Elminar', true), array('action' => 'delete', $cuentascontable['Cuentascontable']['id']), null, sprintf(__('Seguro que quieres eliminar la cuenta contable # %s?', true), $cuentascontable['Cuentascontable']['codigo'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>	
    </p>
    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>