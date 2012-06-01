<div class="mecanicos form">
<?php echo $this->Form->create('Mecanico');?>
	<fieldset>
 		<legend><?php __('Edit Mecanico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dni',array('label'=>'DNI'));
		echo $this->Form->input('nombre',array('label'=>'Nombre y Apellidos'));
		echo $this->Form->input('costehora',array('label'=>'Coste Hora'));
		echo $this->Form->input('costehoraextra',array('label'=>'Coste Hora Extra'));
		echo $this->Form->input('fechaalta',array('label'=>'Fecha de Alta'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Mecanico.id')), null, sprintf(__('¿Está seguro de que quiere eliminar # %s?', true), $this->Form->value('Mecanico.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Mecánicos', true), array('action' => 'index'));?></li>
	</ul>
</div>
