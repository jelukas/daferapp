<div class="mecanicos">
    <?php echo $this->Form->create('Mecanico'); ?>
    <fieldset>
        <legend>
            <?php __('Añadir Mecánico'); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'),array('class'=>'button_link')); ?>
        </legend>
        <table class="view edit">
            <tr>
                <td><?php echo $this->Form->input('nombre', array('label' => 'Nombre y Apellidos',)); ?></td>
                <td><?php echo $this->Form->input('dni', array('label' => 'DNI')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('fechaalta', array('label' => 'Fecha de Alta','dateFormat' => 'DMY')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar', true)); ?>
</div>