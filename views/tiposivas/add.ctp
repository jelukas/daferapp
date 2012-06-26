<div class="tiposivas">
    <?php echo $this->Form->create('Tiposiva'); ?>
    <fieldset>
        <legend>
            <?php __('Crear Tipo de iva'); ?>
            <?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index'), array('class' => 'button_link')); ?>
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