<div class="familias form">
<?php echo $this->Form->create('Familia');?>
	<fieldset>
 		<legend><?php __('Editar Familia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre',array('label'=>'Nombre'));
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Familia.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Familia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Familias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
