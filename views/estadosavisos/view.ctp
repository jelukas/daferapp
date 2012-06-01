<div class="estadosavisos view">
<h2><?php  __('Estadosaviso');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosaviso['Estadosaviso']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosaviso['Estadosaviso']['estado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estadosaviso', true), array('action' => 'edit', $estadosaviso['Estadosaviso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Estadosaviso', true), array('action' => 'delete', $estadosaviso['Estadosaviso']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $estadosaviso['Estadosaviso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estadosavisos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estadosaviso', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Avisosrepuestos');?></h3>
	<?php if (!empty($estadosaviso['Avisosrepuesto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Fechahora'); ?></th>
		<th><?php __('Avisotelefonico'); ?></th>
		<th><?php __('Avisoemail'); ?></th>
		<th><?php __('Cliente Id'); ?></th>
		<th><?php __('Centrostrabajo Id'); ?></th>
		<th><?php __('Maquina Id'); ?></th>
		<th><?php __('Solicitapresupuesto'); ?></th>
		<th><?php __('Marcarurgente'); ?></th>
		<th><?php __('Confirmadopor'); ?></th>
		<th><?php __('Pendienteconfirmar'); ?></th>
		<th><?php __('Fechaaceptacion'); ?></th>
		<th><?php __('Enviara'); ?></th>
		<th><?php __('Observaciones'); ?></th>
		<th><?php __('Descripcion'); ?></th>
		<th><?php __('Estadosaviso Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($estadosaviso['Avisosrepuesto'] as $avisosrepuesto):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $avisosrepuesto['id'];?></td>
			<td><?php echo $avisosrepuesto['fechahora'];?></td>
			<td><?php echo $avisosrepuesto['avisotelefonico'];?></td>
			<td><?php echo $avisosrepuesto['avisoemail'];?></td>
			<td><?php echo $avisosrepuesto['cliente_id'];?></td>
			<td><?php echo $avisosrepuesto['centrostrabajo_id'];?></td>
			<td><?php echo $avisosrepuesto['maquina_id'];?></td>
			<td><?php echo $avisosrepuesto['solicitapresupuesto'];?></td>
			<td><?php echo $avisosrepuesto['marcarurgente'];?></td>
			<td><?php echo $avisosrepuesto['confirmadopor'];?></td>
			<td><?php echo $avisosrepuesto['pendienteconfirmar'];?></td>
			<td><?php echo $avisosrepuesto['fechaaceptacion'];?></td>
			<td><?php echo $avisosrepuesto['enviara'];?></td>
			<td><?php echo $avisosrepuesto['observaciones'];?></td>
			<td><?php echo $avisosrepuesto['descripcion'];?></td>
			<td><?php echo $avisosrepuesto['estadosaviso_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'avisosrepuestos', 'action' => 'view', $avisosrepuesto['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'avisosrepuestos', 'action' => 'edit', $avisosrepuesto['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'avisosrepuestos', 'action' => 'delete', $avisosrepuesto['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $avisosrepuesto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
