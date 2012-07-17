<div class="albaranesclientesreparaciones view">
<h2><?php  __('Albaranesclientesreparacione');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observaciones'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['observaciones']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Albaranescaneado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Facturable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['facturable']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tiposiva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $albaranesclientesreparacione['Tiposiva']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ordene'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $albaranesclientesreparacione['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Almacene'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $albaranesclientesreparacione['Almacene']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Facturas Cliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['FacturasCliente']['id'], array('controller' => 'facturas_clientes', 'action' => 'view', $albaranesclientesreparacione['FacturasCliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Es Devolucion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['es_devolucion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comerciale'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $albaranesclientesreparacione['Comerciale']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Centrosdecoste'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albaranesclientesreparacione['Centrosdecoste']['denominacion'], array('controller' => 'centrosdecostes', 'action' => 'view', $albaranesclientesreparacione['Centrosdecoste']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Albaranesclientesreparacione', true), array('action' => 'edit', $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Albaranesclientesreparacione', true), array('action' => 'delete', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albaranesclientesreparaciones', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranesclientesreparacione', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposivas', true), array('controller' => 'tiposivas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposiva', true), array('controller' => 'tiposivas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturas Clientes', true), array('controller' => 'facturas_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturas Cliente', true), array('controller' => 'facturas_clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comerciales', true), array('controller' => 'comerciales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comerciale', true), array('controller' => 'comerciales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Centrosdecostes', true), array('controller' => 'centrosdecostes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrosdecoste', true), array('controller' => 'centrosdecostes', 'action' => 'add')); ?> </li>
	</ul>
</div>
