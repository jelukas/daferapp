<div class="formapagos">
    <?php echo $this->Form->create('Formapago'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Forma de pago'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'index', $this->Form->value('Formapago.id')),array('class'=>'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Formapago.id')),array('class'=>'button_link'), sprintf(__('¿ Seguro que quieres borrar la forma de pago # %s?', true), $this->Form->value('Formapago.nombre'))); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'),array('class'=>'button_link')); ?>
        </legend>
        <?php
        echo $this->Form->input('id');
        ?>
        <table class="view edit">
            <tr>
                <td colspan="3"><?php echo $this->Form->input('nombre'); ?></td>
            </tr>
            <tr>
                <td><p><span style="padding-bottom: 5px;">Tipo de Pago</span></p>
                    <?php
                    $options = array('efectivo' => 'Efectivo', 'contado' => 'Contado', 'talon' => 'Talón', 'pagare' => 'Pagare', 'transferencia' => 'Transferencia', 'giro' => 'Giro', 'recibo' => 'Recibo', 'confirming' => 'Confirming', 'efecto' => 'Efecto');
                    $attributes = array('legend' => false);
                    echo $this->Form->radio('Formapago.tipodepago', $options, $attributes);
                    ?>
                </td>
                <td><?php echo$this->Form->input('numero_vencimientos'); ?></td>
                <td><?php echo$this->Form->input('dias_entre_vencimiento'); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $this->Form->input('dia_mes_fijo_vencimiento'); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $this->Form->input('proveedore_id', array('empty' => '-- Ninguno --', 'class' => 'chzn-select')); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $this->Form->input('cliente_id', array('empty' => '-- Ninguno --', 'class' => 'chzn-select')); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>