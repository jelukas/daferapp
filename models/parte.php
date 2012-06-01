<?php

class Parte extends AppModel {

    var $name = 'Parte';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Centrostrabajo' => array(
            'className' => 'Centrostrabajo',
            'foreignKey' => 'centrostrabajo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    var $hasAndBelongsToMany = array(
        'Mecanico' => array(
            'className' => 'Mecanico',
            'joinTable' => 'mecanicos_partes',
            'foreignKey' => 'parte_id',
            'associationForeignKey' => 'mecanico_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}

?>