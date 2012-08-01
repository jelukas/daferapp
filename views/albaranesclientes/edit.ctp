<div class="albaranesclientes form">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Albaran de Cliente'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fecha');
        echo $this->Form->input('numero');
        echo '<div class="input select"><label for="AlbaranesclienteClienteId">Cliente</label>'.$this->Form->value('Cliente.nombre').'</div>';
        echo '<div class="input select"><label for="AlbaranesclienteCentrostrabajoId">Centro de Trabajo</label>'.$this->Form->value('Centrostrabajo.centrotrabajo').'</div>';
        echo '<div class="input select"><label for="AlbaranesclienteMaquinaId">Maquina</label>'.$this->Form->value('Maquina.nombre').'</div>';
        echo $this->Form->input('observaciones');
        echo $this->Html->link(__('Albaran Escaneado Actual: ' . $this->Form->value('Albaranescliente.albaranescaneado'), true), '/files/albaranescliente/' . $this->Form->value('Albaranescliente.albaranescaneado'));
        echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Albaran Escaneado Actual', 'hiddenField' => false));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albaran Escaneado'));
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('centrosdecoste_id');
        echo $this->Form->input('facturable');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $this->Form->value('Albaranescliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Albaranescliente.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Albaranes de Clientes', true), array('action' => 'index')); ?></li>
    </ul>
</div>