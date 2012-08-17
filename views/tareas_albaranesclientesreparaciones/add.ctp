<?php echo $this->Form->create('TareasAlbaranesclientesreparacione'); ?>
<fieldset>
    <legend><?php __('Añadir Nueva Tarea al Albarán de Reparación'); ?></legend>
    <label>Tipo de Tarea</label>
    <?php
    $options = array('taller' => 'En taller', 'centro' => 'En el Centro de Trabajo');
    echo $this->Form->select('tipo', $options,false,array('empty' => False));
    ?>
    <?php
    echo $this->Form->input('descripcion');
    echo $this->Form->input('albaranesclientesreparacione_id',array('label'=>False,'type'=>'hidden','value'=>$albaranesclientesreparacione_id));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>