<?php echo $this->Form->create('Tareaspresupuestocliente'); ?>
<fieldset>
    <legend><?php __('Editar Tarea del Presupuesto a Cliente'); ?></legend>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('asunto');
    echo $this->Form->input('presupuestoscliente_id',array('type'=>'hidden'));
    $options = array('taller' => 'En taller', 'centro' => 'En el Centro de Trabajo', 'repuestos' => 'Repuestos');
    echo $this->Form->select('tipo', $options, $this->Form->value('Tareaspresupuestocliente.tipo'), array('empty' => false));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>