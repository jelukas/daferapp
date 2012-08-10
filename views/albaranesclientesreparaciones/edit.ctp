<div class="albaranesclientesreparaciones">
    <?php echo $this->Form->create('Albaranesclientesreparacione', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editando Albarán de Reparación Nº ' . $this->Form->value('Albaranesclientesreparacione.numero')); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Albaranesclientesreparacione.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Albaranesclientesreparacione.id')), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el Albaran de Reparación Nº # %s?', true), $this->Form->value('Albaranesclientesreparacione.numero'))); ?>
            <?php echo $this->Html->link(__('Listar Albaranes de Reparación', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <?php echo $this->Form->input('id'); ?>
        <table class="view edit">
            <tr>
                <td colspan="6"></td>
                <td><span>Estado</span></td>
                <td><?php echo $this->Form->input('estadosalbaranesclientesreparacione_id', array('label' => false));?></td>
            </tr>
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente') ?></span></td>
                <td><?php echo $this->Html->link($this->Form->value('Cliente.nombre'), array('controller' => 'clientes', 'action' => 'view', $this->Form->value('Albaranesclientesreparacione.cliente_id'))); ?></td>
                <td><span><?php __('Centro de Trabajo') ?></span></td>
                <td><?php echo $this->Html->link($this->Form->value('Centrostrabajo.centrotrabajo'), array('controller' => 'centrostrabajos', 'action' => 'view', $this->Form->value('Albaranesclientesreparacione.centrostrabajo_id'))); ?></td>
                <td><span><?php __('Maquina') ?></span></td>
                <td><?php echo $this->Html->link($this->Form->value('Maquina.nombre'), array('controller' => 'maquinas', 'action' => 'view', $this->Form->value('Albaranesclientesreparacione.maquina_id'))); ?></td>
                <td><span><?php __('Forma de Pago') ?></span></td>
                <td><?php echo $this->Form->value('Cliente.Formapago.nombre'); ?></td>
            </tr>
            <tr>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td><?php echo $this->Html->link($this->Form->value('Ordene.numero'), array('controller' => 'ordenes', 'action' => 'view', $this->Form->value('Albaranesclientesreparacione.ordene_id'))); ?></td>
                <td colspan="3"><span><?php __('Número Aceptación Aportado por el Cliente') ?></span></td>
                <td><?php echo $this->Form->input('numero_aceptacion_aportado', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Albarán de Reparación Escaneado'); ?></span></td>
                <td colspan="5">
                    <?php
                    echo 'Albaran Escaneado Actual: ' . $this->Html->link(__($this->Form->value('Albaranesclientesreparacione.albaranescaneado'), true), '/files/albaranesclientesreparacione/' . $this->Form->value('Albaranesclientesreparacione.albaranescaneado'));
                    echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Albaran Escaneado Actual', 'hiddenField' => false));
                    echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albaran Escaneado'));
                    ?>
                </td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Centro de Coste') ?></span></td>
                <td><?php echo $this->Form->input('centrosdecoste_id', array('label' => false)); ?></td>
                <td><span><?php __('Tipo de IVA') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)); ?></td>
                <td><span><?php __('Facturable'); ?></span></td>
                <td><?php echo $this->Form->input('facturable', array('label' => false)); ?></td>
                <td><span><?php __('Es devolución') ?></span></td>
                <td><?php echo $this->Form->input('es_devolucion', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>