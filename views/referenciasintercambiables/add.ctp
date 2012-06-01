<div class="referenciasintercambiables form">
<?php echo $this->Form->create('Referenciasintercambiable');?>
	<fieldset>
 		<legend><?php __('Añadir Referencias intercambiables'); ?></legend>
	<?php
		
		echo $ajax->autoComplete('articulo_id', '/referenciasintercambiables/autoComplete');
		echo $ajax->autoComplete('Articulo', '/referenciasintercambiables/autoComplete');
	?>

 
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Ref. intercambiables', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
