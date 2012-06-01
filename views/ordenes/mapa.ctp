<?php foreach($ordenes as $orden): ?>
<div id="orden<?php echo $orden["Ordene"]["id"] ?>" class="orden_mapa">
    <h3><?php echo $this->Html->link(__('Orden '.$orden['Ordene']['id'], true), array('action' => 'view', $orden['Ordene']['id'])); ?></h3>
    <p><?php echo $this->Html->link(__('Fecha Aviso: '.$orden["Avisostallere"]["fechaaviso"] , true), array('controller'=>'avisostalleres','action' => 'edit', $orden['Avisostallere']['id'])); ?></p>
    <p>Cliente: <?php echo isset($orden["Avisostallere"]["Cliente"])?$orden["Avisostallere"]["Cliente"]["nombre"]:"" ?></p>
    <p>Centro: <?php echo isset($orden["Avisostallere"]["Centrostrabajo"]["centrostrabajo"])?$orden["Avisostallere"]["Centrostrabajo"]["centrostrabajo"]:"" ?></p>
    <p>Máquina: <?php echo isset($orden["Avisostallere"]["Maquina"])?$orden["Avisostallere"]["Maquina"]["nombre"]:"" ?></p>
    <p>Máquina horas: <?php echo isset($orden["Avisostallere"]["Maquina"])?$orden["Avisostallere"]["Maquina"]["horas"]:"" ?></p>
    <p>Urgente: <?php echo $orden["Ordene"]["urgente"]==1?'<span style="color: red">URGENTE</span>':'<span style="color: green">No urgente</span>' ?></p>
    <p>Confirmado por:<?php echo $orden["Avisostallere"]["confirmadopor"] ?></p>
    <p>Estado:<?php echo $orden["Estadosordene"]["estado"] ?></p>
    <p>Observaciones:<?php echo $orden["Ordene"]["observaciones"] ?></p>
</div>
<?php endforeach; ?>
