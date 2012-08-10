<?php

class Facturasproveedore extends AppModel {

    var $name = 'Facturasproveedore';
    var $order = "Facturasproveedore.fechafactura DESC";
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
        'Estadosfacturasproveedore' => array(
            'className' => 'Estadosfacturasproveedore',
            'foreignKey' => 'estadosfacturasproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $hasMany = array(
        'Albaranesproveedore' => array(
            'className' => 'Albaranesproveedore',
            'foreignKey' => 'facturasproveedore_id',
            'dependent' => false
        ),
    );

    function beforeSave($options) {
        if (empty($this->data['Facturasproveedore']['id'])) {
            $query = 'SELECT MAX(f.numero)+1 as siguiente  FROM facturasproveedores f ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Facturasproveedore']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Facturasproveedore']['numero'] = 1;
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