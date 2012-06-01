<div class="presupuestosclientes form">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend><?php __('Edit Presupuestoscliente'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('comerciale_id');
        echo $this->Form->input('fecha');
        echo $this->Form->input('avisar');
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('almacene_id',array('disabled'=>true));
        echo $this->Form->input('observaciones');
        echo $this->Form->input('avisosrepuesto_id', array('empty' => '(Sin Aviso de Repuesto)'));
        echo $this->Form->input('ordene_id', array('empty' => '(Sin Orden)'));
        echo $this->Form->input('avisostallere_id', array('empty' => '(Sin Aviso de Taller)'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Presupuestoscliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Presupuestoscliente.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Presupuestosclientes', true), array('action' => 'index')); ?></li>
    </ul>
</div>