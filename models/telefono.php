<?php

class Telefono extends AppModel {

    var $name = 'Telefono';
    var $displayField = 'telefono';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Transportista' => array(
            'className' => 'Transportista',
            'foreignKey' => 'transportista_id',
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
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Proveedore' => array(
            'className' => 'Proveedore',
            'foreignKey' => 'proveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

?>
