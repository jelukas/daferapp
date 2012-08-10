<div style="margin: 20px 0">
    <?php echo $this->Html->link(__('Nuevo Aviso de Repuestos', true), array('action' => 'add'), array('class' => 'button_link')); ?>
</div>
<p>* Se muestran los Avisos de Repuestos Pendientes o Aceptados y que no han sido Prespuestados al Cliente</p>
<?php foreach ($avisosrepuestos as $avisosrepuesto): ?>
    <?php if (count($avisosrepuesto["Presupuestoscliente"]) <= 0): ?>
        <div class="avisot_mapa" id="avisosrepuesto<?php $avisosrepuesto['Avisosrepuesto']['id'] ?>">
            <h3><?php echo $this->Html->link(__('Aviso Repuesto ' . $avisosrepuesto['Avisosrepuesto']['numero'], true), array('action' => 'view', $avisosrepuesto['Avisosrepuesto']['id'])); ?></h3>
            <div class="informacion">
                <p><span>Fecha Aviso: </span><?php echo $avisosrepuesto["Avisosrepuesto"]["fechahora"] ?></p>
                <p><span>Cliente: </span><?php echo $avisosrepuesto["Cliente"]["nombre"] ?></p>
                <p><span>Centro: </span><?php echo $avisosrepuesto["Centrostrabajo"]["centrotrabajo"] ?></p>
                <p><span>Máquina: </span><?php echo $avisosrepuesto["Maquina"]["nombre"] ?></p>
                <p><span>Fecha Aceptación: </span><?php echo $avisosrepuesto["Avisosrepuesto"]["fechaaceptacion"] ?></p>
                <p><span>Urgente: </span><?php echo $avisosrepuesto["Avisosrepuesto"]["marcarurgente"] == 1 ? '<span style="color: red">URGENTE</span>' : '<span style="color: green">No Urgente</span>' ?></p>
                <p><span>Confirmado por: </span><?php echo $avisosrepuesto["Avisosrepuesto"]["confirmadopor"] ?></p>
                <p><span>Estado: </span><?php echo $avisosrepuesto["Estadosaviso"]["estado"] ?></p>
                <p title="<?php echo $avisosrepuesto["Avisosrepuesto"]["descripcion"] ?>"><span>Descripción: </span><?php echo substr($avisosrepuesto["Avisosrepuesto"]["descripcion"], 0, 100) ?>...</p>
                <p><span>Observaciones: </span><?php echo $avisosrepuesto["Avisosrepuesto"]["observaciones"] ?></p>
            </div>
            <div class="botonera">
                <?php if ($avisosrepuesto["Estadosaviso"]["id"] == 1): ?>
                    <?php echo $this->Html->link(__('Descartar', true), array('action' => 'descartar', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_css_red')); ?>
                    <?php echo $this->Html->link(__('Aceptar', true), array('action' => 'aceptar', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_css_green')); ?><br/>
                <?php elseif ($avisosrepuesto["Estadosaviso"]["id"] == 3): ?>
                    <span class="button_css_aceptado">Aceptado</span>
                    <?php if (count($avisosrepuesto["Presupuestoscliente"]) == 0): ?>
                        <p><span class="button_css_span">No se han enviado Presupuestos al Cliente</span></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>