<?php

class Ordene extends AppModel {

    var $name = 'Ordene';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Avisostallere' => array(
            'className' => 'Avisostallere',
            'foreignKey' => 'avisostallere_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Estadosordene' => array(
            'className' => 'Estadosordene',
            'foreignKey' => 'estadosordene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Almacene' => array(
            'className' => 'Almacene',
            'foreignKey' => 'almacene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'ordene_id',
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
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'ordene_id',
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
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'ordene_id',
            'dependent' => false,
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
        if (empty($this->data['Ordene']['id'])) {
            $query = 'SELECT MAX(o.numero)+1 as siguiente  FROM ordenes o ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Ordene']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Ordene']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(o.numero)+1 as siguiente  FROM ordenes o ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

}

?>
