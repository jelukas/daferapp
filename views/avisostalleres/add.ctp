<?php setlocale(LC_TIME, "es_ES"); ?>

<?php $this->Html->script('prototype', array('inline' => false)); ?>

<div class="avisostalleres form">
    <?php echo $this->Form->create('Avisostallere'); ?>
    <fieldset>
        <legend><?php __('Nuevo Aviso de Taller'); ?></legend>
        <?php
        echo $this->Form->input('fechaaviso', array('label' => 'Fecha y hora aviso', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
        echo $this->Form->input('avisotelefonico', array('label' => 'Aviso Telefónico'));
        echo $this->Form->input('avisoemail', array('label' => 'Aviso E-Mail'));
         echo $this->Form->input('estadosavisostallere_id', array('label'=>'Estado','default'=>'1'));
        echo $this->Form->input('cliente_id', array('label' => 'Cliente', 'empty' => '--- Seleccione un cliente ---', 'options' => $clientes));
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
        echo $this->Form->input('solicitaresupuesto', array('label' => 'Solicita Presupuesto'));
        echo $this->Form->input('marcarurgente', array('label' => 'Marcar como URGENTE'));
        echo $this->Form->input('confirmadopor', array('label' => 'Confirmado por:'));
        echo $this->Form->input('pendienteconfirmar', array('label' => 'Pendiente confirmar por el cliente'));
        echo $this->Form->input('fechaaceptacion', array('label' => 'Fecha de Aceptación', 'dateFormat' => 'DMY' ));
        echo $this->Form->input('enviara', array('label' => 'Enviar a:'));
     
        echo $this->Form->input('descripcion', array('label' => 'Descripción proporcionada por el cliente:'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones:'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Avisos de Taller', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        
    </ul>
</div>
