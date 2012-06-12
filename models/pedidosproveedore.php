<?php

class Pedidosproveedore extends AppModel {

    var $name = 'Pedidosproveedore';
    var $validate = array(
        'fecha' => array(
            'date' => array(
                'rule' => array('date'),
            ),
        ),
        'presupuestosproveedore_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );
    var $belongsTo = array(
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'presupuestosproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Albaranesproveedore' => array(
            'className' => 'Albaranesproveedore',
            'foreignKey' => 'pedidosproveedore_id',
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
        'ArticulosPedidosproveedore' => array(
            'className' => 'ArticulosPedidosproveedore',
            'foreignKey' => 'pedidosproveedore_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    function beforeSave($options) {
        if (empty($this->data['Pedidosproveedore']['id'])) {
            $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM pedidosproveedores p ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Pedidosproveedore']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Pedidosproveedore']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM pedidosproveedores p ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

}

?>