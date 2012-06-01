<div class="tareaspresupuestoclientesOtrosservicios view">
<h2><?php  __('Tareaspresupuestoclientes Otrosservicio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspresupuestocliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareaspresupuestoclientesOtrosservicio['Tareaspresupuestocliente']['asunto'], array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $tareaspresupuestoclientesOtrosservicio['Tareaspresupuestocliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['desplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Manoobradesplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['manoobradesplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometraje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['kilometraje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['dietas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Varios'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['varios']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareaspresupuestoclientes Otrosservicio', true), array('action' => 'edit', $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareaspresupuestoclientes Otrosservicio', true), array('action' => 'delete', $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes Otrosservicios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestoclientes Otrosservicio', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
