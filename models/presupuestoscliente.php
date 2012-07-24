<?php

class Presupuestoscliente extends AppModel {

    var $name = 'Presupuestoscliente';
    var $displayField = 'fecha';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $order = "Presupuestoscliente.numero DESC";
    var $belongsTo = array(
        'Comerciale' => array(
            'className' => 'Comerciale',
            'foreignKey' => 'comerciale_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Centrostrabajo' => array(
            'className' => 'Centrostrabajo',
            'foreignKey' => 'centrostrabajo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Avisosrepuesto' => array(
            'className' => 'Avisosrepuesto',
            'foreignKey' => 'avisosrepuesto_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Mensajesinformativo' => array(
            'className' => 'Mensajesinformativo',
            'foreignKey' => 'mensajesinformativo_id',
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
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Ordene' => array(
            'className' => 'Ordene',
            'foreignKey' => 'ordene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'presupuestosproveedore_id',
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
        'Avisostallere' => array(
            'className' => 'Avisostallere',
            'foreignKey' => 'avisostallere_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Tareaspresupuestocliente' => array(
            'className' => 'Tareaspresupuestocliente',
            'foreignKey' => 'presupuestoscliente_id',
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
        'Pedidoscliente' => array(
            'className' => 'Pedidoscliente',
            'foreignKey' => 'presupuestoscliente_id',
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
        if (empty($this->data['Presupuestoscliente']['id'])) {
            $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM presupuestosclientes p ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Presupuestoscliente']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Presupuestoscliente']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(p.numero)+1 as siguiente  FROM presupuestosclientes p ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

}

?>