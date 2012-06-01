<div class="partes form">
    <?php echo $this->Form->create('Parte', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Parte'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('horainicio', array('label' => 'Hora de inicio'));
        echo $this->Form->input('horafinal', array('label' => 'Hora de fin'));
        echo $this->Form->input('operacion', array('label' => 'Operación'));
        echo $this->Form->input('observaciones');
        echo $this->Form->input('firmadopor');
        echo $this->Form->input('DNI');
        echo $this->Html->link(__('Parte de Centro de Trabajo Escaneado Actual: ' . $this->Form->value('Parte.parteescaneado'), true), '/files/parte/' . $this->Form->value('Parte.parteescaneado'));
        echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Parte de Centro de Trabajo Escaneado Actual', 'hiddenField' => false));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Centro de Trabajo Escaneado'));
        echo $this->Form->input('Mecanico', array('label' => 'Mecánicos (Seleccione uno o varios mecánicos pulsando Ctrl + Click):'));
        ?>
    </fieldset>

    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Parte.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Parte.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Partes', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Orden', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Mecánicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Mecánico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
    </ul>
</div>