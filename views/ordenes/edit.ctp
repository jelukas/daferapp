<div class="ordenes form">
<?php echo $this->Form->create('Ordene');?>
	<fieldset>
 		<legend><?php __('Editar Orden'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('urgente',array('label'=>'Urgente'));
                echo $this->Form->input('fecha_prevista_reparacion',array('label'=>'Fecha prevista de reparación','dateFormat'=>'DMY'));
		echo $this->Form->input('almacene_id',array('label'=>'Almacen de los Materiales'));
		echo $this->Form->input('estadosordene_id',array('label'=>'Estado'));
                echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Ordene.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Ordene.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ordenes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Avisos de Taller', true), array('controller' => 'avisostalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Aviso de Taller', true), array('controller' => 'avisostalleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Presupuestos a Cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add','ordene',$this->Form->value('Ordene.id'))); ?> </li>
	</ul>
</div>
