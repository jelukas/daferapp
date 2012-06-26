<div class="tiposivas">
    <h2>
        <?php __('Tiposivas'); ?>
        <?php echo $this->Html->link(__('Nuevo Tipo de iva', true), array('action' => 'add'),array('class'=>'button_link')); ?>
    </h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Denominación','tipoiva'); ?></th>
            <th><?php echo $this->Paginator->sort('Porcentaje','porcentaje_aplicable'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($tiposivas as $tiposiva):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $tiposiva['Tiposiva']['tipoiva']; ?>&nbsp;</td>
                <td><?php echo $tiposiva['Tiposiva']['porcentaje_aplicable']; ?>&nbsp;&percnt;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $tiposiva['Tiposiva']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $tiposiva['Tiposiva']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tiposiva['Tiposiva']['id'])); ?>
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