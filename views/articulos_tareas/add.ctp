<?php echo $this->Form->create('ArticulosTarea'); ?>
<fieldset>
    <legend><?php __('Añadir Artículo a la Tarea'); ?></legend>
    <?php 
    echo $this->Autocomplete->replace_select('Articulo', null, true,$tarea['Ordene']['almacene_id']);
    echo $this->Form->input('tarea_id', array('type' => 'hidden', 'value' => $tarea_id));
    echo $this->Form->input('cantidadreal',array('label'=>'Cantidad Real'));
    echo $this->Form->input('cantidad',array('label' => 'Cantidad Imputable'));
    echo $this->Form->input('descuento',array('label' => 'Descuento','value' =>$descuento));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>