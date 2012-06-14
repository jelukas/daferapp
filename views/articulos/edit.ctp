<div class="articulos form">
<?php echo $this->Form->create('Articulo');?>
	<fieldset>
 		<legend><?php __('Editar Artículo'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => __('ID',true)));
		echo $this->Form->input('ref',array('label' => __('Referencia',true)));
		echo $this->Form->input('nombre',array('label' => __('Nombre',true)));
		echo $this->Form->input('codigobarras',array('label' => __('Código de barras',true)));
		echo $this->Form->input('precio_sin_iva',array('label' => __('Precio (sin IVA)',true)));
		echo $this->Form->input('ultimopreciocompra',array('label' => __('Último Precio de Compra',true)));
		echo $this->Form->input('familia_id',array('label' => __('Familia',true)));
		echo $this->Form->input('localizacion',array('label' => __('Localización',true)));
		echo $this->Form->input('existencias',array('label' => __('Existencias',true)));
		echo $this->Form->input('almacene_id',array('label' => __('Almacén',true)));
		echo $this->Form->input('proveedore_id',array('label' => __('Proveedor habitual',true)));
		echo $this->Form->input('stock_minimo',array('label' => __('Stock mínimo',true)));
		echo $this->Form->input('observaciones',array('label' => __('Observaciones',true)));
		echo $this->Form->input('referenciasintercambiable_id',array('label' => __('Referencias Intercambiables',true)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Articulo.id')), null, sprintf(__('¿Desea borrar el artículo %s?', true), $this->Form->value('Articulo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Articulos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Familias', true), array('controller' => 'familias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Familia', true), array('controller' => 'familias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Almacén', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
