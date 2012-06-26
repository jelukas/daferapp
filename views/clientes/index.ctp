<div class="clientes">
    <h2>
        <?php __('Maestro de Clientes'); ?>
        <?php echo $html->link(__('Nuevo Cliente', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <?php
    echo $form->create('', array('action' => 'search'));
    echo $form->input('Buscar', array('type' => 'text'));
    echo $form->end('Buscar');
    ?>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th><?php echo $paginator->sort('CIF'); ?></th>
            <th><?php echo $paginator->sort('Nombre Comercial'); ?></th>
            <th><?php echo $paginator->sort('Teléfono'); ?></th>
            <th><?php echo $paginator->sort('Comercial'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($clientes as $cliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>

                <td>
                    <?php echo $cliente['Cliente']['cif']; ?>
                </td>
                <td>
                    <?php echo $cliente['Cliente']['nombre']; ?>
                </td>
                <td>
                    <?php echo $cliente['Cliente']['telefono']; ?>
                </td>
                <td>
                    <?php echo $html->link($cliente['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $cliente['Comerciale']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $html->link(__('Ver', true), array('action' => 'view', $cliente['Cliente']['id'])); ?>
                    <?php echo $html->link(__('Editar', true), array('action' => 'edit', $cliente['Cliente']['id'])); ?>
                    <?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $cliente['Cliente']['id']), null, sprintf(__('Está seguro que desea eliminar el cliente # %s?', true), $cliente['Cliente']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        |	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>