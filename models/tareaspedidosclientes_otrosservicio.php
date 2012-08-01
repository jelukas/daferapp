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
    var $virtualFields = array(
        'total_desplazamiento' => 'TareaspedidosclientesOtrosservicio.desplazamiento + TareaspedidosclientesOtrosservicio.manoobradesplazamiento + TareaspedidosclientesOtrosservicio.kilometraje'
    );

    function afterSave($created) {
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $this->data['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['servicios'] = redondear_dos_decimal($tarea['TareaspedidosclientesOtrosservicio']['total']);
        $this->Tareaspedidoscliente->save($tarea);
    }

    function beforeDelete() {
        $servicio = $this->findById($this->id);
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $servicio['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['servicios'] = redondear_dos_decimal($tarea['Tareaspedidoscliente']['servicios'] - $servicio['TareaspedidosclientesOtrosservicio']['total']);
        $this->Tareaspedidoscliente->save($tarea);
        return true;
    }

}

?>