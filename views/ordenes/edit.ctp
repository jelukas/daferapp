<div class="ordenes">
    <?php echo $this->Form->create('Ordene'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Orden Nº ' . $this->Form->value('Ordene.numero')); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Ordene.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Listar Ordenes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="view">
            <tr>
                <td colspan="3" style="font-size: 120%;">
                    <span>Número</span>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('numero', array('label' => false));
                    ?>
                </td>
                <td>
                    <span>Aviso de Taller</span>
                    <?php echo $this->Form->value('Avisostallere.numero'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Fecha</span>
                    <?php echo $this->Form->input('fecha', array('label' => false)); ?>
                </td>
                <td colspan="2">
                    <span>Estado</span>
                    <?php echo $this->Form->input('estadosordene_id', array('label' => false)); ?>
                </td>
                <td>
                    <span>Reparación Prevista</span>
                    <?php echo $this->Form->input('fecha_prevista_reparacion', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span>Fecha de Aceptación del Aviso</span>
                    <?php echo $this->Form->value('Avisostallere.fechaaceptacion') ?>
                </td>
                <td colspan="2">
                    <span>Urgente</span>
                    <?php echo $this->Form->input('urgente', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Cliente</span>
                    <?php echo $this->Form->value('Avisostallere.Cliente.nombre') ?>
                </td>
                <td>
                    <span>Centro</span>
                    <?php echo $this->Form->value('Avisostallere.Centrostrabajo.centrotrabajo') ?>
                </td>
                <td>
                    <p>
                        <span>Máquina</span>
                        <?php echo $this->Form->value('Avisostallere.Maquina.nombre') ?>
                    </p>
                    <p>
                        <span>Horas Maquina</span>
                        <?php echo $this->Form->value('Avisostallere.horas_maquina') ?>
                    </p>
                </td>
                <td>
                    <p>
                        <span>Nº Serie Máquina</span> 
                        <?php echo $this->Form->value('Avisostallere.Maquina.serie_maquina') ?>
                    </p>
                    <p>
                        <span>Nº Serie Motor</span> 
                        <?php echo $this->Form->value('Avisostallere.Maquina.serie_motor') ?>
                    </p>
                    <p>
                        <span>Nº Serie Transmisión</span>
                        <?php echo $this->Form->value('Avisostallere.Maquina.serie_transmision') ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span>Descripción</span> 
                    <?php echo $this->Form->input('descripcion', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span>Observaciones</span> 
                    <?php echo $this->Form->input('observaciones', array('label' => false)); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>