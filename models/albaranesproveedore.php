<?php

class Albaranesproveedore extends AppModel {

    var $name = 'Albaranesproveedore';
    var $validate = array(
        'pedidosproveedore_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'fecha' => array(
            'date' => array(
                'rule' => array('date'),
            ),
        ),
        'numeroalbaran' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );
    var $belongsTo = array(
        'Pedidosproveedore' => array(
            'className' => 'Pedidosproveedore',
            'foreignKey' => 'pedidosproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $hasMany = array(
        'ArticulosAlbaranesproveedore' => array(
            'className' => 'ArticulosAlbaranesproveedore',
            'foreignKey' => 'albaranesproveedore_id',
            'dependent' => true,
        ),
    );

}

?>