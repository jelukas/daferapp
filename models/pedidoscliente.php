<?php

class Pedidoscliente extends AppModel {

    var $name = 'Pedidoscliente';
    var $validate = array(
        'presupuestoscliente_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $order = "Pedidoscliente.numero DESC";
    
    var $belongsTo = array(
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'presupuestoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Tiposiva' => array(
            'className' => 'Tiposiva',
            'foreignKey' => 'tiposiva_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $hasMany = array(
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'pedidoscliente_id',
            'dependent' => false,
        ),
        'Tareaspedidoscliente' => array(
            'className' => 'Tareaspedidoscliente',
            'foreignKey' => 'pedidoscliente_id',
            'dependent' => true,
        ),
    );

    function beforeSave($options) {
        if (empty($this->data['Pedidoscliente']['id'])) {
            $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM pedidosclientes p ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Pedidoscliente']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Pedidoscliente']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM pedidosclientes p ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

}

?>