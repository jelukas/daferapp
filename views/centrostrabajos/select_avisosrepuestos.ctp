<?php

echo $this->Form->input('Avisosrepuesto.centrostrabajo_id', array(
    'label' => 'Centro de Trabajo',
    'div' => null,
    'empty' => '--- Seleccione un centro de trabajo ---'));

echo $ajax->observeField('AvisosrepuestoCentrostrabajoId', array(
    'frequency' => '1',
    'update' => 'MaquinaSelectDiv',
    'url' => array(
        'controller' => 'maquinas',
        'action' => 'selectAvisosrepuestos'
        ))
);
?>