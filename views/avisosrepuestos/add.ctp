<div class="avisosrepuestos form">
    <?php
    echo $crumb->getHtml();
    echo '<br /><br />';
    ?>
    <?php echo $this->Form->create('Avisosrepuesto'); ?>
    <fieldset>
        <legend><?php __('Añadir Aviso de repuesto'); ?></legend>
        <?php
        echo $this->Form->input('fechahora', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
        echo $this->Form->input('almacene_id', array('label' => 'Almacen de los Materiales'));
        echo $this->Form->input('avisotelefonico', array('label' => 'Aviso Telefónico'));
        echo $this->Form->input('avisoemail', array('label' => 'Aviso por email'));
        echo $this->Form->input('estadosaviso_id', array('label' => 'Estado', 'default' => '1'));
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
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Avisos de repuestos', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Máquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
    </ul>
</div>