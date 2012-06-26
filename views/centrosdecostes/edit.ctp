<div class="centrosdecostes">
    <?php echo $this->Form->create('Centrosdecoste'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Centro de Coste'); ?>
            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Centrosdecoste.id')), array('class' => 'button_link'), sprintf(__('Seguro que quieres eliminar el Centro de Coste # %s?', true), $this->Form->value('Centrosdecoste.denominacion'))); ?>
            <?php echo $this->Html->link(__('Listar Centros de Coste', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <?php echo $this->Form->input('id');?>
        <table class="edit">
            <tr>
                <td><?php echo $this->Form->input('denominacion') ?></td>
                <td><?php echo $this->Form->input('codigo'); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>