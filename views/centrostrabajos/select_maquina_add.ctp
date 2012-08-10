<?php

echo $this->Form->input('Maquina.centrostrabajo_id', array(
    'label' => false,
    'div' => array(
        'id' => 'CentrostrabajoMaquinaSelectDiv'
    ),
    'style' => 'width: 300px;',
    'class' => 'chzn-select-required',
    'data-placeholder' => "Elije un Centro de Trabajo...",
    'empty' => ''));
?>