<?php foreach ($avisostalleres as $avisostallere): ?>
    <div class="avisot_mapa" id="avisostallere<?php $avisostallere['Avisostallere']['id'] ?>">
        <h3><?php echo $this->Html->link(__('Aviso Taller ' . $avisostallere['Avisostallere']['id'], true), array('action' => 'view', $avisostallere['Avisostallere']['id'])); ?></h3>
        <p>Fecha Aviso: <?php echo $avisostallere["Avisostallere"]["fechaaviso"] ?></p>
        <p>Cliente: <?php echo $avisostallere["Cliente"]["nombre"] ?></p>
        <p>Centro: <?php echo $avisostallere["Centrostrabajo"]["centrotrabajo"] ?></p>
        <p>Máquina: <?php echo $avisostallere["Maquina"]["nombre"] ?></p>
        <p>Fecha Aceptación: <?php echo $avisostallere["Avisostallere"]["fechaaceptacion"] ?></p>
        <p>Urgente: <?php echo $avisostallere["Avisostallere"]["marcarurgente"]==1?'<span style="color: red">URGENTE</span>':'<span style="color: green">No urgente</span>' ?></p>
        <p>Confirmado por: <?php echo $avisostallere["Avisostallere"]["confirmadopor"] ?></p>
        <p>Estado: <?php echo $avisostallere["Estadosavisostallere"]["estado"] ?></p>
        <p>Observaciones:<?php echo $avisostallere["Avisostallere"]["observaciones"] ?></p>
       
        <descartar><?php echo $this->Html->link(__('Descartar', true), array('action' => 'descartar',$avisostallere['Avisostallere']['id'])); ?></descartar>
        
        <p><?php echo $this->Html->link(__('Generar orden de taller', true), array('controller' => 'ordenes', 'action' => 'add',$avisostallere['Avisostallere']['id'])); ?> </p>

    </div>
    
<?php endforeach; ?>
<div class="actions">
<li><?php echo $this->Html->link(__('Nuevo aviso de taller', true), array('action' => 'add')); ?></li>
</div>