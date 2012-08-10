<?php

class Avisosrepuesto extends AppModel {

    var $name = 'Avisosrepuesto';
    var $order = "Avisosrepuesto.numero DESC";
    var $validate = array(
        'cliente_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'centrostrabajo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'maquina_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );
    var $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
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
        'Maquina' => array(
            'className' => 'Maquina',
            'foreignKey' => 'maquina_id',
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
        'Estadosaviso' => array(
            'className' => 'Estadosaviso',
            'foreignKey' => 'estadosaviso_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'ArticulosAvisosrepuesto' => array(
            'className' => 'ArticulosAvisosrepuesto',
            'foreignKey' => 'avisosrepuesto_id',
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
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'avisosrepuesto_id',
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
            'foreignKey' => 'avisosrepuesto_id',
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
        'Albaranescliente' => array(
            'className' => 'Albaranescliente',
            'foreignKey' => 'avisosrepuesto_id',
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

    function beforeSave($options) {
        if (empty($this->data['Avisosrepuesto']['id'])) {
            $query = 'SELECT MAX(a.numero)+1 as siguiente_factura_id  FROM avisosrepuestos a ';
            $resultado = $this->query($query);
            $this->data['Avisosrepuesto']['numero'] = $resultado[0][0]['siguiente_factura_id'];
        }
        /* Guardamos las horas de la maquina */
        if (!empty($this->data['Avisosrepuesto']['maquina_id'])) {
            $maquina = $this->Maquina->find('first', array('contain' => null, 'conditions' => array('Maquina.id' => $this->data['Avisosrepuesto']['maquina_id'])));
            $this->data['Avisosrepuesto']['horas_maquina'] = $maquina['Maquina']['horas'];
        }
        /* Fin del guardados de las horas de la máquina */

        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(a.numero)+1 as siguiente_factura_id  FROM avisosrepuestos a ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente_factura_id'];
    }

}

?>