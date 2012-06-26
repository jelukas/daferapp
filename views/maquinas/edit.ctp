<div class="maquinas">
    <?php echo $this->Form->create('Maquina'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Máquina'); ?>
            <?php echo $this->Html->link(__('Ver ', true), array('action' => 'view', $maquina['Maquina']['id']), array('class' => 'button_link')); ?>		
            <?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $maquina['Maquina']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true),$maquina['Maquina']['nombre'])); ?>		
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>		
            <?php echo $this->Html->link(__('Nueva Máquina', true), array('action' => 'add'), array('class' => 'button_link')); ?>	
        </legend>
        <?php echo $this->Form->input('id'); ?>
        <table class="edit">
            <tr>
                <td><span>Código Máquina</span></td>
                <td><?php echo $this->Form->input('codigo', array('label' => false)); ?></td>
                <td><span>Cliente</span></td>
                <td><?php echo $this->Html->link($maquina['Centrostrabajo']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $maquina['Centrostrabajo']['Cliente']['id'])); ?></td>
                <td><span>Centro de Trabajo</span></td>
                <td><?php echo $this->Form->input('centrostrabajo_id', array('label' => false, 'empty' => '--Seleccione un centro de trabajo--')); ?></td>
            </tr>
            <tr>
                <td><span>Modelo</span></td>
                <td><?php echo $this->Form->input('nombre', array('label' => false)); ?></td>
                <td><span>Observaciones</span></td>
                <td colspan="3"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Serie Máquina</span></td>
                <td><?php echo $this->Form->input('serie_maquina', array('label' => false)); ?></td>
                <td><span>Modelo Motor</span></td>
                <td><?php echo $this->Form->input('modelo_motor', array('label' => false)); ?></td>
                <td><span>Serie Motor</span></td>
                <td><?php echo $this->Form->input('serie_motor', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Modelo Transmisión</span></td>
                <td><?php echo $this->Form->input('modelo_transmision', array('label' => false)); ?></td>
                <td><span>Serie Transmisión</span></td>
                <td><?php echo $this->Form->input('serie_transmision', array('label' => false)); ?></td>
                <td><span>Año Fabricación</span></td>
                <td><?php echo $this->Form->input('anio_fabricacion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Horas de la Máquina</span></td>
                <td><?php echo $this->Form->input('horas', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>