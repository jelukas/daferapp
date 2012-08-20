<?php echo $this->Form->create('Tareasalbaranescliente'); ?>
<fieldset>
    <legend><?php __('Add Tareasalbaranescliente'); ?></legend>
    <label>Tipo de Tarea</label>
    <?php
    //$options = array('taller' => 'En taller', 'centro' => 'En el Centro de Trabajo', 'repuestos' => 'Repuestos');
    $options = array('repuestos' => 'Repuestos');
    echo $this->Form->select('tipo', $options, false, array('empty' => false));
    ?>
    <?php
    echo $this->Form->input('asunto');
    echo $this->Form->input('materiales', array('type' => 'hidden', 'value' => 0));
    echo $this->Form->input('mano_de_obra', array('type' => 'hidden', 'value' => 0));
    echo $this->Form->input('pedidoscliente_id', array('type' => 'hidden', 'value' => $albaranescliente_id));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>