<div class="tiposivas form">
<?php echo $this->Form->create('Tiposiva');?>
	<fieldset>
 		<legend><?php __('Editar Tipo de iva'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipoiva',array('label'=>'Tipo de iva'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Tiposiva.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tiposiva.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index'));?></li>
	</ul>
</div>