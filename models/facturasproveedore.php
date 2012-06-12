<?php

class Facturasproveedore extends AppModel {

    var $name = 'Facturasproveedore';
    var $validate = array(
        'numero' => array(
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
        'Proveedore' => array(
            'className' => 'Proveedore',
            'foreignKey' => 'proveedore_id',
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

    function beforeSave($options) {
        if (empty($this->data['Facturasproveedore']['id'])) {
            $query = 'SELECT MAX(f.numero)+1 as siguiente  FROM facturasproveedores f ';
            $resultado = $this->query($query);
            $this->data['Facturasproveedore']['numero'] = $resultado[0][0]['siguiente'];
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(f.numero)+1 as siguiente  FROM facturasproveedores f ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }
}

?>