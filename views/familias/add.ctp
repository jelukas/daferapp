<div class="familias form">
<?php echo $this->Form->create('Familia');?>
	<fieldset>
 		<legend><?php __('Añadir Familia'); ?></legend>
	<?php
		echo $this->Form->input('nombre',array('label'=>'Nombre'));
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Familias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
