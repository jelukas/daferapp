<?php echo $this->Form->create('ArticulosTarea'); ?>
<fieldset>
    <legend><?php __('Editar Artículo de la Tarea'); ?></legend>
    <label>Articulo: <?php echo $this->Form->value('Articulo.nombre') ?></label>
    <?php 
    echo $this->Form->input('cantidadreal',array('label'=>'Cantidad Real'));
    echo $this->Form->input('cantidad',array('label' => 'Cantidad Imputable'));
    echo $this->Form->input('descuento',array('label' => 'Descuento'));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>