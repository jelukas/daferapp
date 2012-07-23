<div class="mecanicos form">
<?php echo $this->Form->create('Mecanico');?>
	<fieldset>
 		<legend><?php __('Añadir Mecánico'); ?></legend>
	<?php
		echo $this->Form->input('dni',array('label'=>'DNI'));
		echo $this->Form->input('nombre',array('label'=>'Nombre y Apellidos'));
		echo $this->Form->input('fechaalta',array('label'=>'Fecha de Alta'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Mecánicos', true), array('action' => 'index'));?></li>
	</ul>
</div>
