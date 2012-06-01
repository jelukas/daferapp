<div class="avisostalleres view">
    <h2><?php __('Aviso de Taller'); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('ID'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de aviso'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['fechaaviso']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Aviso telefónico'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['avisotelefonico']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Aviso por email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['avisoemail']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Estado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Estadosavisostallere']['estado']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link($avisostallere['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisostallere['Cliente']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Centro de trabajo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link($avisostallere['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisostallere['Centrostrabajo']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link($avisostallere['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisostallere['Maquina']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Serie Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Maquina']['serie_maquina']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Serie Motor'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Maquina']['serie_motor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Modelo Transmisión'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Maquina']['modelo_transmision']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Maquina']['horas']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Maquina']['observaciones']; ?>
            &nbsp;
        </dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Solicitar presupuesto'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['solicitaresupuesto']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Urgente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['marcarurgente']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Confirmado por'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['confirmadopor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Pendiente de confirmar'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['pendienteconfirmar']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de aceptacion'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['fechaaceptacion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Enviar a'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['enviara']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Descripción'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['descripcion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $avisostallere['Avisostallere']['observaciones']; ?>
            &nbsp;
        </dd>

    </dl>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Aviso de taller', true), array('action' => 'edit', $avisostallere['Avisostallere']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Aviso de taller', true), array('action' => 'delete', $avisostallere['Avisostallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $avisostallere['Avisostallere']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Avisos de taller', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Mapa Avisos de taller', true), array('action' => 'mapa')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Aviso de taller', true), array('action' => 'add')); ?> </li>
        <li style="margin-top: 50px"><?php echo $this->Html->link(__('Nuevo Presupueso a Cliente', true), array('controller'=>'presupuestosclientes','action' => 'add','avisostallere',$avisostallere['Avisostallere']['id'])); ?> </li>
        <li style="margin-top: 50px"><?php echo $this->Html->link(__('Nuevo Presupuesto de Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', -1, $avisostallere['Avisostallere']['id'], -1)); ?> </li>
<?php if ($numOrdenes == 0): ?>
            <li><?php echo '<h3>Órdenes de Taller</h3>'; ?></li>
            <li><?php echo $this->Html->link(__('Generar orden de taller', true), array('controller' => 'ordenes', 'action' => 'add', $avisostallere['Avisostallere']['id'])); ?> </li>
<?php endif; ?>
    </ul>
</div>

