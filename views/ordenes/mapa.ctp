<?php foreach ($ordenes as $orden): ?>
    <div id="orden<?php echo $orden["Ordene"]["id"] ?>" class="orden_mapa">
        <div class="informacion">
            <h3><?php echo $this->Html->link(__('Orden ' . $orden['Ordene']['numero'], true), array('action' => 'view', $orden['Ordene']['id'])); ?></h3>
            <p><?php echo $this->Html->link(__('Fecha Aviso: ' .$this->Time->format('d-m-Y H:i:s', $orden["Avisostallere"]["fechaaviso"]), true), array('controller' => 'avisostalleres', 'action' => 'edit', $orden['Avisostallere']['id'])); ?></p>
            <p><span>Fecha Orden:</span> <?php echo $this->Time->format('d-m-Y',$orden['Ordene']['fecha']) ?></p>
            <p title="Fecha Prevista de Reparación"><span>Fecha Prevista Rep.:</span> <?php echo $this->Time->format('d-m-Y',$orden['Ordene']['fecha_prevista_reparacion']) ?></p>
            <p><span>Cliente:</span> <?php echo isset($orden["Avisostallere"]["Cliente"]) ? $orden["Avisostallere"]["Cliente"]["nombre"] : "" ?></p>
            <p><span>Centro:</span> <?php echo isset($orden["Avisostallere"]["Centrostrabajo"]["centrostrabajo"]) ? $orden["Avisostallere"]["Centrostrabajo"]["centrostrabajo"] : "" ?></p>
            <p><span>Máquina: </span><?php echo isset($orden["Avisostallere"]["Maquina"]) ? $orden["Avisostallere"]["Maquina"]["nombre"] : "" ?></p>
            <p><span>Máquina horas: </span><?php echo isset($orden["Avisostallere"]["Maquina"]) ? $orden["Avisostallere"]["Maquina"]["horas"] : "" ?></p>
            <p><span>Urgente: </span><?php echo $orden["Ordene"]["urgente"] == 1 ? '<span style="color: red">URGENTE</span>' : '<span style="color: green">No urgente</span>' ?></p>
            <p><span>Estado: </span><?php echo $orden["Estadosordene"]["estado"] ?></p>
            <p title="<?php echo $orden["Ordene"]["observaciones"] ?>"><span>Observaciones: </span><?php echo substr($orden["Ordene"]["observaciones"], 0,100) ?>...</p>
        </div>
        <?php if ($orden["Estadosordene"]["id"] == 5): ?>
            <div class="botonera">
                <span class="button_css_aceptado">Terminada - Pendiente de Facturar</span>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
