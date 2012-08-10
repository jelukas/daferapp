<div class="mecanicos">
    <?php echo $this->Form->create('Mecanico'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Mecanico'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Mecanico.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Mecanico.id')), array('class' => 'button_link'), sprintf(__('¿Está seguro de que quiere eliminar # %s?', true), $this->Form->value('Mecanico.nombre'))); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <?php
        echo $this->Form->input('id');
        ?>
        <table class="view edit">
            <tr>
                <td><?php echo $this->Form->input('nombre', array('label' => 'Nombre y Apellidos')); ?></td>
                <td><?php echo $this->Form->input('dni', array('label' => 'DNI')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('fechaalta', array('label' => 'Fecha de Alta', 'dateFormat' => 'DMY')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('guardar', true)); ?>
</div>
