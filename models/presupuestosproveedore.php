<?php

class Presupuestosproveedore extends AppModel {

    var $name = 'Presupuestosproveedore';
    var $validate = array(
        'proveedore_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'almacene_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'fechaplazo' => array(
            'date' => array(
                'rule' => array('date'),
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Proveedore' => array(
            'className' => 'Proveedore',
            'foreignKey' => 'proveedore_id',
        ),
        'Almacene' => array(
            'className' => 'Almacene',
            'foreignKey' => 'almacene_id',
        ),
        'Avisosrepuesto' => array(
            'className' => 'Avisosrepuesto',
            'foreignKey' => 'avisosrepuesto_id',
        ),
        'Avisostallere' => array(
            'className' => 'Avisostallere',
            'foreignKey' => 'avisostallere_id',
        ),
        'Ordene' => array(
            'className' => 'Ordene',
            'foreignKey' => 'ordene_id',
        ),
        'Pedidoscliente' => array(
            'className' => 'Pedidoscliente',
            'foreignKey' => 'pedidoscliente_id',
        ),
    );
    var $hasMany = array(
        'ArticulosPresupuestosproveedore' => array(
            'className' => 'ArticulosPresupuestosproveedore',
            'foreignKey' => 'presupuestosproveedore_id',
            'dependent' => true
        ),
        'Pedidosproveedore' => array(
            'className' => 'Pedidosproveedore',
            'foreignKey' => 'presupuestosproveedore_id',
            'dependent' => true
        ),
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'presupuestosproveedore_id',
            'dependent' => true
        ),
    );
    
    
    function beforeSave($options) {
        if (empty($this->data['Presupuestosproveedore']['id'])) {
            $query = 'SELECT MAX(p.numero)+1 as siguiente_factura_id  FROM presupuestosproveedores p ';
            $resultado = $this->query($query);
            $this->data['Presupuestosproveedore']['numero'] = $resultado[0][0]['siguiente_factura_id'];
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(p.numero)+1 as siguiente_factura_id  FROM presupuestosproveedores p ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente_factura_id'];
    }

}

?>