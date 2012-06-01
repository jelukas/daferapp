<div class="presupuestosclientes form">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend><?php __('Add Presupuestoscliente'); ?></legend>
        <?php
        echo $this->Html->link('CLIENTE: '.$ordene['Avisostallere']['Cliente']['nombre'],array('controller'=>'clientes','action'=>'view',$ordene['Avisostallere']['Cliente']['id']));
        echo $this->Form->input('Presupuestoscliente.cliente_id',array('type'=>'hidden','value'=>$ordene['Avisostallere']['Cliente']['id']));
        echo $this->Form->input('Presupuestoscliente.comerciale_id');
        echo $this->Form->input('Presupuestoscliente.fecha');
        echo $this->Html->link('Almacen de los Materiales: '.$ordene['Almacene']['nombre'],array('controller'=>'almacenes','action'=>'view',$ordene['Almacene']['id']));
        echo $this->Form->input('Presupuestoscliente.almacene_id',array('type'=>'hidden','value'=>$ordene['Ordene']['almacene_id']));
        echo $this->Form->input('Presupuestoscliente.avisar');
        echo $this->Form->input('Presupuestoscliente.observaciones');
        echo $this->Form->input('Presupuestoscliente.tiposiva_id');
        echo $this->Form->input('Presupuestoscliente.ordene_id', array('type' => 'text', 'value' => $ordene['Ordene']['id'], 'readonly' => true));
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