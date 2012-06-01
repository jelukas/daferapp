<div class="maquinas form">
<?php echo $this->Form->create('Maquina');?>
	<fieldset>
 		<legend><?php __('Editar Máquina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre',array('label'=>'Nombre'));
		echo $this->Form->input('serie_maquina',array('label'=>'Nº Serie Máquina'));
		echo $this->Form->input('serie_motor',array('label'=>'Nº Serie Motor'));
		echo $this->Form->input('modelo_transmision',array('label'=>'Modelo Transmisión'));
		echo $this->Form->input('serie_transmision',array('label'=>'Nº Serie Transmisión'));
		echo $this->Form->input('horas',array('label'=>'Horas'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
		echo $this->Form->input('centrostrabajo_id',array('label'=>'Centro de Trabajo','empty'=>'--Seleccione un centro de trabajo--'));
		echo $this->Form->input('cliente_id',array('label'=>'Cliente','empty'=>'--Seleccione un cliente--'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Maquina.id')), null, sprintf(__('¿Está seguro que desea eliminar # %s?', true), $this->Form->value('Maquina.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Máquinas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
