<div class="partes form">
    <?php echo $this->Form->create('Parte', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Parte'); ?></legend>

        <?php
        if (isset($tarea)) {
            echo $this->Form->label('Nº de Orden de Taller');
            echo $tarea['Ordene']['id'] . '<br><br>';

            echo $this->Form->label('Nº Tarea');
            echo $tarea['Tarea']['id'] . '<br><br>';
            echo $this->Form->hidden('tarea_id', array('value' => $tarea['Tarea']['id']));

            echo $this->Form->label('Centro de Trabajo');
            echo $centrotrabajo['Centrostrabajo']['direccion'] . '<br><br>';
        }
        ?>

        <?php
        echo $this->Form->hidden('centrostrabajo_id', array('value' => $centrotrabajo['Centrostrabajo']['id']));
        echo $this->Form->input('fecha');
        echo $this->Form->input('horainicio');
        echo $this->Form->input('horafinal');
        echo $this->Form->input('horasimputables');
        echo $this->Form->input('horasnoimputables');
        echo $this->Form->input('operacion');
        echo $this->Form->input('observaciones');
        echo $this->Form->input('firmadopor');
        echo $this->Form->input('DNI');
        echo $this->Form->input('Mecanico', array('label' => 'Mecánicos (Seleccione uno o varios mecánicos pulsando Ctrl + Click):'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte escaneado'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Partes', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
    </ul>
</div>