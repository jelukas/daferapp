<?php

class Facturasproveedore extends AppModel {

    var $name = 'Facturasproveedore';
    var $validate = array(
        'numerofactura' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'fechafactura' => array(
            'date' => array(
                'rule' => array('date'),
            ),
        ),
        'tiposiva_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'albaranesproveedore_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tiposiva' => array(
            'className' => 'Tiposiva',
            'foreignKey' => 'tiposiva_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Albaranesproveedore' => array(
            'className' => 'Albaranesproveedore',
            'foreignKey' => 'albaranesproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $hasMany = array(
        'ArticulosFacturasproveedore' => array(
            'className' => 'ArticulosFacturasproveedore',
            'foreignKey' => 'facturasproveedore_id',
            'dependent' => true,
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

}

?>