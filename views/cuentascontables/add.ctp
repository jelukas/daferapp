<div class="cuentascontables">
    <?php echo $this->Form->create('Cuentascontable'); ?>
    <fieldset>
        <legend>
            <?php __('Nueva Cuenta Contable '); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'),array('class'=>'button_link')); ?>
        </legend>
        <table class="view edit">
            <tr>
                <td class="required"><span>Código</span></td>
                <td><?php echo $this->Form->input('codigo',array('label' => False)); ?></td>
                <td  class="required"><span>Nombre</span></td>
                <td><?php echo $this->Form->input('nombre',array('label' => False)); ?></td>
            </tr>
            <tr>
                <td><span>Nombre de Cuenta Abierta</span></td>
                <td><?php echo $this->Form->input('nombre_cuenta_abierta',array('label' => False)); ?></td>
                <td><span>Nombre de Cuenta Externa</span></td>
                <td><?php echo $this->Form->input('nombre_cuenta_externa',array('label' => False)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>