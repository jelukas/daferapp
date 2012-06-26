<div class="centrosdecostes">
    <h2>
        <?php __('Centros de Coste'); ?>
        <?php echo $this->Html->link(__('Nuevo Centro de Coste', true), array('action' => 'add'),array('class'=>'button_link')); ?>
    </h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('denominacion'); ?></th>
            <th><?php echo $this->Paginator->sort('codigo'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($centrosdecostes as $centrosdecoste):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $centrosdecoste['Centrosdecoste']['denominacion']; ?>&nbsp;</td>
                <td><?php echo $centrosdecoste['Centrosdecoste']['codigo']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $centrosdecoste['Centrosdecoste']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $centrosdecoste['Centrosdecoste']['id']), null, sprintf(__('Seguro que quieres eliminar el Centro de Coste # %s?', true), $centrosdecoste['Centrosdecoste']['denominacion'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en el registro %start%, finalizando en %end%', true)
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