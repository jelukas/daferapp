<?php

class Proveedore extends AppModel {

    var $name = 'Proveedore';
    var $displayField = 'idnombre';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $virtualFields = array('idnombre' => "CONCAT(Proveedore.nombre, ' --- ', Proveedore.id)");
   
    var $belongsTo = array(
        'Tiposiva' => array(
            'className' => 'Tiposiva',
            'foreignKey' => 'tiposiva_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    var $hasMany = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'proveedore_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Albaranesproveedore' => array(
            'className' => 'Albaranesproveedore',
            'foreignKey' => 'proveedore_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );
    var $hasOne = array(
        'Cuentasbancaria' => array(
            'className' => 'Cuentasbancaria',
            'foreignKey' => 'proveedore_id',
            'dependent' => true
        ),
        'Formapago' => array(
            'className' => 'Formapago',
            'foreignKey' => 'proveedore_id',
            'dependent' => true
        ),
    );

}

?>
