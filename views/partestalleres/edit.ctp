<div class="partestalleres form">
    <?php echo $this->Form->create('Partestallere', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Parte de taller'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('tarea_id');
        echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('horainicio', array('label' => 'Hora de inicio', 'timeFormat' => '24'));
        echo $this->Form->input('horafinal', array('label' => 'Hora final', 'timeFormat' => '24'));
        echo $this->Form->input('horasimputables', array('label' => 'Horas imputables'));
        echo $this->Form->input('horasnoimputables', array('label' => 'Horas no imputables'));
        echo $this->Form->input('operacion', array('label' => 'Operaciones a realizar'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('firmadopor', array('label' => 'Parte firmado por'));
        echo $this->Form->input('DNI', array('label' => 'DNI'));
        echo $this->Form->input('Mecanico', array('label' => 'Mecánicos (Seleccione uno o varios mecánicos pulsando Ctrl + Click):'));
        echo $this->Html->link(__('Parte de Taller Escaneado Actual: ' . $this->Form->value('Partestallere.parteescaneado'), true), '/files/partestallere/' . $this->Form->value('Partestallere.parteescaneado'));
        echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Parte de Taller Escaneado Actual', 'hiddenField' => false));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Taller Escaneado'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Partestallere.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Partestallere.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Partestalleres', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Tareas', true), array('controller' => 'tareas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Tarea', true), array('controller' => 'tareas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
    </ul>
</div>