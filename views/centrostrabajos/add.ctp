<div class="centrostrabajos form">
<?php echo $this->Form->create('Centrostrabajo');?>
	<fieldset>
 		<legend><?php __('Añadir Centro de Trabajo'); ?></legend>
	<?php
		echo $this->Form->input('centrotrabajo',array('label'=>'Centro de Trabajo'));
		echo $this->Form->input('direccion',array('label'=>'Dirección'));
		echo $this->Form->input('poblacion',array('label'=>'Población'));
		echo $this->Form->input('provincia',array('label'=>'Provincia'));
		echo $this->Form->input('cp',array('label'=>'Código Postal'));
		echo $this->Form->input('telefono',array('label'=>'Teléfono'));
		echo $this->Form->input('cliente_id',array('label'=>'Cliente','empty' => '(Seleccione un cliente)'));
		echo $this->Form->input('preciodesplazamiento',array('label'=>'Precio desplazamiento'));
		echo $this->Form->input('kilometraje',array('label'=>'Kilometraje'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
