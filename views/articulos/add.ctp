<div class="articulos form">
<?php echo $this->Form->create('Articulo');?>
	<fieldset>
 		<legend><?php __('Añadir Artículo'); ?></legend>
	<?php
		echo $this->Form->input('ref',array('label' => __('Referencia',true)));
		echo $this->Form->input('nombre',array('label' => __('Nombre',true)));
		echo $this->Form->input('codigobarras',array('label' => __('Código de barras',true)));

		echo $this->Form->input('precio_sin_iva',array('label' => __('Precio (sin IVA)',true)));
		echo $this->Form->input('familia_id',array('label' => __('Familia',true)));
		echo $this->Form->input('localizacion',array('label' => __('Localización',true)));
		echo $this->Form->input('existencias',array('label' => __('Existencias',true)));
		echo $this->Form->input('almacene_id',array('label' => __('Almacén',true)));
		echo $this->Form->input('proveedore_id',array('label' => __('Proveedor habitual',true)));
		echo $this->Form->input('stock_minimo',array('label' => __('Stock mínimo',true)));
		echo $this->Form->input('observaciones',array('label' => __('Observaciones',true)));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Familias', true), array('controller' => 'familias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Familia', true), array('controller' => 'familias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Almacén', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ref. Intercambiables', true), array('controller' => 'referenciasintercambiables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Ref. Intercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add')); ?> </li>
	</ul>
</div>
