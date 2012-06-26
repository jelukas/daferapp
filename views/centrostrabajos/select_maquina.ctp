<?php

echo $this->Form->input('Maquina.centrostrabajo_id', array(
    'label' => false,
    'div' => null,
    'empty' => '--- Seleccione un centro de trabajo ---'));

echo $ajax->observeField('MaquinaCentrostrabajoId', array(
    'frequency' => '1',
    'update' => 'MaquinaSelectDiv',
    'url' => array(
        'controller' => 'maquinas',
        'action' => 'selectMaquina'
        ))
);
?>