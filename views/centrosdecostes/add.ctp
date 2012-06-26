<div class="centrosdecostes">
    <?php echo $this->Form->create('Centrosdecoste'); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Centro de Coste'); ?>
            <?php echo $this->Html->link(__('Listar Centros de Coste', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><?php echo $this->Form->input('denominacion'); ?></td>
                <td><?php echo $this->Form->input('codigo'); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>