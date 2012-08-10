<?php

echo $this->Form->input('Maquina.centrostrabajo_id', array(
    'label' => false,
    'div' => null,
    'style' => 'width: 300px;',
    'class' => 'chzn-select-required',
    'data-placeholder' => "Elije un Centro de Trabajo...",
    'empty' => ''));

echo $ajax->observeField('MaquinaCentrostrabajoId', array(
    'frequency' => '1',
    'update' => 'MaquinaSelectDiv',
    'url' => array(
        'controller' => 'maquinas',
        'action' => 'selectMaquina'
        ))
);
?>