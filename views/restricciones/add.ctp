<div class="restricciones form">
<?php echo $this->Form->create('Restriccione');?>
	<fieldset>
 		<legend><?php __('Añadir Restricción'); ?></legend>
	<?php
		echo $this->Form->input('role_id',array('label' => 'Rol'));
		echo $this->Form->label('Modelo');
		$listamodelos = array();
		foreach($modelos as $modelo)
		{
			$listamodelos[$modelo]=$modelo;
		}
		echo $this->Form->select('modelo', $listamodelos);
		echo $this->Form->label('Acción');			
		$options = array('add' => 'Añadir', 'edit' => 'Editar', 'delete' => 'Eliminar', 'view' => 'Ver', 'index' => 'Listar');
		echo $this->Form->select('accion', $options)
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Restricciones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
