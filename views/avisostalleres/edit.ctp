<div class="avisostalleres form">
    <?php echo $this->Form->create('Avisostallere'); ?>
    <fieldset>
        <legend><?php __('Editar Aviso de Taller'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fechaaviso', array('label' => 'Fecha y hora aviso', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
        echo $this->Form->input('avisotelefonico', array('label' => 'Aviso Telefónico'));
        echo $this->Form->input('avisoemail', array('label' => 'Aviso E-mail'));
        echo $this->Form->input('estadosavisostallere_id', array('label' => 'Estado', 'empty' => '--- Seleccione un estado ---'));
        echo $this->Form->input('cliente_id', array('label' => 'Cliente'));
        echo $ajax->observeField('AvisostallereClienteId', array(
            'frequency' => '1',
            'update' => 'CentrostrabajoSelectDiv',
            'url' => array(
                'controller' => 'centrostrabajos',
                'action' => 'selectAvisostalleres'
                ))
        );
        echo $this->Form->input('centrostrabajo_id', array(
            'label' => 'Centro de Trabajo',
            'div' => array(
                'id' => 'CentrostrabajoSelectDiv'
            ),
            'empty' => '--- Seleccione un centro de trabajo ---'));
        echo $ajax->observeField('AvisostallereCentrostrabajoId', array(
            'frequency' => '1',
            'update' => 'MaquinaSelectDiv',
            'url' => array(
                'controller' => 'maquinas',
                'action' => 'selectAvisostalleres'
                ))
        );

        echo $this->Form->input('maquina_id', array(
            'label' => 'Máquina',
            'empty' => '--- Seleccione una máquina ---',
            'div' => array(
                'id' => 'MaquinaSelectDiv'
            )
        ));
        //echo $this->Form->input('centrostrabajo_id', array('label' => 'Centro de Trabajo'));
        //echo $this->Form->input('maquina_id', array('label' => 'Máquina'));

        echo $this->Form->input('solicitaresupuesto', array('label' => 'Solicita presupuesto'));
        echo $this->Form->input('marcarurgente', array('label' => 'Marcar como urgente'));
        echo $this->Form->input('confirmadopor', array('label' => 'Confirmado por:'));
        echo $this->Form->input('pendienteconfirmar', array('label' => 'Pendiente de confirmar'));
        echo $this->Form->input('fechaaceptacion', array('label' => 'Fecha de aceptación'));
        echo $this->Form->input('enviara', array('label' => 'Enviar a:'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('descripcion', array('label' => 'Descripción proporcionada por el cliente:'));
        //echo $this->Form->input('Articulo');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Avisostallere.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Avisostallere.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Avisos de taller', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Máquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        <li style="margin-top: 50px"><?php echo $this->Html->link(__('Nuevo Presupueso a Cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisostallere', $this->Form->value('Avisostallere.id'))); ?> </li>
        <li style="margin-top: 50px"><?php echo $this->Html->link(__('Nuevo Presupuesto de Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', -1, $this->Form->value('Avisostallere.id'), -1)); ?> </li>
    </ul>
</div>