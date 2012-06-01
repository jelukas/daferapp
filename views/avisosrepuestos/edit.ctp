<div class="avisosrepuestos form">
    <?php
    echo $crumb->getHtml();
    echo '<br /><br />';
    ?>
    <?php echo $this->Form->create('Avisosrepuesto'); ?>
    <fieldset>
        <legend><?php __('Editar Avisos de repuesto'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('numero');
        echo $this->Form->input('fechahora', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
        echo $this->Form->input('almacene_id', array('label' => 'Almacen de los Materiales'));
        echo $this->Form->input('avisotelefonico', array('label' => 'Aviso Telefónico'));
        echo $this->Form->input('avisoemail', array('label' => 'Aviso por email'));
        echo $this->Form->input('estadosaviso_id', array('label' => 'Estado', 'empty' => '--- Seleccione un estado ---'));
        echo $this->Form->input('cliente_id', array('label' => 'Cliente', 'empty' => '--- Seleccione un cliente ---'));
        echo $ajax->observeField('AvisosrepuestoClienteId', array(
            'frequency' => '1',
            'update' => 'CentrostrabajoSelectDiv',
            'url' => array(
                'controller' => 'centrostrabajos',
                'action' => 'selectAvisosrepuestos'
                ))
        );
        echo $this->Form->input('centrostrabajo_id', array(
            'label' => 'Centro de Trabajo',
            'div' => array(
                'id' => 'CentrostrabajoSelectDiv'
            ),
            'empty' => '--- Seleccione un centro de trabajo ---'));
        echo $ajax->observeField('AvisosrepuestoCentrostrabajoId', array(
            'frequency' => '1',
            'update' => 'MaquinaSelectDiv',
            'url' => array(
                'controller' => 'maquinas',
                'action' => 'selectAvisosrepuestos'
                ))
        );

        echo $this->Form->input('maquina_id', array(
            'label' => 'Máquina',
            'empty' => '--- Seleccione una máquina ---',
            'div' => array(
                'id' => 'MaquinaSelectDiv'
            )
        ));
        echo $this->Form->input('solicitapresupuesto', array('label' => 'Solicitar presupuesto'));
        echo $this->Form->input('marcarurgente', array('label' => 'Urgente'));
        echo $this->Form->input('confirmadopor', array('label' => 'Confirmado por:'));
        echo $this->Form->input('pendienteconfirmar', array('label' => 'Pendiente de confirmar'));
        echo $this->Form->input('fechaaceptacion', array('label' => 'Fecha de aceptación', 'dateFormat' => 'DMY'));
        echo $this->Form->input('enviara', array('label' => 'Enviar a:'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('descripcion', array('label' => 'Descripción'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte escaneado'));
        ?>
    </fieldset>
    <div style="clear:both;"><hr/></div>
    <div class="actions" >
        <ul>
            <li><?php echo $this->Html->link(__('Nuevo Presupuesto Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $this->Form->value('Avisosrepuesto.id'))) ?></li>
            <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Cliente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $this->Form->value('Avisosrepuesto.id'))) ?></li>
            <li><?php echo $this->Html->link(__('Nuevo Albaran a Cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add','avisosrepuesto', $this->Form->value('Avisosrepuesto.id'))) ?></li>
        </ul>
    </div>
<?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Avisosrepuesto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Avisosrepuesto.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Ver Aviso de repuesto', true), array('action' => 'view', $this->Form->value('Avisosrepuesto.id'))); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Avisos de repuesto', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Aviso de repuesto', true), array('action' => 'add')); ?> </li>
        <br><br>
        <li><?php echo '<h3>Compras</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $this->Form->value('Avisosrepuesto.id'))); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $this->Form->value('Avisosrepuesto.id'))); ?> </li>
        <br><br>
        <li><?php echo '<h3>Ventas</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto a clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisosrepuesto', $this->Form->value('Avisosrepuesto.id'))); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido de cliente', true), array('controller' => 'pedidosclientes', 'action' => 'add', 'avisosrepuesto', $this->Form->value('Avisosrepuesto.id'))); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Albaran a Cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add','avisosrepuesto', $this->Form->value('Avisosrepuesto.id'))) ?></li>
        <br><br>
        <li><?php echo '<h3>Maestros</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
    </ul>
</div>