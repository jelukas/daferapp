<?php

class Avisostallere extends AppModel {

    var $name = 'Avisostallere';
    var $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
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
        'Estadosavisostallere' => array(
            'className' => 'Estadosavisostallere',
            'foreignKey' => 'estadosavisostallere_id',
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
        )
    );
    var $hasMany = array(
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'avisostallere_id',
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
            'foreignKey' => 'avisostallere_id',
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
        if (empty($this->data['Avisostallere']['id'])) {
            $query = 'SELECT MAX(a.numero)+1 as siguiente_factura_id  FROM avisostalleres a ';
            $resultado = $this->query($query);
            $this->data['Avisostallere']['numero'] = $resultado[0][0]['siguiente_factura_id'];
        }
        
        /* Guardamos las horas de la maquina */
        if (!empty($this->data['Avisostallere']['maquina_id'])) {
            $maquina = $this->Maquina->find('first', array('contain' => null, 'conditions' => array('Maquina.id' => $this->data['Avisostallere']['maquina_id'])));
            $this->data['Avisostallere']['horas_maquina'] = $maquina['Maquina']['horas'];
        }
        /* Fin del guardados de las horas de la máquina */
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(a.numero)+1 as siguiente_factura_id  FROM avisostalleres a ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente_factura_id'];
    }

}

?>
