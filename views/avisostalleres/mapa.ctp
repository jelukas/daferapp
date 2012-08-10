<div style="margin: 20px 0">
    <?php echo $this->Html->link(__('Nuevo aviso de taller', true), array('action' => 'add'), array('class' => 'button_link')); ?>
</div>
<?php foreach ($avisostalleres as $avisostallere): ?>
    <div class="avisot_mapa" id="avisostallere<?php $avisostallere['Avisostallere']['id'] ?>">
        <h3><?php echo $this->Html->link(__('Aviso Taller ' . $avisostallere['Avisostallere']['numero'], true), array('action' => 'view', $avisostallere['Avisostallere']['id'])); ?></h3>
        <div class="informacion">
            <p><span>Fecha Aviso: </span> <?php echo $avisostallere["Avisostallere"]["fechaaviso"] ?></p>
            <p><span>Cliente: </span><?php echo $avisostallere["Cliente"]["nombre"] ?></p>
            <p><span>Centro: </span><?php echo $avisostallere["Centrostrabajo"]["centrotrabajo"] ?></p>
            <p><span>Máquina: </span><?php echo $avisostallere["Maquina"]["nombre"] ?></p>
            <p><span>Urgente: </span><?php echo $avisostallere["Avisostallere"]["marcarurgente"] == 1 ? '<span style="color: red">URGENTE</span>' : '<span style="color: green">No urgente</span>' ?></p>
            <p><span>Confirmado por: </span><?php echo $avisostallere["Avisostallere"]["confirmadopor"] ?></p>
            <p title="<?php echo $avisostallere["Avisostallere"]["descripcion"] ?>"><span>Descripción: </span><?php echo substr($avisostallere["Avisostallere"]["descripcion"], 0, 100); ?>...</p>
            <p><span>Observaciones: </span><?php echo $avisostallere["Avisostallere"]["observaciones"] ?></p>
        </div>
        <div class="botonera">
            <?php echo empty($avisostallere['Avisostallere']['fechaaceptacion']) ? $this->Html->link(__('Descartar', true), array('action' => 'descartar', $avisostallere['Avisostallere']['id']), array('class' => 'button_css_red')) : ''; ?>
            <?php if (empty($avisostallere['Avisostallere']['fechaaceptacion'])): ?>
                <?php echo $this->Html->link(__('Aceptar', true), array('action' => 'aceptar', $avisostallere['Avisostallere']['id']), array('class' => 'button_css_green')); ?><br/>
            <?php else: ?>
                <span class="button_css_aceptado">Aceptado</span>
                <?php echo $this->Html->link(__('Generar orden de taller', true), array('controller' => 'ordenes', 'action' => 'add', $avisostallere['Avisostallere']['id']), array('class' => 'button_css_blue')); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
<script>
    $(function() {
        $("a.button_jquery").button();
    });
</script>