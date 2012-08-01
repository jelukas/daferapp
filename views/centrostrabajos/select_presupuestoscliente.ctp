<?php

echo $this->Form->input('Presupuestoscliente.centrostrabajo_id', array(
    'label' => 'Centro de Trabajo',
    'div' => null,
    'empty' => '--- Seleccione un centro de trabajo ---'));
echo $ajax->observeField('PresupuestosclienteCentrostrabajoId', array(
    'frequency' => '1',
    'update' => 'MaquinaSelectDiv',
    'url' => array(
        'controller' => 'maquinas',
        'action' => 'selectPresupuestosclientes'
        ))
);
?>