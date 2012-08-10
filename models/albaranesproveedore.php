<?php

class Albaranesproveedore extends AppModel {

    var $name = 'Albaranesproveedore';
    var $displayField = 'numero';
    var $order = "Albaranesproveedore.fecha DESC";
    
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
        'centrosdecoste_id' => array(
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
        'Proveedore' => array(
            'className' => 'Proveedore',
            'foreignKey' => 'proveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Centrosdecoste' => array(
            'className' => 'Centrosdecoste',
            'foreignKey' => 'centrosdecoste_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Estadosalbaranesproveedore' => array(
            'className' => 'Estadosalbaranesproveedore',
            'foreignKey' => 'estadosalbaranesproveedore_id',
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

    function beforeSave($options) {
        if (empty($this->data['Albaranesproveedore']['id'])) {
            $query = 'SELECT MAX(a.numero)+1 as siguiente  FROM albaranesproveedores a ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Albaranesproveedore']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Albaranesproveedore']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(a.numero)+1 as siguiente  FROM albaranesproveedores a ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

}

?>