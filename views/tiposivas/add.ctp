<div class="tiposivas form">
<?php echo $this->Form->create('Tiposiva');?>
	<fieldset>
 		<legend><?php __('Añadir Tipo de iva'); ?></legend>
	<?php
		echo $this->Form->input('tipoiva',array('label'=>'Tipo de iva'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index'));?></li>
	</ul>
</div>