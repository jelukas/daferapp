<div class="transportistas">
    <?php echo $form->create('Transportista'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Transportista'); ?>
            <?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $form->value('Transportista.id')), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el transportista # %s?', true), $form->value('Transportista.nombre'))); ?>
            <?php echo $html->link(__('Listar Transportistas', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <?php
        echo $form->input('id');
        ?>
        <table class="view edit">
            <tr>
                <td><span><?php __('Nombre'); ?></span></td>
                <td><?php echo $form->input('nombre', array('label' => False)); ?></td>
                <td><span><?php __('Código cliente'); ?></span></td>
                <td><?php echo $form->input('codigocliente', array('label' => False)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Descripción'); ?></span></td>
                <td colspan="3"><?php echo $form->input('descripcion', array('label' =>False)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="3"><?php echo $form->input('observaciones', array('label' =>False)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $form->end('Guardar'); ?>
</div>