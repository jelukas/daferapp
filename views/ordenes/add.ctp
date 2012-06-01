<div class="ordenes form">
<?php echo $this->Form->create('Ordene');?>
	<fieldset>
 		<legend><?php __('Añadir Orden'); ?></legend>
	<?php
                if(!empty($avisotaller))
                {
                    echo $this->Form->label('Nº Aviso de taller');
                    echo $avisotaller['Avisostallere']['id'].'<br><br>';
                    echo '<input type="hidden" value="'.$avisotaller['Avisostallere']['id'].'" name="idAvisoTaller"/>';
                    echo $this->Form->label('Cliente');
                    echo $avisotaller['Cliente']['nombre'].'<br><br>';
                    echo $this->Form->label('Centro de Trabajo');
                    echo $avisotaller['Centrostrabajo']['centrotrabajo'].'<br><br>';
                    echo $this->Form->label('Máquina');
                    echo $avisotaller['Maquina']['nombre'];
                }?>
		<br/><br/>	
		<?php
		echo $this->Form->input('urgente',array('label'=>'Urgente'));
		echo $this->Form->input('almacene_id',array('label'=>'Almacen de los Materiales'));
		echo $this->Form->input('fecha_prevista_reparacion',array('label'=>'Fecha prevista de reparación','dateFormat'=>'DMY'));
		echo $this->Form->input('estadosordene_id',array('label'=>'Estado'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Ordenes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Avisos de Taller', true), array('controller' => 'avisostalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Aviso de Taller', true), array('controller' => 'avisostalleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
