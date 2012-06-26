<div class="tiposivas">
    <?php echo $this->Form->create('Tiposiva'); ?>
    <?php echo $this->Form->input('id'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Tipo de iva'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Tiposiva.id')), array('class' => 'button_link')); ?> 
            <?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar Tipo de iva', true), array('action' => 'delete', $this->Form->value('Tiposiva.id')), array('class' => 'button_link'), sprintf(__('Seguro que quieres borrar el tipo de IVA # %s?', true), $this->Form->value('Tiposiva.tipoiva'))); ?> 
        </legend>
        <table class="edit">
            <tr>
                <td><span><?php __('Denominación'); ?></span></td>
                <td><?php echo $this->Form->input('tipoiva', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Porcentaje Aplicable'); ?></span><span style="float: right">&percnt;</span></td>
                <td><?php echo $this->Form->input('porcentaje_aplicable', array('label' => false)); ?></td>
            </tr>
        </table>      
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>