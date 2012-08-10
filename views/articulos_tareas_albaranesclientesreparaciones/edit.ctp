<?php echo $this->Form->create('ArticulosTareasAlbaranesclientesreparacione'); ?>
<fieldset>
    <legend><?php __('Editar Artículo de la Tarea del Albarán'); ?></legend>
    <label>Articulo: <?php echo $this->Form->value('Articulo.nombre') ?></label>
    <?php 
    echo $this->Form->input('cantidadreal',array('label'=>'Cantidad Real'));
    echo $this->Form->input('cantidad',array('label' => 'Cantidad Imputable'));
    echo $this->Form->input('descuento',array('label' => 'Descuento'));
    echo $this->Form->input('id');
    echo $this->Form->input('articulo_id',array('type'=>'hidden','label'=>False));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>