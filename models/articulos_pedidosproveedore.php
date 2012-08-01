<?php

class ArticulosPedidosproveedore extends AppModel {

    var $name = 'ArticulosPedidosproveedore';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Pedidosproveedore' => array(
            'className' => 'Pedidosproveedore',
            'foreignKey' => 'pedidosproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
        ),
    );

}

?>