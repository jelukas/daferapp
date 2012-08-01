<div class="presupuestosclientes">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend>
            <?php __('Edit Presupuestoscliente'); ?>
            <?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $this->Form->value('Presupuestoscliente.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Presupuestoscliente.numero'))); ?>
            <?php echo $this->Html->link(__('Listar Presupuestos a Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <?php echo $this->Form->input('id'); ?>
        <table class="edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
                <td><span><?php __('Confirmado'); ?></span></td>
                <td><?php echo $this->Form->input('confirmado', array('label' => false)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente'); ?></span></td>
                <td colspan="2"><?php echo $this->Html->link($this->Form->value('Cliente.nombre'), array('controller' => 'clientes', 'action' => 'view', $this->Form->value('Cliente.id'))); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td colspan="2"><?php echo $this->Html->link($this->Form->value('Centrostrabajo.centrotrabajo'), array('controller' => 'centrostrabajos', 'action' => 'view', $this->Form->value('Centrostrabajo.id'))); ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td colspan="3"><?php echo $this->Html->link($this->Form->value('Maquina.nombre'), array('controller' => 'maquinas', 'action' => 'view', $this->Form->value('Maquina.id'))); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Mensaje'); ?></span></td>
                <td colspan="9"><?php echo $this->Form->input('mensajesinformativo_id', array('label' => false, 'empty' => '-- Sin Mensaje --')); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="7"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td><span><?php __('Avisar'); ?></span></td>
                <td><?php echo $this->Form->input('avisar', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Presupuesto Enviado Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha_enviado', array('label' => false, 'empty' => '--')); ?></td>
                <td><span><?php __('Tipo de IVA') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>