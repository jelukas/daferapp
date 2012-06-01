<?php foreach ($avisosrepuestos as $avisosrepuesto): ?>
    <div class="avisot_mapa" id="avisosrepuesto<?php $avisosrepuesto['Avisosrepuesto']['id'] ?>">
        <h3><?php echo $this->Html->link(__('Aviso Repuesto ' . $avisosrepuesto['Avisosrepuesto']['id'], true), array('action' => 'view', $avisosrepuesto['Avisosrepuesto']['id'])); ?></h3>
        <p>Fecha Aviso: <?php echo $avisosrepuesto["Avisosrepuesto"]["fechahora"] ?></p>
        <p>Cliente: <?php echo $avisosrepuesto["Cliente"]["nombre"] ?></p>
        <p>Centro: <?php echo $avisosrepuesto["Centrostrabajo"]["centrotrabajo"] ?></p>
        <p>Máquina: <?php echo $avisosrepuesto["Maquina"]["nombre"] ?></p>
        <p>Fecha Aceptación: <?php echo $avisosrepuesto["Avisosrepuesto"]["fechaaceptacion"] ?></p>
        <p>Urgente: <?php echo $avisosrepuesto["Avisosrepuesto"]["marcarurgente"]==1?'<span style="color: red">URGENTE</span>':'<span style="color: green">No Urgente</span>' ?></p>
       
       <p>Confirmado por: <?php echo $avisosrepuesto["Avisosrepuesto"]["confirmadopor"] ?></p>
       <p>Estado: <?php echo $avisosrepuesto["Estadosaviso"]["estado"] ?></p>

        <p>Observaciones:<?php echo $avisosrepuesto["Avisosrepuesto"]["observaciones"] ?></p>
        <p><?php echo $this->Html->link(__('Descartar', true), array('action' => 'descartar',$avisosrepuesto['Avisosrepuesto']['id'])); ?></p>
    </div>
<?php endforeach; ?>