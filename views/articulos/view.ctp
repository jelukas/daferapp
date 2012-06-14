<div class="articulos">
<h2>
    <?php  __('Ficha de Artículo Ref. '. $articulo['Articulo']['ref']);?>
    <?php echo $this->Html->link(__('Editar Articulo', true), array('action' => 'edit', $articulo['Articulo']['id']),array('class' => 'button_link')); ?>
</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Referencia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['ref']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Codigo de barras'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['codigobarras']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio (sin IVA)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['precio_sin_iva']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Familia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulo['Familia']['nombre'], array('controller' => 'familias', 'action' => 'view', $articulo['Familia']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Localización'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['localizacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Existencias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['existencias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Almacén'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulo['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $articulo['Almacene']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Proveedor habitual'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulo['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $articulo['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock mínimo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['stock_minimo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observaciones'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulo['Articulo']['observaciones']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ref. Intercambiables'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php foreach($articulo['Referenciasintercambiable'] as $referencia):?>
				<li><?php echo $this->Html->link($referencia['articulo_id'], array('controller' => 'articulos', 'action' => 'view', $referencia['articulo_id']));?></li>
			<?php endforeach;?>
			&nbsp;
		</dd>
		
	</dl>
</div>