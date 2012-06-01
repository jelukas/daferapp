<div class="partestalleres form">
    <?php echo $this->Form->create('Partestallere', array('type' => 'file', 'url' => array($tarea['Tarea']['id'])));
    ;
    ?>
    <fieldset>
        <legend><?php __('Añadir Parte de Taller'); ?></legend>
        <?php
        if (isset($tarea)) {
            echo $this->Form->label('Nº de Orden de Taller');
            echo $tarea['Ordene']['id'] . '<br><br>';
            echo $this->Form->label('Nº Tarea');
            echo $tarea['Tarea']['id'] . '<br><br>';
            echo $this->Form->hidden('tarea_id', array('value' => $tarea['Tarea']['id']));
        }
        ?>
        <br>       
        <?php
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
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte escaneado'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>


        <li><?php echo $this->Html->link(__('Listar Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Mecánicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Mecánico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>

    </ul>
</div>