<?php

class TareaspedidosclientesOtrosservicio extends AppModel {

    var $name = 'TareaspedidosclientesOtrosservicio';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspedidoscliente' => array(
            'className' => 'Tareaspedidoscliente',
            'foreignKey' => 'tareaspedidoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

       function afterSave($created) {
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $this->data['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['servicios'] = number_format($tarea['TareaspedidosclientesOtrosservicio']['total'], 5, '.', '');
        $this->Tareaspedidoscliente->save($tarea);
    }

    function beforeDelete() {
        $servicio =  $this->findById($this->id);
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $servicio['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['servicios'] = number_format($tarea['Tareaspedidoscliente']['servicios']-$servicio['TareaspedidosclientesOtrosservicio']['total'], 5, '.', '');
        $this->Tareaspedidoscliente->save($tarea);
        return true;
    }
}

?>