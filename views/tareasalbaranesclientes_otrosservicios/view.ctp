<div class="tareasalbaranesclientesOtrosservicios view">
<h2><?php  __('Tareasalbaranesclientes Otrosservicio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareasalbaranescliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasalbaranesclientesOtrosservicio['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $tareasalbaranesclientesOtrosservicio['Tareasalbaranescliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['desplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Manoobradesplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['manoobradesplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometraje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['kilometraje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['dietas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Varios'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['varios']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareasalbaranesclientes Otrosservicio', true), array('action' => 'edit', $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareasalbaranesclientes Otrosservicio', true), array('action' => 'delete', $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes Otrosservicios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranesclientes Otrosservicio', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
