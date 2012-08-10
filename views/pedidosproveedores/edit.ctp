<div class="pedidosproveedores">
    <h2>
        <?php __('Pedido a proveedor Nº ' . $this->Form->value('Pedidosproveedore.numero')); ?>
        <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Pedidosproveedore.id')), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Pedido de proveedores', true), array('action' => 'delete', $this->Form->value('Pedidosproveedore.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pedidosproveedore.numero'))); ?>
    </h2> 
    <?php echo $this->Form->create('Pedidosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <table class="view">
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('id'); ?>
                    <?php echo $this->Form->input('numero'); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('estadospedidosproveedore_id',array('label' => 'Estado')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('fecha'); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('confirmado'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Pedido escaneado Actual: <?php echo $this->Html->link(__($this->Form->value('Pedidosproveedore.pedidoescaneado'), true), '/files/pedidosproveedore/' . $this->Form->value('Pedidosproveedore.pedidoescaneado')); ?>
                    <?php echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Documento Escaneado Actual', 'hiddenField' => false)); ?>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedidos escaneado')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fecharecepcion', array('label' => 'Fecha de Recepcion')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('transportista_id', array('label' => 'Transportista')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('numero_expedicion', array('label' => 'Nº Expedición')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('tipo_envio', array('label' => 'Tipo de Envio')); ?>
                </td>
            </tr>
        </table>  
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Nuevo Albaran a proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'add', $this->Form->value('Pedidosproveedore.id')), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
    </div>
</div>