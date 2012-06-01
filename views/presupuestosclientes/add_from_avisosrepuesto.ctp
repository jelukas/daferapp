<div class="presupuestosclientes form">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend><?php __('Add Presupuestoscliente'); ?></legend>
        <?php
        echo $this->Html->link('CLIENTE: '.$avisosrepuesto['Cliente']['nombre'],array('controller'=>'clientes','action'=>'view',$avisosrepuesto['Cliente']['id']));
        echo $this->Form->input('Presupuestoscliente.cliente_id',array('type'=>'hidden','value'=>$avisosrepuesto['Avisosrepuesto']['cliente_id']));
        echo $this->Form->input('Presupuestoscliente.comerciale_id');
        echo $this->Form->input('Presupuestoscliente.fecha');
        echo $this->Html->link('Almacen de los Materiales: '.$avisosrepuesto['Almacene']['nombre'],array('controller'=>'almacenes','action'=>'view',$avisosrepuesto['Almacene']['id']));
        echo $this->Form->input('Presupuestoscliente.almacene_id',array('type'=>'hidden','value'=>$avisosrepuesto['Avisosrepuesto']['almacene_id']));
        echo $this->Form->input('Presupuestoscliente.avisar');
        echo $this->Form->input('Presupuestoscliente.observaciones');
        echo $this->Form->input('Presupuestoscliente.tiposiva_id');
        echo $this->Form->input('Presupuestoscliente.avisosrepuesto_id', array('type' => 'text', 'value' => $avisosrepuesto['Avisosrepuesto']['id'], 'readonly' => true));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Presupuestos a clientes', true), array('action' => 'index')); ?></li>
    </ul>
</div>